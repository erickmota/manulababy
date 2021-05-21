<?php

include "../classes/adm.class.php";
$classeAdm = new adm();

/* Verificando existencia do ADM */

if(isset($_COOKIE["aiu_oj"]) && isset($_COOKIE["aeu_oj"]) && isset($_COOKIE["asu_oj"]) && $classeAdm->verifica_existencia_adm($_COOKIE["aiu_oj"], $_COOKIE["aeu_oj"], $_COOKIE["asu_oj"]) == true){

    

}else{

    die("<script>window.location='../php/adm_deslogar.php'</script>");

}

/* // Verificando existencia do ADM */

$sinal = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["sinal"]));
$porcentagem = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["porcentagem"]));
$tipo = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["tipo"]));

if($porcentagem < 100){

    $alteraStringPorcentagem = "0.".substr($porcentagem, 1, 2);

}else{

    $alteraStringPorcentagem = "1";

}

$classeAdm->alterar_preco_produtos_tipo($sinal, $alteraStringPorcentagem, $tipo);

?>

<script>

    window.alert("Os preços foram alterados com sucesso!");
    window.location="../adm/produtos-cadastrados";

</script>