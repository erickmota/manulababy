<?php

/* Verificar existencia usuário */

if(!isset($classeClientes)){

    include "../classes/clientes.class.php";
    $classeClientes = new clientes();

}

if(isset($_COOKIE["iu_mb"]) && isset($_COOKIE["eu_mb"]) && isset($_COOKIE["su_mb"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_mb"], $_COOKIE["eu_mb"], $_COOKIE["su_mb"]) == true){

    

}else{

    die("<script>window.location='../php/deslogar.php'</script>");

}

/* //Verificar existencia usuário */

/* $nome = $_POST["nome"]; */
$senha = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["senha"], ENT_QUOTES, "UTF-8"));
$novaSenha = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["novaSenha"], ENT_QUOTES, "UTF-8"));
$repetirNovaSenha = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["repetirNovaSenha"], ENT_QUOTES, "UTF-8"));

$classeClientes->emailUsuario = str_replace(array(";", "'", "/", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($_COOKIE["eu_mb"])));
$classeClientes->senhaUsuario = $senha;

$verificaUsuario = $classeClientes->verifica_se_senha_e_do_usuario();

if($verificaUsuario == false){

    die("<script>window.alert('A senha atual digitada, está incorreta!'); window.location='../ajustes'</script>");

}

if($novaSenha != $repetirNovaSenha){

    die("<script>window.alert('Os campos nova senha e repetir nova senha não conferem!'); window.location='../ajustes'</script>");

}

$novaSenhaCompactada = base64_encode($novaSenha);

$classeClientes->idUsuario = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($_COOKIE["iu_mb"])));

$classeClientes->atualiza_dado_individual_cliente("senha", $novaSenhaCompactada);

$classeClientes->deslogar();

?>

<script>

    window.alert("Sua senha foi alterada com sucesso! Para sua segurança, faça o login novamente.");
    window.location="../";

</script>