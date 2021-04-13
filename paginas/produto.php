<!DOCTYPE html>
<html>

<head>

    <title>Produto - Manulá Baby</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="lightslider/src/css/lightslider.css" />                  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="lightslider/src/js/lightslider.js"></script>

    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

    <link rel="stylesheet" href="css/produto.css">

    <script>

    $(document).ready(function() {
        $('#imageGallery').lightSlider({
            gallery:true,
            item:1,
            loop:true,
            thumbItem:7,
            slideMargin:0,
            enableDrag: true,
            adaptiveHeight:true,
            currentPagerPosition:'left',
            controls: false,
            onSliderLoad: function(el) {
                el.lightGallery({
                    selector: '#imageGallery .lslide'
                });
            }   
        });  
    });

    </script>

</head>

<body>

    <div class="container-fluid">

        <?php
        
        include "phpPartes/cabecalho.php"
        
        ?>

        <div class="row justify-content-center mt-4">

            <div class="col-12 col-md-7 col-lg-6 pt-3 pb-3">

                <ul id="imageGallery">

                    <li data-thumb="img/produtos/exemplo1.jpg" data-src="img/produtos/exemplo1.jpg">
                      <img id="imgSlide" src="img/produtos/exemplo1.jpg" width="100%"/>
                    </li>
                    
                    <li data-thumb="img/produtos/exemplo2.jpg" data-src="img/produtos/exemplo2.jpg">
                      <img id="imgSlide" src="img/produtos/exemplo2.jpg" width="100%"/>
                    </li>

                </ul>

            </div>

            <div class="col-12 col-md-5 col-lg-4 pt-3">

                <h1 class="fs-2 fw-light text-secondary">Produto Teste</h1>

                <div class="row">

                    <div class="col">

                        <span id="etiquetaPromocao">Promoções válidas</span>

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-4">

                        <select class="mt-2 text-secondary" id="selectQtd">

                            <option value="5">Qtd: 5</option>

                        </select>

                    </div>

                    <div class="col-8 text-end">

                        <span class="text-black-50 text-decoration-line-through">R$45,50</span><br>

                        <span class="fs-1 text-secondary">R$45,50</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col text-center">

                        <div id="boxTamanho" class="text-center mt-2">

                            <span class="align-middle fs-3">P</span>

                        </div>

                        <div id="boxTamanho" class="text-center mt-2">

                            <span class="align-middle fs-3">M</span>

                        </div>

                        <div id="boxTamanho" class="text-center mt-2">

                            <span class="align-middle fs-3">G</span>

                        </div>

                        <div id="boxTamanho" class="text-center mt-2 desativado">

                            <span class="align-middle fs-3">1</span>

                        </div>

                        <div id="boxTamanho" class="text-center mt-2 desativado">

                            <span class="align-middle fs-3">2</span>

                        </div>

                        <div id="boxTamanho" class="text-center mt-2 desativado">

                            <span class="align-middle fs-3">3</span>

                        </div>

                        <div id="boxTamanho" class="text-center mt-2 desativado">

                            <span class="align-middle fs-3">4</span>

                        </div>

                        <div id="boxTamanho" class="text-center mt-2 desativado">

                            <span class="align-middle fs-3">5</span>

                        </div>

                        <div id="boxTamanho" class="text-center mt-2 desativado">

                            <span class="align-middle fs-3">6</span>

                        </div>

                        <div id="boxTamanho" class="text-center mt-2 desativado">

                            <span class="align-middle fs-3">7</span>

                        </div>

                        <div id="boxTamanho" class="text-center mt-2 desativado">

                            <span class="align-middle fs-3">8</span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>