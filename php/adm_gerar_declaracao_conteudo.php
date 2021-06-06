<?php

require_once '../dompdf/autoload.inc.php';

include "../classes/adm.class.php";

$classeAdm = new adm();

/* Verificando existencia do ADM */

if(isset($_COOKIE["aiu_mb"]) && isset($_COOKIE["aeu_mb"]) && isset($_COOKIE["asu_mb"]) && $classeAdm->verifica_existencia_adm($_COOKIE["aiu_mb"], $_COOKIE["aeu_mb"], $_COOKIE["asu_mb"]) == true){

    

}else{

    die("<script>window.location='../php/adm_deslogar.php'</script>");

}

/* // Verificando existencia do ADM */

$id_pedido = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["ip"]));

$functPedido = $classeAdm->retorna_dados_pedido_referencia($id_pedido);

foreach($functPedido as $arrPedido){

    $destiNomeCliente = $arrPedido["nome_cliente"];
    $destRua = $arrPedido["rua"];
    $destNumero = $arrPedido["numero"];
    $destCidade = $arrPedido["cidade"];
    $destUf = $arrPedido["uf"];
    $destCep = $arrPedido["cep"];
    $destCpf = $arrPedido["cpf"];

}

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$corpo = "<html>

<head>

    <style>

    #divTituloRemetente{

        border-bottom: 1px solid black;
        padding: 5px 0px;
        text-align: center;
        font-size:14px

    }

    #divConteudoRemetente{

        border-bottom: 1px solid black;
        padding: 5px 0px;
        font-size:12px;

    }

    #divConteudoRemetenteEndereco{

        border-bottom: 1px solid black;
        padding: 5px 0px;
        font-size:12px;
        height:30px;

    }

    #divConteudoRemetenteFinal{

        border-bottom: none;
        padding: 5px 0px;
        font-size:12px

    }

    </style>

</head>

