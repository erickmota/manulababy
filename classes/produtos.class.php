<?php

class produtos{

    public $id;
    public $nome;
    public $descricao;
    public $preco;
    public $qtd;
    public $estado;
    public $tamanho;
    public $id_promocao;
    public $preco_promocao;
    public $sexo;
    public $peso;
    public $altura;
    public $largura;
    public $comprimento;
    public $dias_entrega;

    /* Tratar imagem do produto e enviar a pasta de destino */
    public function tratar_img($id_produto, $img, $ordemEnvio, $capaGaleria){

        include 'conexao.class.php';

        $pasta = "../img/produtos/";

        $dataHoraAtual = date("dmYHis");

        move_uploaded_file($img["tmp_name"], $pasta.$ordemEnvio.$dataHoraAtual."-".$id_produto.".jpg");

        $orgFile =  $pasta.$ordemEnvio.$dataHoraAtual."-".$id_produto.".jpg";
        
        list($largura, $altura) = getimagesize($orgFile);

        $novaImg = imagecreatefromjpeg($orgFile);

        if($largura >= 1500){
            
            $novaLargura = $largura*0.25;
            $novaAltura = $altura*0.25;
            
        }elseif($largura < 1500 && $largura > 1000){
            
            $novaLargura = $largura*0.50;
            $novaAltura = $altura*0.50;
            
        }else{
            
            $novaLargura = $largura;
            $novaAltura = $altura;
            
        }

        $trucolor = imagecreatetruecolor($novaLargura, $novaAltura);

        $novaI = imagecopyresampled($trucolor, $novaImg, 0, 0, 0, 0, $novaLargura, $novaAltura, $largura, $altura);

        $nova = imagejpeg($trucolor, $pasta.$ordemEnvio.$dataHoraAtual."-".$id_produto.".jpg", 80);

        $novoNome = $ordemEnvio.$dataHoraAtual."-".$id_produto.".jpg";

        if($capaGaleria == 1){

            $sql = mysqli_query($conn, "UPDATE produtos SET foto='$novoNome' WHERE id=$id_produto") or die ("Erro ao Upar a imagem de capa");

        }else{

            $sql = mysqli_query($conn, "INSERT INTO galeria (id_produtos, caminho) VALUES ($id_produto, '$novoNome')") or die("Erro ao mandar galeria ao BD");

        }

    }

    /* Enviar produto para o BD */
    public function cadastrar_produto_bd($variacaoAdicional1, $variacaoAdicional2, $variacaoAdicional3){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "INSERT INTO produtos (id_variacao_produto, id_variacao_produto2, id_variacao_produto3, id_promocoes, tamanho, nome, foto, descricao, preco, qtd_estoque, estado, preco_promocao, sexo, peso, altura, largura, comprimento, dias_entrega) VALUES ($variacaoAdicional1, $variacaoAdicional2, $variacaoAdicional3, $this->id_promocao, '$this->tamanho', '$this->nome', NULL, '$this->descricao', $this->preco, $this->qtd, '$this->estado', $this->preco_promocao, '$this->sexo', '$this->peso', '$this->altura', '$this->largura', '$this->comprimento', $this->dias_entrega)") or die("Erro ao cadastrar o produto");

        echo "{$variacaoAdicional1}<br>{$variacaoAdicional2}<br>{$variacaoAdicional3}<br>{$this->id_promocao}<br>{$this->tamanho}<br>{$this->nome}<br>{$this->descricao}<br>{$this->preco}<br>{$this->qtd}<br>{$this->estado}<br>{$this->preco_promocao}<br>{$this->sexo}<br>{$this->peso}<br>{$this->altura}<br>{$this->largura}<br>{$this->comprimento}<br>{$this->dias_entrega}";

    }

    /* Retorna ultimo id de uma tabela */
    public function retorna_ultimo_id($tabela){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT id FROM $tabela ORDER BY id DESC") or die("Erro ao retornar ultimo ID");
        $linha = mysqli_fetch_array($sql);

        return $linha["id"];

    }

    public function retorna_lista_produtos($pg){

        include 'conexao.class.php';

        $somaPg = ($pg * 3) - 3;

        $sql = mysqli_query($conn, "SELECT * FROM produtos LIMIT $somaPg, 3") or die("Erro retorna_lista_produtos");
        $sql2 = mysqli_query($conn, "SELECT * FROM produtos") or die("Erro retorna_lista_produtos");
        $qtd = mysqli_num_rows($sql2);
        while($linha = mysqli_fetch_assoc($sql)){

            $array[] = $linha;

        }

        $retorno = [$array, $qtd];

        return $retorno;

    }
    
}

?>