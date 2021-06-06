<!DOCTYPE html>
<html>

<head>

    <?php
    
    include "classes/adm.class.php";
    $classeAdm = new adm();
    
    ?>

    <title>Manulá Baby</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Geral -->
    <meta name="description" content="Compre lindas roupas infantis com o melhor custo benefício do mercado, só aqui na Manulá Baby.">
    <meta name="author" content="erickmota.com">
    <meta name="robots" content="index">

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
    <link type="text/css" rel="stylesheet" href="lightslider/src/css/lightslider.css" />                  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="lightslider/src/js/lightslider.js"></script>

    <link rel="stylesheet" href="css/home.css">

    <script>

        /* Promoções */
        $(document).ready(function() {
            $('#espacoItem').lightSlider({
                item:4,
                slideMove:2,
                easing: 'cubic-bezier(0.25, 0, 0.25, 1)',

                speed: 700, //ms'
                auto: true,
                loop: true,
                slideEndAnimation: true,
                pager:true,
                controls: false,
                pause: 4000,
                responsive : [
                    {
                        breakpoint:900,
                        settings: {
                            item:3,
                            slideMove:1,
                        }
                    },

                    {
                        breakpoint:550,
                        settings: {
                            item:2,
                            slideMove:1
                        }
                    },

                    {
                        breakpoint:400,
                        settings: {
                            item:1,
                            slideMove:1
                        }
                    }
                ]
            });  
        });
        /* //Promoções */

        $(document).ready(function() {
            $('#espacoItemMocinho').lightSlider({
                item:4,
                slideMove:2,
                easing: 'cubic-bezier(0.25, 0, 0.25, 1)',

                speed: 700, //ms'
                auto: true,
                loop: true,
                slideEndAnimation: true,
                pager:true,
                controls: false,
                pause: 4000,
                responsive : [
                    {
                        breakpoint:900,
                        settings: {
                            item:3,
                            slideMove:1,
                        }
                    },

                    {
                        breakpoint:550,
                        settings: {
                            item:2,
                            slideMove:1
                        }
                    },

                    {
                        breakpoint:400,
                        settings: {
                            item:1,
                            slideMove:1
                        }
                    }
                ]
            });  
        });

    </script>

</head>

