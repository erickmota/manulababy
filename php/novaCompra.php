<?php

/* $cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$bairro = $_POST["bairro"];
$rua = $_POST["rua"];
$complemento = $_POST["complemento"];
$numero = $_POST["numero"];
$referenciaPS = $_POST["referencia"];
$cep = $_POST["cep"]; */
$cidade = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["cidade"], ENT_QUOTES, "UTF-8"));
$estado = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["estado"], ENT_QUOTES, "UTF-8"));
$bairro = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["bairro"], ENT_QUOTES, "UTF-8"));
$rua = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["rua"], ENT_QUOTES, "UTF-8"));
$complemento = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["complemento"], ENT_QUOTES, "UTF-8"));
$numero = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["numero"]));
$referenciaPS = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["referencia"]));
$cep = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["cep"]));
$detalhes = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["detalhes"], ENT_QUOTES, "UTF-8"));
$cpf = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["cpf"]));
$celular = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["celular"]));

include "../classes/compra.class.php";
$classeCompra = new compra();

/* $classeCompra->idCliente = base64_decode($_COOKIE["iu_oj"]); */
$classeCompra->idCliente = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($_COOKIE["iu_mb"])));

/* Verificar existencia usuário */

if(!isset($classeClientes)){

    include "../classes/clientes.class.php";
    $classeClientes = new clientes();

}

if(isset($_COOKIE["iu_mb"]) && isset($_COOKIE["eu_mb"]) && isset($_COOKIE["su_mb"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_mb"], $_COOKIE["eu_mb"], $_COOKIE["su_mb"]) == true){

    

}else{

    die("<script>window.location='./php/deslogar.php'</script>");

}

/* //Verificar existencia usuário */

$dataHora = date("Y-m-d H:i:s");

$classeCompra->adicionar_nova_compra($referenciaPS, $cidade, $estado, $bairro, $rua, $complemento, $numero, $cep, $dataHora, "Em processamento", $detalhes, $cpf, $celular);

/* echo "{$referenciaPS}, {$cidade}, {$estado}, {$bairro}, {$rua}, {$complemento}, {$numero}, {$cep}"; */

?>