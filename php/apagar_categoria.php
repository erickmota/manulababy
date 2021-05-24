<?php

include "../classes/produtos.class.php";
$classeProdutos = new produtos();

/* Verificando existencia do ADM */

if(!isset($classeAdm)){

    include "../classes/adm.class.php";
    $classeAdm = new adm();

}

if(isset($_COOKIE["aiu_mb"]) && isset($_COOKIE["aeu_mb"]) && isset($_COOKIE["asu_mb"]) && $classeAdm->verifica_existencia_adm($_COOKIE["aiu_mb"], $_COOKIE["aeu_mb"], $_COOKIE["asu_mb"]) == true){

    

}else{

    die("<script>window.location='../php/adm_deslogar.php'</script>");

}

/* // Verificando existencia do ADM */

$id_categoria = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["id_categoria"]));

if($classeProdutos->retorna_qtd_produtos_por_categoria($id_categoria) > 0){

    die("<script>window.alert('Remova os produtos cadastrados nessa categoria, antes de prosseguir.'); history.back();</script>");

}

$classeProdutos->apagar_categoria($id_categoria);

?>

<script>

    window.location="../adm/configuracoes";

</script>