<body>

    <div class="container-fluid">

        <?php
        
        include "phpPartes/cabecalho.php"
        
        ?>

    </div>

    <div class="container-fluid" id="divSlide">

        <div class="row mt-4">

            <!-- Slide -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                <ol class="carousel-indicators">

                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>

                </ol>

                <div class="carousel-inner">

                    <?php
                    
                    foreach($classeAdm->retorna_slide_link() as $arrAdm){

                      $link[0] = $arrAdm['link_slide_1'];
                      $link[1] = $arrAdm['link_slide_2'];
                      $link[2] = $arrAdm['link_slide_3'];
                    
                    ?>

                    <div class="carousel-item active">
                        <a <?php
                      
                      if($link[0] != NULL){

                        echo "href='$link[0]'";

                      }
                      
                      ?>><img id="imgSlide" src="img/slides/<?php echo $arrAdm['img_slide_1'] ?>" class="d-block w-100" alt="..."></a>
                    </div>

                    <div class="carousel-item">
                        <a <?php
                      
                      if($link[1] != NULL){

                        echo "href='$link[1]'";

                      }
                      
                      ?>><img id="imgSlide" src="img/slides/<?php echo $arrAdm['img_slide_2'] ?>" class="d-block w-100" alt="..."></a>
                    </div>

                    <div class="carousel-item">
                        <a <?php
                      
                      if($link[2] != NULL){

                        echo "href='$link[2]'";

                      }
                      
                      ?>><img id="imgSlide" src="img/slides/<?php echo $arrAdm['img_slide_3'] ?>" class="d-block w-100" alt="..."></a>
                    </div>

                    <?php
                    
                    }
                    
                    ?>

                </div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>

                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>

            </div>
            <!-- //Slide -->

        </div>

    </div>

    <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-12 col-lg-10">

                <div class="row mt-5">

                    <div class="col-12 col-md-6 mt-2">

                        <div onclick="window.location='loja?sexo=fem'" id="boxMenina" class="text-center fs-5 fw-bold">

                            PARA MOCINHAS

                        </div>

                    </div>

                    <div class="col-12 col-md-6 mt-2">

                        <div onclick="window.location='loja?sexo=masc'" id="boxMenino" class="text-center fs-5 fw-bold">

                            PARA MOCINHOS

                        </div>

                    </div>

                </div>

                <!-- Promoção mocinha -->
                <div class="row mt-5 justify-content-center">

                    <div class="col">

                        <p class="border-bottom pb-2"><span class="text-secondary fs-4">Promoções mocinhas</span> <button onclick="window.location='loja?pg=1'" id="botaoVerPromocoes">Ver loja</button></p>

                    </div>

                </div>

                <div class="row justify-content-center">

                    <div class="col">

                        <ul class="col" id="espacoItem">

                            <?php
            
                            foreach($classeProdutos->retorna_produtos_promocionais("feminino") as $arrPromocao){

                                $nomeComTraco = str_replace(" ", "-", $arrPromocao["nome"]);
                                $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
                                $trataInjection = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $transformarEmMinuscula);
                                $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
                                $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
                                $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
                                $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
                                $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
                                $str6 = preg_replace('/[ç]/ui', 'c', $str5);
                            
                            ?>

                            <li class="text-center" id="espacoProdutoMaisVendidos">

                                <div onclick="window.location='produto/<?php echo $str6; ?>'" class="box">

                                <img src="img/produtos/<?php echo $arrPromocao["foto"]; ?>" id="fotoAnel">

                                <p class="card-text mt-1 pt-2"><?php echo $arrPromocao["nome"]; ?></p>

                                <span class="text-decoration-line-through">R$<?php echo number_format($arrPromocao["preco_promocao"], 2, ",", "."); ?></span>
                                <h5 class="card-title fs-4" id="precoPromocao">R$<?php echo number_format($arrPromocao["preco"], 2, ",", "."); ?></h5>

                                </div>

                            </li>

                            <?php
          
                            }
                            
                            ?>

                        </ul>

                    </div>

                </div>
                <!-- //Promoção mocinha -->

                <!-- Promoção mocinho -->
                <div class="row mt-5 justify-content-center">

                    <div class="col">

                        <p class="border-bottom pb-2"><span class="text-secondary fs-4">Promoções mocinhos</span> <button onclick="window.location='loja?pg=1'" id="botaoVerPromocoes">Ver loja</button></p>

                    </div>

                </div>

                <div class="row justify-content-center">

                    <div class="col">

                        <ul class="col" id="espacoItemMocinho">

                        <?php
            
                            foreach($classeProdutos->retorna_produtos_promocionais("masculino") as $arrPromocao){

                                $nomeComTraco = str_replace(" ", "-", $arrPromocao["nome"]);
                                $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
                                $trataInjection = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $transformarEmMinuscula);
                                $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
                                $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
                                $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
                                $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
                                $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
                                $str6 = preg_replace('/[ç]/ui', 'c', $str5);
                            
                            ?>

                            <li class="text-center" id="espacoProdutoMaisVendidos">

                                <div onclick="window.location='produto/<?php echo $str6; ?>'" class="box">

                                <img src="img/produtos/<?php echo $arrPromocao["foto"]; ?>" id="fotoAnel">

                                <p class="card-text mt-1 pt-2"><?php echo $arrPromocao["nome"]; ?></p>

                                <span class="text-decoration-line-through">R$<?php echo number_format($arrPromocao["preco_promocao"], 2, ",", "."); ?></span>
                                <h5 class="card-title fs-4" id="precoPromocao">R$<?php echo number_format($arrPromocao["preco"], 2, ",", "."); ?></h5>

                                </div>

                            </li>

                            <?php
          
                            }
                            
                            ?>

                        </ul>

                    </div>

                </div>
                <!-- //Promoção mocinho -->

                <!-- Últimos adicionados -->
                <div class="row mt-5 justify-content-center">

                    <div class="col">

                        <p class="border-bottom pb-2"><span class="text-secondary fs-4">Últimos adicionados</span> <button onclick="window.location='loja?pg=1'" id="botaoVerPromocoes">Ver loja</button></p>

                    </div>

                </div>

                <div class="row">

                    <?php
                
                    /* $tipo, $vMinimo, $vMaximo, $categoria, $pg, $ordenacao, $tipoOrdenacao */
                    foreach($classeProdutos->retorna_lista_produtos_home(8) as $arrProdutos){

                    $idProduto = $arrProdutos["id"];

                    /* $nomeComTraco = str_replace(" ", "-", $arrProdutos["nome"]);
                    $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
                    $tirarCaracteres = str_replace("ã", "a", $transformarEmMinuscula);
                    $convert = iconv('utf-8', 'us-ascii//TRANSLIT', $tirarCaracteres); */

                    $nomeComTraco = str_replace(" ", "-", $arrProdutos["nome"]);
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
        
                        <div onclick="window.location='produto/<?php echo $str6; ?>'" class="boxProdutos text-center">
            
                            <img src="img/produtos/<?php echo $arrProdutos["foto"]; ?>" id="fotoAnelProdutos">
            
                            <p id="nomeItem" class="card-text mt-1 pt-2"><?php echo $arrProdutos["nome"]; ?></p>
            
                            <span id="precoAntigo" class="text-decoration-line-through text-secondary <?php if($arrProdutos["preco_promocao"] == ""){ echo "d-none"; } ?>">R$<?php echo number_format($arrProdutos["preco_promocao"], 2, ",", "."); ?></span>
                            <h5 class="card-title fs-4"  id="precoPromocao">R$<?php echo number_format($arrProdutos["preco"], 2, ",", "."); ?></h5>
            
                        </div>
        
                    </div>

                    <?php

                    }
                    
                    ?>
        
                </div>
                <!-- //Últimos adicionados -->

            </div>

        </div>

        <?php
                
        include "phpPartes/rodape.php";
        
        ?>

    </div>

</body>

</html>