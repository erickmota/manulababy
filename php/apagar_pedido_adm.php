<?php

include "../classes/compra.class.php";

$classeCompra = new compra();

$idCliente = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["idU"]));
$referencia = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["referencia"]));

$classeCompra->idCliente = $idCliente;

if($classeCompra->verifica_se_referencia_pertence_ao_cliente($referencia) == true){

    $classeCompra->apagar_pedido_e_item_pedido($referencia);

}

?>

<script>

    window.location="../adm/pedidos";

</script>