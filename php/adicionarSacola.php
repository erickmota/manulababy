<?php

    include "../classes/compra.class.php";

    $classeCompra = new compra();

    $tamanho = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["tamanho"], ENT_QUOTES, "UTF-8"));
    /* $variacaoComplementar = htmlentities($_GET["variacaoComplementar"]); */
    $variacaoComplementar = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["variacaoComplementar"], ENT_QUOTES, "UTF-8"));
    /* $variacaoComplementar2 = htmlentities($_GET["variacaoComplementar2"]); */
    $variacaoComplementar2 = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["variacaoComplementar2"], ENT_QUOTES, "UTF-8"));
    /* $variacaoComplementar3 = htmlentities($_GET["variacaoComplementar3"]); */
    $variacaoComplementar3 = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["variacaoComplementar3"], ENT_QUOTES, "UTF-8"));
    /* $quantidade = htmlentities($_GET["quantidade"]); */
    $quantidade = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["quantidade"], ENT_QUOTES, "UTF-8"));
    /* $idProduto = htmlentities($_GET["idProduto"]); */
    $idProduto = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["idProduto"], ENT_QUOTES, "UTF-8"));


    if(!isset($classeClientes)){

        include "../classes/clientes.class.php";
        $classeClientes = new clientes();

    }

    if(isset($_COOKIE["iu_mb"]) && isset($_COOKIE["eu_mb"]) && isset($_COOKIE["su_mb"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_mb"], $_COOKIE["eu_mb"], $_COOKIE["su_mb"]) == true){

        

    }else{

        die("<script>window.location='../php/deslogar.php'</script>");

    }
    
    $classeCompra->idCliente = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($_COOKIE["iu_mb"])));
    $classeCompra->tamanho = $tamanho;
    $classeCompra->variacaoComplementar = $variacaoComplementar;
    $classeCompra->variacaoComplementar2 = $variacaoComplementar2;
    $classeCompra->variacaoComplementar3 = $variacaoComplementar3;
    $classeCompra->quantidade = $quantidade;
    $classeCompra->idProduto = $idProduto;

    $classeCompra->adicionar_produto_carrinho();

?>

<script>

    window.location="../sacola";

</script>