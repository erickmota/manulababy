<?php

include "../classes/adm.class.php";
$classeAdm = new adm;

$classeAdm->deslogar();

echo "<script>window.location='../adm/login'</script>";

?>