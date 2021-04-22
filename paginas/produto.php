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

    $(document).ready(function() {
        $('#espacoItem').lightSlider({
            item:5,
            slideMove:1,
            pager: false,
            controls:false,
            easing: 'cubic-bezier(0.25, 0, 0.25, 1)',

            speed: 700, //ms'
            auto: true,
            loop: false,
            slideEndAnimation: true,
            pause: 4000,
            responsive : [
                {
                    breakpoint:980,
                    settings: {
                        item:4,
                        slideMove:1,
                    }
                },

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

            <div class="col-12 col-md-5 col-lg-4 pt-3" id="espacoConteudos">

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

                        <div id="boxTamanho" class="text-center mt-2 ativado">

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

                <div class="row justify-content-center mt-4">

                    <div id="boxVariacaoAdicional" class="boxAro col-12 col-lg-10">

                        <div class="row mt-2">

                            <div>

                                <span class="text-secondary">Teste</span>

                            </div>

                        </div>

                        <div class="row justify-content-center mt-2 mb-3">

                            <div>

                                <select class="text-secondary" id="selectVariacao" onchange="mudarResultadoVariacaoAdicional(this.value)">

                                    <option disabled selected hidden>Escolher</option>

                                        <option value="<?php echo $arrVar ?>">Teste</option>
        
                                </select>

                                <input type="hidden" id="hiddenVariacaoAdicional">

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Calculo do frete -->
                <div class="row justify-content-center mt-4 pt-3">

                    <div class="col-12 col-lg-10">

                        <label class="text-secondary" for="inputCalculaFrete">Digite seu CEP e pressione enter</label><br>
                        <input type="text" id="inputCalculaFrete" autocomplete="off" class="maskCep">

                    </div>

                </div>

                <!-- Botao Add a sacola -->
                <div class="row justify-content-center mt-4 pt-4 pb-4">

                    <div class="col-12 col-lg-10 text-center">

                        <button onclick="cadastrarProdutoCarrinho()" id="botaoAddCarrinho">ADICIONAR À SACOLA</button>

                    </div>

                </div>
                <!-- //Botao Add a sacola -->

            </div>

        </div>

        <!-- Caracteristicas -->
        <div class="row justify-content-center">

            <div class="col-lg-10 border-top pt-4">

                <h2 class="fs-2 fw-light text-secondary">Características gerais</h2>

                <pre id="caracteristicasGerais" class="text-secondary">Mais uma noite como todas as anteriores. Pego minha caneca de café cheia, acendo meu ultimo cigarro e corro pra velha janela do quarto. Observo a noite fria e chuvosa, até parece confortável por um momento, se não fossem as dezenas de preocupações que me desmotivam a cada dia. Penso em você, mesmo sabendo o quão longe está de mim, sinto aquele amor que continua a me desgraçar intensamente a cada dia, e penso quando enfim poderei te ter comigo. Sei lá, o café chega ao fim e trago a ultima ponta, nada muda. É como se eu fosse passar por isso mais uns longos anos a frente.</pre>

            </div>

        </div>
        <!-- //Caracteristicas -->

        <div class="row mt-5 justify-content-center">

            <div class="col-lg-10 pt-3 border-top">
  
                <p class="pb-2"><span class="text-secondary fs-4">Produtos relacionados</span></p>
  
            </div>
  
        </div>

        <div class="row justify-content-center">

            <div class="col-12 col-lg-10">
    
              <ul class="col-12 col-lg-10" id="espacoItem">

              <?php

              /* $id_categoria =  $classeProdutos->retorna_nome_categoria_produto($id_produto);
              
              foreach($classeProdutos->retorna_produtos_relacionados($id_categoria, $id_produto) as $arrRelacionados){

                $nomeComTraco = str_replace(" ", "-", $arrRelacionados["nome"]);
                $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
                $trataInjection = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $transformarEmMinuscula);
                $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
                $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
                $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
                $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
                $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
                $str6 = preg_replace('/[ç]/ui', 'c', $str5); */
              
              ?>
    
                <li class="text-center" id="espacoProdutoMaisVendidos">
    
                  <div onclick="window.location='produto/<?php /* echo $str6; */ ?>'" class="box">
    
                    <img src="img/produtos/exemplo1.jpg" id="fotoAnel">
    
                    <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
    
                    <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                    <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
    
                  </div>
    
                </li>

                <li class="text-center" id="espacoProdutoMaisVendidos">
    
                  <div onclick="window.location='produto/<?php /* echo $str6; */ ?>'" class="box">
    
                    <img src="img/produtos/exemplo2.jpg" id="fotoAnel">
    
                    <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
    
                    <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                    <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
    
                  </div>
    
                </li>

                <li class="text-center" id="espacoProdutoMaisVendidos">
    
                  <div onclick="window.location='produto/<?php /* echo $str6; */ ?>'" class="box">
    
                    <img src="img/produtos/exemplo3.jpg" id="fotoAnel">
    
                    <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
    
                    <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                    <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
    
                  </div>
    
                </li>

                <li class="text-center" id="espacoProdutoMaisVendidos">
    
                  <div onclick="window.location='produto/<?php /* echo $str6; */ ?>'" class="box">
    
                    <img src="img/produtos/exemplo4.jpg" id="fotoAnel">
    
                    <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
    
                    <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                    <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
    
                  </div>
    
                </li>

                <li class="text-center" id="espacoProdutoMaisVendidos">
    
                  <div onclick="window.location='produto/<?php /* echo $str6; */ ?>'" class="box">
    
                    <img src="img/produtos/exemplo5.jpg" id="fotoAnel">
    
                    <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
    
                    <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                    <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
    
                  </div>
    
                </li>

                <?php
                
                /* } */
                
                ?>

                <?php

                /* $id_categoria =  $classeProdutos->retorna_nome_categoria_produto(0);

                foreach($classeProdutos->retorna_produtos_relacionados($id_categoria, $id_produto) as $arrRelacionados){

                    $nomeComTraco = str_replace(" ", "-", $arrRelacionados["nome"]);
                    $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
                    $trataInjection = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $transformarEmMinuscula);
                    $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
                    $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
                    $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
                    $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
                    $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
                    $str6 = preg_replace('/[ç]/ui', 'c', $str5); */

                ?>

                <!-- <li class="text-center" id="espacoProdutoMaisVendidos">

                    <div onclick="window.location='produto/<?php echo $str6; ?>'" class="box">

                    <img src="img/produtos/<?php echo $arrRelacionados["foto"]; ?>" id="fotoAnel">

                    <p class="card-text mt-1 pt-2 border-top"><?php echo $arrRelacionados["nome"]; ?></p>

                    <small class="text-decoration-line-through <?php if($arrRelacionados["preco_promocao"] == ""){ echo "d-none"; } ?>">R$<?php echo number_format($arrRelacionados["preco_promocao"], 2, ",", "."); ?></small>
                    <h5 class="card-title">R$<?php echo number_format($arrRelacionados["preco"], 2, ",", "."); ?></h5>

                    </div>

                </li> -->

                <?php
                
                /* } */
                
                ?>

                <?php

                /* $id_categoria =  $classeProdutos->retorna_nome_categoria_produto(0);

                foreach($classeProdutos->retorna_produtos_relacionados($id_categoria, $id_produto) as $arrRelacionados){

                    $nomeComTraco = str_replace(" ", "-", $arrRelacionados["nome"]);
                    $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
                    $trataInjection = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $transformarEmMinuscula);
                    $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
                    $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
                    $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
                    $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
                    $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
                    $str6 = preg_replace('/[ç]/ui', 'c', $str5); */

                ?>

                <!-- <li class="text-center" id="espacoProdutoMaisVendidos">

                    <div onclick="window.location='produto/<?php echo $str6; ?>'" class="box">

                    <img src="img/produtos/<?php echo $arrRelacionados["foto"]; ?>" id="fotoAnel">

                    <p class="card-text mt-1 pt-2 border-top"><?php echo $arrRelacionados["nome"]; ?></p>

                    <small class="text-decoration-line-through <?php if($arrRelacionados["preco_promocao"] == ""){ echo "d-none"; } ?>">R$<?php echo number_format($arrRelacionados["preco_promocao"], 2, ",", "."); ?></small>
                    <h5 class="card-title">R$<?php echo number_format($arrRelacionados["preco"], 2, ",", "."); ?></h5>

                    </div>

                </li> -->

                <?php

                /* } */

                ?>
    
              </ul>
    
            </div>
    
        </div>

        <?php
                
        include "phpPartes/rodape.php";
        
        ?>

    </div>

</body>

</html>