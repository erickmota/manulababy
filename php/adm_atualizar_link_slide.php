<?php

include "../classes/adm.class.php";
$classeAdm = new adm();

/* Verificando existencia do ADM */

if(isset($_COOKIE["aiu_mb"]) && isset($_COOKIE["aeu_mb"]) && isset($_COOKIE["asu_mb"]) && $classeAdm->verifica_existencia_adm($_COOKIE["aiu_mb"], $_COOKIE["aeu_mb"], $_COOKIE["asu_mb"]) == true){

    

}else{

    die("<script>window.location='../php/adm_deslogar.php'</script>");

}

/* // Verificando existencia do ADM */

$link = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["link"]));
$posicao = $_POST["hiddenLink"];

$classeAdm->atualizar_link_slide($posicao, $link);

?>

<script>

    window.alert("Link atualizado com sucesso!");
    window.location="../adm/configuracoes";

</script>