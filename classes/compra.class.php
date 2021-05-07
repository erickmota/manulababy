<?php

class compra{

    public $idCliente;
    public $tamanho;
    public $variacaoComplementar;
    public $variacaoComplementar2;
    public $variacaoComplementar3;
    public $quantidade;
    public $idProduto;

    public function calcular_frete($sCepDestino, $peso, $altura, $largura, $comprimento, $nCdServico){

        /* http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=08082650&sDsSenha=564321&sCepOrigem=70002900&sCepDestino=04547000&nVlPeso=1&nCdFormato=1&nVlComprimento=20&nVlAltura=20&nVlLargura=20&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=04510&nVlDiametro=0&StrRetorno=xml&nIndicaCalculo=3 */
        
        /* 04014 = sedex */
        /* 04510 = PAC */

        /* nCdEmpresa=08082650
        &sDsSenha=564321
        &sCdMaoPropria=n
        &sCdAvisoRecebimento=n

        &sCepOrigem=70002900
        &sCepDestino=04547000
        &nVlPeso=1
        &nCdFormato=1
        &nVlComprimento=20
        &nVlAltura=20
        &nVlLargura=20
        &nVlValorDeclarado=0
        &nCdServico=04510
        &nVlDiametro=0
        &StrRetorno=xml
        &nIndicaCalculo=3 */

        $pesoString = strval($peso);
        $alturaString = strval($altura);
        $larguraString = strval($largura);
        $comprimentoString = strval($comprimento);

        $nCdEmpresa="";
        $sDsSenha="";
        $sCdMaoPropria="n";
        $sCdAvisoRecebimento="n";

        $sCepOrigem="18077370";
        /* $sCepDestino="04547000"; */
        /* $nVlPeso="1"; */
        $nCdFormato="1";
        /* $nVlComprimento="20"; */
        /* $nVlAltura="20"; */
        /* $nVlLargura="20"; */
        $nVlValorDeclarado="0";
        /* $nCdServico="04510"; */
        $nVlDiametro="0";
        $StrRetorno="xml";
        $nIndicaCalculo="3";

        $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa={$nCdEmpresa}&sDsSenha={$sDsSenha}&sCepOrigem={$sCepOrigem}&sCepDestino={$sCepDestino}&nVlPeso={$pesoString}&nCdFormato={$nCdFormato}&nVlComprimento={$comprimentoString}&nVlAltura={$alturaString}&nVlLargura={$larguraString}&sCdMaoPropria={$sCdMaoPropria}&nVlValorDeclarado={$nVlValorDeclarado}&sCdAvisoRecebimento={$sCdAvisoRecebimento}&nCdServico={$nCdServico}&nVlDiametro={$nVlDiametro}&StrRetorno={$StrRetorno}&nIndicaCalculo={$nIndicaCalculo}";
        /* $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=08082650&sDsSenha=564321&sCepOrigem=70002900&sCepDestino=04547000&nVlPeso=1&nCdFormato=1&nVlComprimento=20&nVlAltura=20&nVlLargura=20&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=04510&nVlDiametro=0&StrRetorno=xml&nIndicaCalculo=3"; */

        $file = file_get_contents($url);
        $convert = simplexml_load_string($file);

        /* var_dump($convert); */

        /* echo $convert->cServico->Valor; */
        
        $retorno = [$convert->cServico->Valor, $convert->cServico->PrazoEntrega, $convert->cServico->MsgErro];

        return $retorno;

    }

    public function retorna_qtd_itens_carrinho(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM sacola WHERE id_cliente=$this->idCliente") or die("Erro ao retornar qtd itens carrinho");
        $qtd_sql = mysqli_num_rows($sql);

        return $qtd_sql;

    }

    public function adicionar_produto_carrinho(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "INSERT INTO sacola (id_produto, id_cliente, tamanho, variacao_complementar, variacao_complementar2, variacao_complementar3, quantidade) VALUES ($this->idProduto, $this->idCliente, '$this->tamanho', '$this->variacaoComplementar', '$this->variacaoComplementar2', '$this->variacaoComplementar3', $this->quantidade)") or die("Erro add ao carrinho");
        
    }

    public function retorna_dados_carrinho(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT produtos.foto AS foto, produtos.nome AS nome_produto, sacola.variacao_complementar AS variacao_complementar, sacola.variacao_complementar2 AS variacao_complementar2, sacola.variacao_complementar3 AS variacao_complementar3, produtos.qtd_estoque AS qtd_estoque, produtos.preco AS preco, sacola.quantidade AS qtd_pedido, sacola.id AS id_sacola, sacola.id_produto AS id_produto, produtos.estado AS estado, produtos.peso AS peso, produtos.largura AS largura, produtos.altura AS altura, produtos.comprimento AS comprimento, produtos.dias_entrega AS dias_entrega, produtos.id_variacao_produto AS id_variacao_produto, produtos.id_variacao_produto2 AS id_variacao_produto2, produtos.id_variacao_produto3 AS id_variacao_produto3, sacola.tamanho AS tamanho FROM sacola INNER JOIN produtos ON sacola.id_produto=produtos.id WHERE sacola.id_cliente=$this->idCliente ORDER BY sacola.id ASC") or die("Erro ao retornar dados do carrinho");
        $qtd_sql = mysqli_num_rows($sql);
        while($linha = mysqli_fetch_array($sql)){

            $array[] = $linha;

        }

        if($qtd_sql < 1){

            return false;

        }else{

            return $array;

        }

    }

    public function comparar_qtd_carrinho_qtd_produto($idProduto){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT produtos.qtd_estoque AS qtd_estoque, sacola.quantidade AS quantidade, sacola.id AS id_sacola FROM sacola INNER JOIN produtos ON sacola.id_produto=produtos.id WHERE sacola.id_cliente=$this->idCliente AND sacola.id_produto=$idProduto") or die("Erro comparar_qtd_carrinho_qtd_produto");
        $linha = mysqli_fetch_assoc($sql);

        $qtd_estoque = $linha["qtd_estoque"];
        $qtd_carrinho = $linha["quantidade"];
        $id_sacola = $linha["id_sacola"];

        if($qtd_carrinho > $qtd_estoque && $qtd_estoque > 0){

            $sql2 = mysqli_query($conn, "UPDATE sacola SET quantidade=$qtd_estoque WHERE id=$id_sacola") or die("Erro ao atualizar qtd produto carrinho");

            echo "<script>window.alert('Um ou mais itens na sua sacola tiveram a quantidade diminuída devido a alterações em nosso estoque, por favor, confira antes de finalizar o pedido!'); window.location='sacola'</script>";

        }

    }

    public function retorna_dados_variacao_complementar_por_id($id_variacao){

        include 'conexao.class.php';

        if($id_variacao == null){

            return ["texto_cliente" => "Apresentacao"];

        }else{

            $sql = mysqli_query($conn, "SELECT texto_cliente FROM variacao_produtos WHERE id=$id_variacao") or die("Erro retorna_variacao_complementar_por_id");
            $linha = mysqli_fetch_array($sql);

            return $linha["texto_cliente"];

        }

    }

    public function apagar_produto_individual_carrinho($id_sacola){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "DELETE FROM sacola WHERE id=$id_sacola") or die("Erro ao apagar produto individual o carrinho");

    }

}

?>