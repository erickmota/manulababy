<?php

include "../vendor/autoload.php";

include "../classes/adm.class.php";

$classeAdm = new adm();

/* Verificando existencia do ADM */

if(isset($_COOKIE["aiu_oj"]) && isset($_COOKIE["aeu_oj"]) && isset($_COOKIE["asu_oj"]) && $classeAdm->verifica_existencia_adm($_COOKIE["aiu_oj"], $_COOKIE["aeu_oj"], $_COOKIE["asu_oj"]) == true){

    

}else{

    die("<script>window.location='../php/adm_deslogar.php'</script>");

}

/* // Verificando existencia do ADM */

$id_pedido = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["ip"]));

$functPedido = $classeAdm->retorna_dados_pedido_referencia($id_pedido);

foreach($functPedido as $arrPedido){

    $destiNomeCliente = mb_strtoupper($arrPedido["nome_cliente"], "UTF-8");
    $destRua = mb_strtoupper($arrPedido["rua"], "UTF-8");
    $destNumero = $arrPedido["numero"];
    $destCidade =  mb_strtoupper($arrPedido["cidade"], "UTF-8");
    $destUf = $arrPedido["uf"];
    $destCep = str_replace("-", "", $arrPedido["cep"]);
    $destCpf = $arrPedido["cpf"];
    $destCelular = $arrPedido["celular"];
    $destBairro = mb_strtoupper($arrPedido["bairro"], "UTF-8");
    $destComplemento = mb_strtoupper($arrPedido["complemento"], "UTF-8");
    $destDetalhes = $arrPedido["detalhes"];

}

$generator = new Picqer\Barcode\BarcodeGeneratorHTML();

$barcode = $generator->getBarcode(
    "$destCep",
    $generator::TYPE_CODE_128,
    2,
    70
);

require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$corpo = "<html>

<head>
    
    <style>

        #corpoEtiqueta{

            width: 50%;
            height: auto;
            border: 1px solid #CCC;
            padding: 20px 20px 0px 20px

        }

        #cabecalho{

            width: 100%;
            height: 28px;

        }

        #espacoInfoDest{

            width: 100%;

        }

        #espacoBar{

            width: 100%;
            height: auto;

        }

        #espacoRemetente{

            border-top: 2px solid rgb(224, 224, 224);
            margin-top: 20px;

        }

    </style>
    
<head>

<body>

    <div id='corpoEtiqueta'>

        <div id='cabecalho'>

            <div style='width: 50%; float: left;'>

                <img src='../img/destinatario.jpg'>
    
            </div>
    
            <div style='width: 50%; float: right;'>
    
                <img style='float: right;' src='../img/correiosLogo.jpg'>
    
            </div>

        </div>

        <div id='espacoInfoDest'>

            <p>

                {$destiNomeCliente}<br>
                FONE {$destCelular}<br>
                {$destRua} Nº {$destNumero}<br>
                {$destBairro}<br>";

                if($destComplemento != ""){

                    $corpo .= "{$destComplemento}<br>";

                }

                $corpo .="{$destCidade}/{$destUf}<br>
                {$destCep}<br>";

                if($destDetalhes != ""){

                    $corpo .= "<br><b>Observação:</b> {$destDetalhes}<br>";

                }

            $corpo .="</p>

        </div>

        <div id='espacoBar' align='center'>

            <div style='margin-left: auto;
            margin-right: auto;
            width: 10em'>{$barcode}</div>
            <span style='font-size: 13px; color: rgb(65, 65, 65)'>{$destCep}</span>

        </div>

        <div id='espacoRemetente'>

            <p style='font-size: 13px; color: rgb(65, 65, 65)'>

                <b>Remetente:</b><br>
                OSCAR MUNIZ<br>
                (15) 98144-6951<br>
                RUA MICHEL CHICRI MALUF Nº 215<br>
                PQ DAS LARANJEIRAS<br>
                18077370 &nbsp;&nbsp;&nbsp; SOROCABA/SP

            </p>

        </div>

    </div>

</body>

</html>";

$dompdf->loadHtml($corpo);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream("Etiqueta-correios-pedido-{$id_pedido}.pdf", array("Attachment" => false));

?>

<!-- <html>

<head>
    
    <style>

        #corpoEtiqueta{

            width: 50%;
            height: 50%;

        }

        #cabecalho{

            width: 100%;
            height: 28px;

        }

        #espacoInfoDest{

            width: 100%;

        }

        #espacoBar{

            width: 100%;
            height: auto;

        }

        #espacoRemetente{

            border-top: 2px solid rgb(224, 224, 224);
            margin-top: 20px;

        }

    </style>
    
<head>

<body>

    <div id='corpoEtiqueta'>

        <div id='cabecalho'>

            <div style='width: 50%; float: left;'>

                <img src='../img/destinatario.jpg'>
    
            </div>
    
            <div style='width: 50%; float: right;'>
    
                <img style='float: right;' src='../img/correiosLogo.jpg'>
    
            </div>

        </div>

        <div id='espacoInfoDest'>

            <p>

                ERICK PATRICK LAURINDO MOTA<br>
                FONE (15) 99633-1314<br>
                RUA CASTILHO ARIBERT FAZZIO Nº 355<br>
                JD TUPINAMBÁ<br>
                SOROCABA/SP<br>
                18066315

            </p>

        </div>

        <div id='espacoBar' align='center'>

            <?php echo $barcode; ?>
            <span style='font-size: 13px; color: rgb(65, 65, 65)'>18066315</span>

        </div>

        <div id='espacoRemetente'>

            <p style='font-size: 13px; color: rgb(65, 65, 65)'>

                <b>Remetente:</b><br>
                ERICK PATRICK LAURINDO MOTA<br>
                (15) 99633-1314<br>
                RUA CASTILHO ARIBERT FAZZIO Nº 355<br>
                JD TUPINAMBÁ<br>
                18066315 &nbsp;&nbsp;&nbsp; SOROCABA/SP

            </p>

        </div>

    </div>

</body>

</html> -->