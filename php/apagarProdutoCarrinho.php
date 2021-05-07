<?php

include "../classes/compra.class.php";

$classeCompra = new compra();

/* @$id_sacola = $_GET["id_sacola"];
@$limpar = $_GET["limpar"]; */
@$id_sacola = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["id_sacola"]));
@$limpar = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["limpar"]));

/* Verificar existencia usuário */

if(!isset($classeClientes)){

    include "../classes/clientes.class.php";
    $classeClientes = new clientes();

}

if(isset($_COOKIE["iu_mb"]) && isset($_COOKIE["eu_mb"]) && isset($_COOKIE["su_mb"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_mb"], $_COOKIE["eu_mb"], $_COOKIE["su_mb"]) == true){

    if(isset($limpar)){



    }else{

        if($classeClientes->verifica_se_sacola_pertence_ao_cliente($id_sacola, base64_decode($_COOKIE["iu_mb"])) > 0){



        }else{
    
            die("<script>window.location='../php/deslogar.php'</script>");
    
        }

    }

}else{

    die("<script>window.location='../php/deslogar.php'</script>");

}

/* //Verificar existencia usuário */

if(isset($limpar) && $limpar == "sim"){

    $classeCompra->idCliente = base64_decode($_COOKIE["iu_mb"]);

    $classeCompra->limpar_carrinho();

}else{

    $classeCompra->apagar_produto_individual_carrinho($id_sacola);

}

?>

<script>

    window.location="../sacola";

</script>