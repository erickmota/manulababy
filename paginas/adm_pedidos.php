<!DOCTYPE html>
<html>

<head>

    <title>Pedidos - adm - Manulá Baby</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Geral -->
    <meta name="description" content="Compre lindas roupas infantis com o melhor custo benefício do mercado, só aqui na Manulá Baby.">
    <meta name="author" content="erickmota.com">
    <meta name="robots" content="noindex">

    <!-- Google+ / Schema.org -->
    <meta itemprop="name" content="Manulá Baby">
    <meta itemprop="description" content="Compre lindas roupas infantis com o melhor custo benefício do mercado, só aqui na Manulá Baby.">
    <meta itemprop="image" content="img/apresentacao.jpg">

    <!-- Open Graph Facebook -->
    <meta property="og:title" content="Manulá Baby">
    <meta property="og:description" content="Compre lindas roupas infantis com o melhor custo benefício do mercado, só aqui na Manulá Baby."/>
    <meta property="og:site_name" content="Manulá Baby"/>
    <meta property="og:type" content="website">
    <meta property="og:image" content="img/apresentacao.jpg">

    <!-- Twitter -->
    <meta name="twitter:title" content="Manulá Baby">
    <meta name="twitter:description" content="Compre lindas roupas infantis com o melhor custo benefício do mercado, só aqui na Manulá Baby.">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image" content="img/apresentacao.jpg">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- <link type="text/css" rel="stylesheet" href="lightslider/src/css/lightslider.css" /> -->                  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- <script src="lightslider/src/js/lightslider.js"></script> -->

    <?php

    /* Definindo a base para o site */
    include "php/base_paginas.php";
    
    ?>

    <link rel="stylesheet" href="css/adm_pedidos.css">

    <script>

        function alterar_status_entrega(status, id_pedido){

            window.location="php/alterar_status_entrega.php?status="+status+"&id_pedido="+id_pedido;

        }

    </script>

</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <?php
            
            include "phpPartes/menu_adm.php";
            
            ?>

            <div class="col-12 col-md-9 offset-md-3">

                <div class="row mt-3">

                    <div class="col text-secondary">

                        <img id="iconeMenu" style="cursor: pointer;" class="float-start mt-1 me-3 d-block d-md-none" src="img/menu.png" width="30px"><h1>Pedidos</h1>

                    </div>

                </div>

                <script src="jsPartes/adm_menu_mobile.js"></script>

                <div class="row mt-3">

                    <div class="col-12 col-sm-6">

                        <form method="GET" action="adm/pedidos">

                            <input type="text" class="form-control" placeholder="Buscar por cód ou cliente" name="q">

                        </form>

                    </div>

                    <div class="col-12 col-sm-6">



                    </div>

                </div>

                <div class="row mt-3 justify-content-center" id="corpoPedido">

                    <div class="col">
        
                        <div class="table-responsive">
        
                            <table class="table text-center" id="corpoPedidos">
        
                            </table>
        
                            <script type="text/javascript">
                                                                                        
                                    function retorna_pedidos(busca) {
                
                                        $.ajax({
                
                                            type: "POST",
                                            dataType: "html",
                
                                            url: "ajax/retorna_pedidos_adm.php",
                
                                            beforeSend: function () {
                
                                                $("#corpoPedidos").html("<img class='imgLoading mt-4' src='img/carregando2.gif' width='100px'><br><p>Trazendo informações</p>");
                
                                            },
                
                                            data: {busca: busca},
                
                                            success: function (msg) {
                
                                                $("#corpoPedidos").html(msg);
                
                                                /* setTimeout(function() {
                                                    $("#areaIconeOk").html("");
                                                    $("#textoAnotacoesRapidas").removeClass("is-valid");;
                                                }, 3000); */
                
                                            }
                
                                        });
                
                                    }
                
                                    $(document).ready(function(){

                                        <?php
                                        
                                        if(isset($_GET["q"])){

                                            $busca =  htmlspecialchars($_GET["q"], ENT_QUOTES, "UTF-8");

                                        }else{

                                            $busca = "SE";

                                        }
                                        
                                        ?>

                                        var busca = "<?php echo $busca; ?>";
                
                                        retorna_pedidos(busca);
                
                                    });
                
                            </script>
        
                        </div>
        
                    </div>
        
                </div>

            </div>

        </div>

    </div>
    
</body>

</html>