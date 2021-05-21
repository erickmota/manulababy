<?php

include "../classes/adm.class.php";
$classeAdm = new adm();

$email = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["email"]));
$senha = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["senha"]));

$classeAdm->email = $email;
$classeAdm->senha = $senha;

$funcLogin = $classeAdm->login();

if($funcLogin == 1){

    echo "<script>alert ('Login efetuado com sucesso!'); window.location='../adm/novo-produto'</script>";

}else{

    echo "<script>alert ('E-mail ou senha incorretos!'); history.back();</script>";

}

?>