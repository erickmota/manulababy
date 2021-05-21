<?php

include "../classes/produtos.class.php";
$classeProdutos = new produtos();

/* Verificando existencia do ADM */

if(!isset($classeAdm)){

    include "../classes/adm.class.php";
    $classeAdm = new adm();

}

if(isset($_COOKIE["aiu_oj"]) && isset($_COOKIE["aeu_oj"]) && isset($_COOKIE["asu_oj"]) && $classeAdm->verifica_existencia_adm($_COOKIE["aiu_oj"], $_COOKIE["aeu_oj"], $_COOKIE["asu_oj"]) == true){

    

}else{

    die("<script>window.location='../php/adm_deslogar.php'</script>");

}

/* // Verificando existencia do ADM */

$nome_categoria = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["nome"], ENT_QUOTES, "UTF-8"));

$funcCategoria = $classeProdutos->adicionar_categoria_adm($nome_categoria);

if($funcCategoria == true){

    echo "<script>window.location='../adm/configuracoes'</script>";

}else{

    echo "<script>window.alert('Essa categoria já existe!'); window.location='../adm/configuracoes'</script>";

}

?>