<body>

    <table border='1' cellspacing='0' cellpadding='10' width='100%'>

        <tr>

            <td align='center'>

                <span style='font-size: 20px;'><b>DECLARAÇÃO DE CONTEÚDO</b></span>

            </td>

        </tr>

    </table>

    <table border='1' cellspacing='0' width='100%' style='margin-top: 5px;'>

        <tr>

            <td width='50%'>

                <div id='divTituloRemetente'><b>REMETENTE</b></div>
                <div id='divConteudoRemetente'><b>NOME:</b> Oscar Muniz</div>
                <div id='divConteudoRemetenteEndereco'><b>ENDEREÇO:</b> Rua Michel chicri Maluf, Nº 215</div>
                <div id='divConteudoRemetente'><b>CIDADE:</b> Sorocaba</div>
                <div id='divConteudoRemetente'><b>UF:</b> SP</div>
                <div id='divConteudoRemetente'><b>CEP:</b> 18077-370</div>
                <div id='divConteudoRemetenteFinal'><b>CPF/CNPJ:</b> 108.415.778-03</div>

            </td>

            <td>

                <div id='divTituloRemetente'><b>DESTINATÁRIO</b></div>
                <div id='divConteudoRemetente'><b>NOME:</b> {$destiNomeCliente}</div>
                <div id='divConteudoRemetenteEndereco'><b>ENDEREÇO:</b> {$destRua}, Nº {$destNumero}</div>
                <div id='divConteudoRemetente'><b>CIDADE:</b> {$destCidade}</div>
                <div id='divConteudoRemetente'><b>UF:</b> {$destUf}</div>
                <div id='divConteudoRemetente'><b>CEP:</b> {$destCep}</div>
                <div id='divConteudoRemetenteFinal'><b>CPF/CNPJ:</b> {$destCpf}</div>

            </td>

        </tr>

    </table>

    <table border='1' cellspacing='0' cellpadding='5' width='100%' style='margin-top:5px'>

        <tr>

            <td align='center'>

                <span style='font-size: 15px;'><b>IDENTIFICAÇÃO DOS BENS</b></span>

            </td>

        </tr>

    </table>

    <table border='1' cellspacing='0' width='100%' style='margin-top: 5px;'>

        <tr align='center' style='font-size:13px'>

            <td style='width:10%'>

                <b>ITEM</b>

            </td>

            <td style='width:50%'>

                <b>CONTEÚDO</b>

            </td>

            <td style='width:20%'>

                <b>QUANT.</b>

            </td>

            <td style='width:20%'>

                <b>VALOR</b>

            </td>

        </tr>";

        $i = 1;
        $totalQtd = 0;
        $totalValor = 0;
        $totalPeso = 0.0;

        foreach($functPedido as $arrPedidoProdutos){

            $nomeProduto = $arrPedidoProdutos["nome_produto"];
            $qtdProduto = $arrPedidoProdutos["quantidade"];
            $precoProduto = $arrPedidoProdutos["preco"] * $qtdProduto;
            $pesoProdutos = $arrPedidoProdutos["peso"] * $qtdProduto;

            $corpo .= "<tr align='center' style='font-size:14px'>

            <td style='width:10%'>

                {$i}

            </td>

            <td style='width:50%'>

                {$nomeProduto}

            </td>

            <td style='width:20%'>

                {$qtdProduto}

            </td>

            <td style='width:20%'>

                ".number_format($precoProduto, 2, ",", ".")."

            </td>

        </tr>";

        $totalQtd += $qtdProduto;

        $totalValor += $precoProduto;

        $totalPeso += $pesoProdutos;

        $i++;

        }

        $corpo .= "<tr align='center'>

            <td style='width:10%'>

                <br>

            </td>

            <td style='width:50%'>

                

            </td>

            <td style='width:20%'>

                

            </td>

            <td style='width:20%'>

                

            </td>

        </tr>

        <tr align='center' style='font-size:13px'>

            <td style='width:10%'>

                

            </td>

            <td style='width:50%; text-align: right; background-color: #CCC;'>

                <b>TOTAIS</b>

            </td>

            <td style='width:20%'>

                {$totalQtd}

            </td>

            <td style='width:20%'>

                ".number_format($totalValor, 2, ",", ".")."

            </td>

        </tr>

        <tr align='center' style='font-size:13px'>

            <td style='width:10%'>

                

            </td>

            <td style='width:50%; text-align: right; background-color: #CCC;'>

                <b>PESO TOTAL (Kg)</b>

            </td>

            <td style='width:20%'>

                {$totalPeso}

            </td>

            <td style='width:20%'>

            </td>

        </tr>

    </table>

    <table border='1' cellspacing='0' cellpadding='5' width='100%' style='margin-top:5px'>

        <tr>

            <td align='center'>

                <span style='font-size: 15px;'><b>DECLARAÇÃO</b></span>

            </td>

        </tr>

        <tr>

            <td>

                <p style='padding:5px; font-size:13px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Declaro que não me enquadro no conceito de contribuinte previsto no art. 4º da Lei Complementar nº 87/1996, uma vez que não realizo,
                    com habitualidade ou em volume que caracterize intuito comercial, operações de circulação de mercadoria, ainda que se iniciem no exterior,
                    ou estou dispensado da emissão da nota fiscal por força da legislação tributária vigente, responsabilizando-me, nos termos da lei e a quem de
                    direito, por informações inverídicas.<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Declaro ainda que não estou postando conteúdo inflamável, explosivo, causador de combustão espontânea, tóxico, corrosivo, gás ou
                    qualquer outro conteúdo que constitua perigo, conforme o art. 13 da Lei Postal nº 6.538/78.</p><br>

                <div style='float: left;'>_______________ , _______ de ______________ de ________</div>
                <br>
                <div style='border-top: 1px solid black; float: right; width: 35%; text-align: center; font-size:12px'>Assinatura do Declarante/Remetente</div><br>

            </td>

        </tr>

    </table>

    <table border='1' cellspacing='0' cellpadding='5' width='100%' style='margin-top:5px'>

        <tr style='font-size:12px'>

            <td>

                <p><b>OBSERVAÇÃO</b><br>
                Constitui crime contra a ordem tributária suprimir ou reduzir tributo, ou contribuição social e qualquer acessório (Lei 8.137/90 Art. 1º, V).</p>

            </td>

        </tr>

    </table>

</body>

</html>";

$dompdf->loadHtml($corpo);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream("Declaracao-conteudo-pedido-{$id_pedido}.pdf", array("Attachment" => false));

?>