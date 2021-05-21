<?php

include "../classes/produtos.class.php";
$classeProdutos = new produtos();

$nome_variacao = str_replace(array(";", "'", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["nome_variacao"]));
$posicao = $_POST["posicao"];

$variacoes = $classeProdutos->retorna_op_variacoes($nome_variacao, "texto_cliente");

if($variacoes == ""){

    if($nome_variacao == "" || $nome_variacao == " " || $nome_variacao == "  " || $nome_variacao == "   "){

        ?>

            <input autocomplete="off" id="textoClienteVariacao<?php echo $posicao; ?>" type="text" class="form-control" name="texto-variacao<?php echo $posicao; ?>" disabled>

        <?php

    }else{

        ?>

            <input autocomplete="off" id="textoClienteVariacao<?php echo $posicao; ?>" type="text" class="form-control" name="texto-variacao<?php echo $posicao; ?>" maxlength="30">

        <?php

    }

}else{

    ?>

        <input autocomplete="off" id="textoClienteVariacao<?php echo $posicao; ?>" type="text" class="form-control" name="texto-variacao<?php echo $posicao; ?>" value="<?php echo $variacoes ?>" disabled>

    <?php

}

?>