<?php

include "../classes/clientes.class.php";
$classeclientes = new clientes;

$email = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["email"]));
$senha = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["senha"]));
$urlAtual = $_POST["url"];

$classeclientes->emailUsuario = $email;
$classeclientes->senhaUsuario = $senha;

/* $classeclientes->login(); */

if($classeclientes->login() == 1){

    echo "<script>alert ('Login efetuado com sucesso!'); window.location='{$urlAtual}'</script>";

}else{

    echo "<script>alert ('E-mail ou senha incorretos!'); history.back();</script>";

}

?>