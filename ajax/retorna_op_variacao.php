<!-- FlexDatalist -->
<link href="jquery-flexdatalist-2.3.0/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
<script src="jquery-flexdatalist-2.3.0/jquery.flexdatalist.min.js"></script>

<?php

include "../classes/produtos.class.php";
$classeProdutos = new produtos();

$nome_variacao = str_replace(array(";", "'", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["nome_variacao"]));
$posicao = $_POST["posicao"];

$variacoes = $classeProdutos->retorna_op_variacoes($nome_variacao, "opcoes");

if($variacoes == ""){

    if($nome_variacao == "" || $nome_variacao == " " || $nome_variacao == "  " || $nome_variacao == "   "){

        ?>

            <input id="opVariacao<?php echo $posicao; ?>" type='text' class='flexdatalist flex<?php echo $posicao; ?> form-control' data-min-length='1' multiple='multiple' name="opNovaVariacao<?php echo $posicao; ?>" disabled>

            <!-- <script>

                $('.flexdatalist').flexdatalist('disabled', true);

            </script> -->

        <?php

    }else{

        ?>

            <input id="opVariacao<?php echo $posicao; ?>" type='text' class='flexdatalist flex<?php echo $posicao; ?> form-control' data-min-length='1' multiple='multiple' name="opNovaVariacao<?php echo $posicao; ?>">

        <?php

    }

}else{

?>

    <input id="opVariacao<?php echo $posicao; ?>" type='text' class='flexdatalist flex<?php echo $posicao; ?> form-control' data-min-length='1' multiple='multiple' name="opNovaVariacao<?php echo $posicao; ?>" value="<?php echo $variacoes; ?>">

    <script>

        $('.flex<?php echo $posicao; ?>').flexdatalist('disabled', true);

    </script>

<?php

}

?>