<!DOCTYPE html>
<html>

<head>

    <?php

    $explode = explode("/", $_GET["url"]);
    
    /* Iniciando classe */
    include "classes/compra.class.php";
    $classeCompra = new compra();

    include "classes/clientes.class.php";
    $classeClientes = new clientes();

    include "classes/adm.class.php";
    $classeAdm = new adm();

    @$idCliente = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($_COOKIE["iu_mb"])));

    $classeCompra->idCliente = $idCliente;

    $referencia = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["ref"]));

    if($classeClientes->verificar_se_numero_pedido_pertence_ao_cliente($referencia, $idCliente) > 0){



    }else{

        if(isset($_COOKIE["aiu_mb"]) && isset($_COOKIE["aeu_mb"]) && isset($_COOKIE["asu_mb"]) && $classeAdm->verifica_existencia_adm($_COOKIE["aiu_mb"], $_COOKIE["aeu_mb"], $_COOKIE["asu_mb"]) == true){



        }else{

            die("<script>window.location='./'</script>");

        }


    }
    
    ?>

    <title>Manula Baby</title>

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

    <link rel="stylesheet" href="css/itemPedido.css">

</head>

<body>

    <div class="container-fluid">

        <?php
        
        /* Cabeçalho */
        include "phpPartes/cabecalho.php";
        
        ?>

        <div class="row justify-content-center mt-3">

            <div class="col-lg-10 pt-3 pb-1">

                <h1 class="fs-2 fw-light text-secondary" id="nome">Pedido <?php echo htmlentities($_GET["ref"]); ?></h1>

            </div>

        </div>

        <?php
        
        foreach($classeCompra->retorna_dados_pedido_por_referencia($referencia) as $arrRef){

            if($arrRef["status_entrega"] == "Em processamento"){

                $bordaVerde[0] = "";
                $bordaLaranja[0] = "transicao";
                $bordaVerde[1] = "";
                $bordaLaranja[1] = "";
                $bordaVerde[2] = "";
                $bordaLaranja[2] = "";
                $bordaVerde[3] = "";
                $bordaLaranja[3] = "";

            }else if($arrRef["status_entrega"] == "Preparando produto"){

                $bordaVerde[0] = "ativo";
                $bordaLaranja[0] = "";
                $bordaVerde[1] = "";
                $bordaLaranja[1] = "transicao";
                $bordaVerde[2] = "";
                $bordaLaranja[2] = "";
                $bordaVerde[3] = "";
                $bordaLaranja[3] = "";

            }else if($arrRef["status_entrega"] == "Em transporte"){

                $bordaVerde[0] = "ativo";
                $bordaLaranja[0] = "";
                $bordaVerde[1] = "ativo";
                $bordaLaranja[1] = "";
                $bordaVerde[2] = "";
                $bordaLaranja[2] = "transicao";
                $bordaVerde[3] = "";
                $bordaLaranja[3] = "";

            }else if($arrRef["status_entrega"] == "Entregue"){

                $bordaVerde[0] = "ativo";
                $bordaLaranja[0] = "";
                $bordaVerde[1] = "ativo";
                $bordaLaranja[1] = "";
                $bordaVerde[2] = "ativo";
                $bordaLaranja[2] = "";
                $bordaVerde[3] = "ativo";
                $bordaLaranja[3] = "";

            }
        
        ?>

        <div class="row justify-content-center pb-3">

            <div class="col-lg-10 border-top border-bottom pb-3">

                <div class="row">

                    <div class="col-6 col-sm-3 mt-3">

                        <div id="boxProcesso" class="text-center <?php echo $bordaVerde[0]; echo $bordaLaranja[0]; ?>">

                            <small id="textoBoxProcesso">EM<br>PROCESSAMENTO

                            <?php
                            
                            if($arrRef["status_entrega"] == "Em processamento"){
                            
                            ?>

                            <br><img src="img/carregando3.gif" width="40px">

                            <?php
                            
                            }else{
                            
                            ?>
                            
                            <br><img src="img/ok.png" width="25px">

                            <?php
                            
                            }
                            
                            ?>
                        
                            </small>

                        </div>

                    </div>

                    <div class="col-6 col-sm-3 mt-3">

                        <div id="boxProcesso" class="text-center <?php echo $bordaVerde[1]; echo $bordaLaranja[1]; ?>">

                            <small id="textoBoxProcesso">PREPARANDO<br>PRODUTOS

                            <?php
                            
                            if($arrRef["status_entrega"] == "Preparando produto"){
                            
                            ?>

                            <br><img src="img/carregando3.gif" width="40px">

                            <?php
                            
                            }else if($arrRef["status_entrega"] == "Em transporte" || $arrRef["status_entrega"] == "Entregue"){
                            
                            ?>
                            
                            <br><img src="img/ok.png" width="25px">

                            <?php
                            
                            }
                            
                            ?>
                        
                            </small>

                        </div>

                    </div>

                    <div class="col-6 col-sm-3 mt-3">

                        <div id="boxProcesso" class="text-center <?php echo $bordaVerde[2]; echo $bordaLaranja[2]; ?>">

                            <small id="textoBoxProcesso">EM<br>TRANSPORTE

                            <?php
                            
                            if($arrRef["status_entrega"] == "Em transporte"){
                            
                            ?>

                            <br><img src="img/carregando3.gif" width="40px">

                            <?php
                            
                            }else if($arrRef["status_entrega"] == "Entregue"){
                            
                            ?>
                            
                            <br><img src="img/ok.png" width="25px">

                            <?php
                            
                            }
                            
                            ?>
                        
                            </small>

                        </div>

                    </div>

                    <div class="col-6 col-sm-3 mt-3">

                        <div id="boxProcesso" class="text-center <?php echo $bordaVerde[3]; echo $bordaLaranja[3]; ?>">

                            <small id="textoBoxProcesso">ENTREGUE

                            <?php
                            
                            if($arrRef["status_entrega"] == "Entregue"){
                            
                            ?>
                            
                            <br><img src="img/ok.png" width="25px">

                            <?php
                            
                            }
                            
                            ?>
                        
                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="row justify-content-center mb-3">

            <div class="col-11 col-lg-10 fw-light" id="fundoEndereco">

                <h5 class="text-secondary mt-2">Entragar em:</h5>

                <p class="text-secondary">

                    <b>CEP:</b> <?php echo $arrRef["cep_entrega"]; ?> / <b>Cidade:</b> <?php echo $arrRef["cidade_entrega"]; ?> - <?php echo $arrRef["estado_entrega"]; ?> / <b>Bairro:</b> <?php echo $arrRef["bairro_entrega"]; ?> / <b>Rua:</b> <?php echo $arrRef["rua_entrega"]; ?> / <b>Nº:</b> <?php echo $arrRef["numero_entrega"]; ?>
                    
                    <?php
                    
                    if($arrRef["complemento_entrega"] != ""){
                    
                    ?>

                    / <b>Complemento:</b> <?php echo $arrRef["complemento_entrega"]; ?>

                    <?php
                    
                    }
                    
                    ?>

                    <?php
                    
                    if($arrRef["detalhes_entrega"] != ""){
                    
                    ?>

                    / <b>Detalhes adicionais:</b> <?php echo $arrRef["detalhes_entrega"]; ?>

                    <?php
                    
                    }
                    
                    ?>

                </p>

                <h5 class="text-secondary mt-2">Dados:</h5>

                <p class="text-secondary">

                    <b>CPF/CNPJ:</b> <?php echo $arrRef["cpf"]; ?> / <b>Número para contato:</b> <?php echo $arrRef["celular"]; ?>

                </p>

            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-lg-10" id="fundoTituloProdutos">

                <span class="fs-5 text-white">PRODUTOS</span>

            </div>

        </div>

        <?php

        foreach($classeCompra->retorna_produtos_pedido($referencia) as $arrReferencia){

        $nome_variacao1 = $classeCompra->retorna_dados_variacao_complementar_por_id($arrReferencia["id_variacao_produto"]);
        $nome_variacao2 = $classeCompra->retorna_dados_variacao_complementar_por_id($arrReferencia["id_variacao_produto2"]);
        $nome_variacao3 = $classeCompra->retorna_dados_variacao_complementar_por_id($arrReferencia["id_variacao_produto3"]);

        ?>

        <div class="row justify-content-center">

            <div class="col-lg-10 border-start border-end border-bottom">

                <div class="row mb-3">

                    <div class="col">

                        <div class="row">

                            <div id="espacoImgProduto" class="col-md-6 col-lg-3 mt-3">

                                <img id="imgProduto" src="img/produtos/<?php echo $arrReferencia["foto"] ?>" width="100%">

                            </div>

                            <div class="col-md-6 col-lg-5 mt-3">

                                <div class="row">

                                    <div class="col">

                                        <h2 class="fs-5 text-secondary"><?php echo $arrReferencia["nome"] ?></h2>

                                    </div>

                                </div>

                                <div class="row justify-content-center">

                                    <div class="col-5 col-md-5">

                                        <div class="boxTamanho text-center mt-2 <?php echo $verTamanho[0] ?>">
    
                                            <span class="fs-4 text-uppercase"><?php echo $arrReferencia["tamanho"]; ?></span>

                                        </div>
    
                                    </div>

                                    <div class="col-5 col-md-7">
    
                                        <ul class="fw-light text-secondary">

                                            <li class="<?php if($arrReferencia["variacao_complementar"] == "SE"){ echo "d-none";} ?>"><b><?php echo $nome_variacao1; ?>:</b> <?php echo $arrReferencia["variacao_complementar"]; ?></li>
                                            <li class="<?php if($arrReferencia["variacao_complementar2"] == "SE"){ echo "d-none";} ?>"><b><?php echo $nome_variacao2; ?>:</b> <?php echo $arrReferencia["variacao_complementar2"]; ?></li>
                                            <li class="<?php if($arrReferencia["variacao_complementar3"] == "SE"){ echo "d-none";} ?>"><b><?php echo $nome_variacao3; ?>:</b> <?php echo $arrReferencia["variacao_complementar3"]; ?></li>
    
                                        </ul>
    
                                    </div>

                                </div>

                                <!-- <h2 class="fs-5 text-secondary"><?php echo $arrReferencia["nome"] ?></h2>

                                <ul class="fw-light text-secondary">

                                    <li class="<?php if($arrReferencia["variacao_complementar"] == "SE"){ echo "d-none";} ?>"><b><?php echo $nome_variacao1; ?>:</b> <?php echo $arrReferencia["variacao_complementar"]; ?></li>
                                    <li class="<?php if($arrReferencia["variacao_complementar2"] == "SE"){ echo "d-none";} ?>"><b><?php echo $nome_variacao2; ?>:</b> <?php echo $arrReferencia["variacao_complementar2"]; ?></li>
                                    <li class="<?php if($arrReferencia["variacao_complementar3"] == "SE"){ echo "d-none";} ?>"><b><?php echo $nome_variacao3; ?>:</b> <?php echo $arrReferencia["variacao_complementar3"]; ?></li>

                                </ul> -->

                            </div>

                            <div id="espacoImgProduto" class="col-md-6 col-lg-2 mt-3">

                                <span class="text-secondary" id="qtd">Qtd <?php echo $arrReferencia["quantidade"] ?></span>

                            </div>

                            <div id="espacoImgProduto" class="col-md-6 col-lg-2 mt-3">

                                <div class="row">

                                    <div class="col fs-4 text-secondary">

                                        R$<?php echo number_format($arrReferencia["preco_produto_pedido"], 2, ",", "."); ?>

                                    </div>

                                    <div class="col text-black-50">

                                        <small>(cada)</small>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <?php

        }

        }

        ?>

        <?php

        /* Rodapé */
        include "phpPartes/rodape.php";

        ?>

    </div>

</body>

</html>