<!DOCTYPE html>
<html>

<head>

    <title>Manulá Baby</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

                  <div class="carousel-item active">
                    <a><img id="imgSlide" src="img/slide.jpg" class="d-block w-100" alt="..."></a>
                  </div>
                  <div class="carousel-item">
                    <a><img id="imgSlide" src="img/slide2.JPG" class="d-block w-100" alt="..."></a>
                  </div>
                  <div class="carousel-item">
                    <a><img id="imgSlide" src="img/slide.jpg" class="d-block w-100" alt="..."></a>
                  </div>

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

                        <div id="boxMenina" class="text-center fs-5 fw-bold">

                            PARA MOCINHAS

                        </div>

                    </div>

                    <div class="col-12 col-md-6 mt-2">

                        <div id="boxMenino" class="text-center fs-5 fw-bold">

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

                            <li class="text-center" id="espacoProdutoMaisVendidos">

                                <div onclick="window.location='produto/'" class="box">

                                <img src="img/produtos/exemplo1.jpg" id="fotoAnel">

                                <p class="card-text mt-1 pt-2">Pulseira Recém Nascido Plaquinha Vazada Meninoc</p>

                                <span class="text-decoration-line-through">R$58,90</span>
                                <h5 class="card-title fs-4" id="precoPromocao">R$45,80</h5>

                                </div>

                            </li>

                            <li class="text-center" id="espacoProdutoMaisVendidos">

                                <div onclick="window.location='produto/'" class="box">

                                <img src="img/produtos/exemplo2.jpg" id="fotoAnel">

                                <p class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>

                                <span class="text-decoration-line-through">R$58,90</span>
                                <h5 class="card-title fs-4" id="precoPromocao">R$45,80</h5>

                                </div>

                            </li>

                            <li class="text-center" id="espacoProdutoMaisVendidos">

                                <div onclick="window.location='produto/'" class="box">

                                <img src="img/produtos/exemplo3.jpg" id="fotoAnel">

                                <p class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>

                                <span class="text-decoration-line-through">R$58,90</span>
                                <h5 class="card-title fs-4" id="precoPromocao">R$45,80</h5>

                                </div>

                            </li>

                            <li class="text-center" id="espacoProdutoMaisVendidos">

                                <div onclick="window.location='produto/'" class="box">

                                <img src="img/produtos/exemplo4.jpg" id="fotoAnel">

                                <p class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>

                                <span class="text-decoration-line-through">R$58,90</span>
                                <h5 class="card-title fs-4" id="precoPromocao">R$45,80</h5>

                                </div>

                            </li>

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

                            <li class="text-center" id="espacoProdutoMaisVendidos">

                                <div onclick="window.location='produto/'" class="box">

                                <img src="img/produtos/exemplo5.jpg" id="fotoAnel">

                                <p class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>

                                <span class="text-decoration-line-through">R$58,90</span>
                                <h5 class="card-title fs-4" id="precoPromocao">R$45,80</h5>

                                </div>

                            </li>

                            <li class="text-center" id="espacoProdutoMaisVendidos">

                                <div onclick="window.location='produto/'" class="box">

                                <img src="img/produtos/exemplo6.jpg" id="fotoAnel">

                                <p class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>

                                <span class="text-decoration-line-through">R$58,90</span>
                                <h5 class="card-title fs-4" id="precoPromocao">R$45,80</h5>

                                </div>

                            </li>

                            <li class="text-center" id="espacoProdutoMaisVendidos">

                                <div onclick="window.location='produto/'" class="box">

                                <img src="img/produtos/exemplo7.jpg" id="fotoAnel">

                                <p class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>

                                <span class="text-decoration-line-through">R$58,90</span>
                                <h5 class="card-title fs-4" id="precoPromocao">R$45,80</h5>

                                </div>

                            </li>

                            <li class="text-center" id="espacoProdutoMaisVendidos">

                                <div onclick="window.location='produto/'" class="box">

                                <img src="img/produtos/exemplo8.jpg" id="fotoAnel">

                                <p class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>

                                <span class="text-decoration-line-through">R$58,90</span>
                                <h5 class="card-title fs-4" id="precoPromocao">R$45,80</h5>

                                </div>

                            </li>

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
                
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        
                        <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
            
                            <img src="img/produtos/exemplo1.jpg" id="fotoAnelProdutos">
            
                            <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
            
                            <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                            <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
            
                            <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
            
                            <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
            
                        </div>
        
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        
                        <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
            
                            <img src="img/produtos/exemplo2.jpg" id="fotoAnelProdutos">
            
                            <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
            
                            <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                            <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
            
                            <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
            
                            <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
            
                        </div>
        
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        
                        <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
            
                            <img src="img/produtos/exemplo3.jpg" id="fotoAnelProdutos">
            
                            <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
            
                            <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                            <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
            
                            <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
            
                            <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
            
                        </div>
        
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        
                        <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
            
                            <img src="img/produtos/exemplo4.jpg" id="fotoAnelProdutos">
            
                            <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
            
                            <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                            <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
            
                            <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
            
                            <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
            
                        </div>
        
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        
                        <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
            
                            <img src="img/produtos/exemplo5.jpg" id="fotoAnelProdutos">
            
                            <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
            
                            <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                            <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
            
                            <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
            
                            <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
            
                        </div>
        
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        
                        <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
            
                            <img src="img/produtos/exemplo6.jpg" id="fotoAnelProdutos">
            
                            <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
            
                            <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                            <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
            
                            <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
            
                            <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
            
                        </div>
        
                    </div>
        
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