<?php

include "../classes/clientes.class.php";
$classeClientes = new clientes;

$classeClientes->deslogar();

echo "<script>window.location='../'</script>";

?>