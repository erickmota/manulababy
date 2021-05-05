<?php

include "../classes/clientes.class.php";
$classeclientes = new clientes;

$nome = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["nome"], ENT_QUOTES, "UTF-8"));
$email = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["email"]));
$senha = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["senha"], ENT_QUOTES, "UTF-8"));
$confirmarSenha = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["confirmarSenha"], ENT_QUOTES, "UTF-8"));

$classeclientes->emailUsuario = $email;

$verificaEmail = $classeclientes->verifica_existencia_email();

if($verificaEmail > 0){

    die("E-mail já existe na base de dados!");

}

if($senha != $confirmarSenha){

    die("Senha e confirmar senha são diferentes!");

}

$classeclientes->nomeUsuario = $nome;
$classeclientes->senhaUsuario = $senha;

$classeclientes->cadastrar("pendente");

header("Location: ../aviso-confirmar?e={$email}");

?>