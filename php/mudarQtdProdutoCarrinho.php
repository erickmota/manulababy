<?php

include "../classes/compra.class.php";

$classeCompra = new compra();

/* $id_sacola = htmlentities($_GET["id_sacola"]);
$nova_qtd = htmlentities($_GET["nova_qtd"]); */
$id_sacola = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["id_sacola"]));
$nova_qtd = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["nova_qtd"]));

/* Verificar existencia usuário */

if(!isset($classeClientes)){

    include "../classes/clientes.class.php";
    $classeClientes = new clientes();

}

if(isset($_COOKIE["iu_mb"]) && isset($_COOKIE["eu_mb"]) && isset($_COOKIE["su_mb"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_mb"], $_COOKIE["eu_mb"], $_COOKIE["su_mb"]) == true){

    if($classeClientes->verifica_se_sacola_pertence_ao_cliente($id_sacola, base64_decode($_COOKIE["iu_mb"])) > 0){



    }else{

        die("<script>window.location='../php/deslogar.php'</script>");

    }

}else{

    die("<script>window.location='../php/deslogar.php'</script>");

}

/* //Verificar existencia usuário */

$classeCompra->atualiza_qtd_produto_carrinho($id_sacola, $nova_qtd);

?>

<script>

    window.location="../sacola";

</script>