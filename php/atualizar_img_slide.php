<?php

include "../classes/adm.class.php";
$classeAdm = new adm;

/* Verificando existencia do ADM */

if(isset($_COOKIE["aiu_mb"]) && isset($_COOKIE["aeu_mb"]) && isset($_COOKIE["asu_mb"]) && $classeAdm->verifica_existencia_adm($_COOKIE["aiu_mb"], $_COOKIE["aeu_mb"], $_COOKIE["asu_mb"]) == true){

    

}else{

    die("<script>window.location='../php/adm_deslogar.php'</script>");

}

/* // Verificando existencia do ADM */

$img = $_FILES["img"];
$posicao = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["hiddenFoto"]));

$funcImg = $classeAdm->trocar_slide($posicao, $img);

if($funcImg == true){

    echo "<script>window.alert('Slide atualizado com sucesso!'); window.location='../adm/configuracoes'</script>";

}else{

    echo "<script>window.alert('Verifique o formato da imagem, ela precisa ser JPG'); history.back();</script>";

}

?>