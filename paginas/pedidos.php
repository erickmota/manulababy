<!DOCTYPE html>
<htm>

<head>

    <?php

    $explode = explode("/", $_GET["url"]);

    /* Verificar existencia usuário */

    if(!isset($classeClientes)){

        include "classes/clientes.class.php";
        $classeClientes = new clientes();

    }

    if(isset($_COOKIE["iu_mb"]) && isset($_COOKIE["eu_mb"]) && isset($_COOKIE["su_mb"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_mb"], $_COOKIE["eu_mb"], $_COOKIE["su_mb"]) == true){



    }else{

        die("<script>window.location='php/deslogar.php'</script>");

    }

    /* //Verificar existencia usuário */
    
    /* Iniciando classe */
    include "classes/compra.class.php";
    $classeCompra = new compra();

    /* $idCliente = $classeCompra->idCliente = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", base64_decode($_COOKIE["iu_oj"]));

    $classeCompra->idCliente = $idCliente; */

    if(isset($_GET["ls"]) && $_GET["ls"] == "s"){

        $classeCompra->idCliente = base64_decode($_COOKIE["iu_mb"]);

        $classeCompra->limpar_carrinho();

    }
    
    ?>

    <title>Meus Pedidos - Manula Baby</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- <link type="text/css" rel="stylesheet" href="../lightslider/src/css/lightslider.css" /> -->                  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- <script src="../lightslider/src/js/lightslider.js"></script> -->

    <?php

    /* Definindo a base para o site */
    include "php/base_paginas.php";
    
    ?>

    <link rel="stylesheet" href="css/pedidos.css">

</head>

<body>

    <div class="container-fluid">

        <?php
        
        /* Cabeçalho */
        include "phpPartes/cabecalho.php";
        
        ?>

        <div class="row justify-content-center mt-3">

            <div class="col-lg-10 pt-3 pb-3">

                <h1 class="fs-2 fw-light text-secondary" id="nome">Meus Pedidos</h1>

            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-lg-10" id="fundoTituloProdutos">

                <span class="fs-5 text-white">PEDIDOS</span>

            </div>

        </div>

        <div class="row justify-content-center" id="corpoPedido">

            <div class="col-lg-10">

                <div class="table-responsive">

                    <table class="table text-center" id="corpoPedidos">

                    </table>

                    <script type="text/javascript">
                                                                                
                        function retorna_pedidos(usuario) {
    
                            $.ajax({
    
                                type: "POST",
                                dataType: "html",
    
                                url: "ajax/retorna_pedidos.php",
    
                                beforeSend: function () {
    
                                    $("#corpoPedidos").html("<img class='imgLoading mt-4' src='img/carregando2.gif' width='100px'><br><p>Trazendo informações</p>");
    
                                },
    
                                data: {usuario: usuario},
    
                                success: function (msg) {
    
                                    $("#corpoPedidos").html(msg);
    
                                }
    
                            });
    
                        }
    
                        $(document).ready(function(){
    
                            retorna_pedidos("Erick");
    
                        });
        
                    </script>

                </div>

            </div>

        </div>
        
        <?php
      
        /* Rodapé */
        include "phpPartes/rodape.php";
        
        ?>

    </div>

</body>

</htm>