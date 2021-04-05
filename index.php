<?php

if(isset($_GET["url"])){

    $explode = explode("/", $_GET["url"]);

    if($explode[0] == "loja"){

        include "paginas/loja.php";

    }

}else{

    include "paginas/home.php";

}

?>