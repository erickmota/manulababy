<!DOCTYPE html>
<html>

<head>

    <?php
    
    $explode = explode("/", $_GET["url"]);

    /* $nomePromocao = htmlspecialchars($explode[1], ENT_QUOTES, "UTF-8"); */

    $nomePromocao = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars(str_replace("-", " ", ucfirst($explode[1])), ENT_QUOTES, "UTF-8"));
    
    ?>

    <title>Promoção - <?php echo $nomePromocao ?> - Manulá Baby</title>

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
    <!-- <link type="text/css" rel="stylesheet" href="lightslider/src/css/lightslider.css" />                  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="lightslider/src/js/lightslider.js"></script> -->

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <?php

    /* Definindo a base para o site */
    include "php/base_paginas.php";

    ?>

    <link rel="stylesheet" href="css/promocao.css">

</head>

<body>

    <div class="container-fluid">

        <?php
        
        include "phpPartes/cabecalho.php";

        $funcDadosPromocao = $classeProdutos->retorna_dados_promocao($nomePromocao);

        foreach($funcDadosPromocao as $arrDadosPromocao){

            $idPromocao = $arrDadosPromocao["id"];
        
        ?>

        <div class="row justify-content-center mt-3">

            <div class="col-lg-10 pt-3 text-secondary">

                <h1 class="fs-2 fw-light"><?php echo $nomePromocao ?></h1>
                <p>Leve <b><?php echo $arrDadosPromocao["qtd_pecas"] ?></b> peças e pague somente <span class="fs-5 instrucaoPromocao"><b>R$<?php echo number_format($arrDadosPromocao["preco"], 2, ",", "."); ?></b></span> - <?php echo $arrDadosPromocao["descricao"] ?></p>

            </div>

        </div>

        <div class="row justify-content-center mt-2">

            <div class="col-lg-10 text-secondary">

                <h2 class="fs-5">Como validar a promoção?</h2>

                <ol>

                    <li>Adicione <b><?php echo $arrDadosPromocao["qtd_pecas"] ?></b> dos seguintes produtos em sua sacola (caso queira adquirir mais de uma unidade de um mesmo produto,
                        adicione-o mais de uma vez na sua sacola. <b>A promoção não será ativa, se o produto estiver com quantidade acima de
                        1 dentro da sacola</b>).
                    </li>
                    <li>Dentro de sua sacola, próximo ao preço total, selecione a promoção.</li>
                    <li>Se tudo der certo, você verá uma mensagem de confirmação. Agora basta aproveitar sua promoção :)</li>

                </ol>

            </div>

        </div>

        <?php
        
        }
        
        ?>

        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="row">

                    <?php

                    $funtRetornaDadosPromocao = $classeProdutos->retorna_produtos_promocao($idPromocao);

                    if($funtRetornaDadosPromocao != false){
                    
                    foreach($funtRetornaDadosPromocao as $arrProdutosPromo){

                        $nomeComTraco = str_replace(" ", "-", $arrProdutosPromo["nome"]);
                        $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
                        $trataInjection = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $transformarEmMinuscula);
                        $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
                        $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
                        $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
                        $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
                        $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
                        $str6 = preg_replace('/[ç]/ui', 'c', $str5);
                    
                    ?>
        
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        
                        <div onclick="window.location='produto/<?php echo $str6 ?>'" class="boxProdutos text-center">
            
                            <img src="img/produtos/<?php echo $arrProdutosPromo["foto"] ?>" id="fotoAnelProdutos">
            
                            <p id="nomeItem" class="card-text mt-1 pt-2"><?php echo $arrProdutosPromo["nome"] ?></p>
            
                            <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$<?php echo number_format($arrProdutosPromo["preco_promocao"], 2, ",", "."); ?></span>
                            <h5 class="card-title fs-4"  id="precoPromocao">R$<?php echo number_format($arrProdutosPromo["preco"], 2, ",", "."); ?></h5>
            
                        </div>
        
                    </div>

                    <?php
                    
                    }

                    }else{

                    ?>

                    <div class="col text-center text-secondary mt-5 mb-5">

                        NENHUM PRODUTO DISPONÍVEL

                    </div>

                    <?php
                    
                    }
                    
                    ?>
        
                </div>

            </div>

        </div>

        <?php
                
        include "phpPartes/rodape.php";
        
        ?>

    </div>

</body>

</html>