<?php

include "../classes/compra.class.php";

$classeCompra = new compra();

/* $idCliente = $_GET["idU"];
$referencia = $_GET["referencia"]; */
$idCliente = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["idU"]));
$referencia = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["referencia"]));

if(isset($_GET["ind"])){

    $retornar = "../pedidos";

}else{

    $retornar = "../sacola";

}

if(!isset($classeClientes)){

    include "../classes/clientes.class.php";
    $classeClientes = new clientes();

}

if(isset($_COOKIE["iu_mb"]) && isset($_COOKIE["eu_mb"]) && isset($_COOKIE["su_mb"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_mb"], $_COOKIE["eu_mb"], $_COOKIE["su_mb"]) == true){

    if($idCliente == base64_decode($_COOKIE["iu_mb"])){

        $classeCompra->idCliente = $idCliente;

        if($classeCompra->verifica_se_referencia_pertence_ao_cliente($referencia) == true){

            $classeCompra->apagar_pedido_e_item_pedido($referencia);

        }
    
    }

}

?>

<script>

    window.location = "<?php echo $retornar; ?>";

</script>