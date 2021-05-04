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

}

?>