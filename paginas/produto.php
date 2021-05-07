<!DOCTYPE html>
<html>

<head>

    <?php

    $explode = explode("/", $_GET["url"]);

    $classeProdutos->nome = htmlentities($explode[1]);
    
    ?>

    <title><?php
    
    foreach($classeProdutos->retorna_dados_pelo_nome() as $arrProduto){

        echo $arrProduto["nome"]." - Oscar Jóias";
    
    ?></title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="../lightslider/src/css/lightslider.css" />                  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../lightslider/src/js/lightslider.js"></script>

    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

    <?php

    /* Definindo a base para o site */
    include "php/base_paginas.php";
    
    ?>

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

    function mudarTamanho(numero){

        var fundoNumero = document.getElementById("boxTamanho-"+numero);
        var hiddenTamanho = document.getElementById("hiddenTamanho");

        hiddenTamanho.value = numero;
        fundoNumero.classList.add("ativado");

        if(numero == "p"){



        }else{

            document.getElementById("boxTamanho-p").classList.remove("ativado");

        }

        if(numero == "m"){



        }else{

            document.getElementById("boxTamanho-m").classList.remove("ativado");

        }

        if(numero == "g"){



        }else{

            document.getElementById("boxTamanho-g").classList.remove("ativado");

        }

        var i = 1;

        while(i <= 8){

            if(i == numero){



            }else{

                document.getElementById("boxTamanho-"+i).classList.remove("ativado");

            }

            i++;

        }

    }

    function mudarResultadoVariacaoAdicional(op){

        var hiddenVariacaoAdicional = document.getElementById("hiddenVariacaoAdicional");

        hiddenVariacaoAdicional.value = op;

    }

    function mudarResultadoVariacaoAdicional2(op){

        var hiddenVariacaoAdicional2 = document.getElementById("hiddenVariacaoAdicional2");

        hiddenVariacaoAdicional2.value = op;

    }

    function mudarResultadoVariacaoAdicional3(op){

        var hiddenVariacaoAdicional3 = document.getElementById("hiddenVariacaoAdicional3");

        hiddenVariacaoAdicional3.value = op;

    }

    function cadastrarProdutoCarrinho(variacao_complementar, variacao_complementar2, variacao_complementar3){

        var qtdCarrinho = document.getElementById("selectQtd").value;

        var hiddenTamanho = document.getElementById("hiddenTamanho").value;

        var hiddenVariacaoAdicional = document.getElementById("hiddenVariacaoAdicional").value;
        var boxVariacaoAdicional = document.getElementById("boxVariacaoAdicional");
        var hiddenVariacaoAdicional2 = document.getElementById("hiddenVariacaoAdicional2").value;
        var boxVariacaoAdicional2 = document.getElementById("boxVariacaoAdicional2");
        var hiddenVariacaoAdicional3 = document.getElementById("hiddenVariacaoAdicional3").value;
        var boxVariacaoAdicional3 = document.getElementById("boxVariacaoAdicional3");
        var botaoAdicionarCarrinho = document.getElementById("botaoAddCarrinho");

        if(variacao_complementar < 1){

            hiddenVariacaoAdicional = "SE";

        }

        if(variacao_complementar2 < 1){

            hiddenVariacaoAdicional2 = "SE";

        }

        if(variacao_complementar3 < 1){

            hiddenVariacaoAdicional3 = "SE";

        }

        if(hiddenTamanho == ""){

            alert("Por favor, selecione o tamanho desejado!");

            return false;

        }

        if(hiddenVariacaoAdicional == "" && hiddenVariacaoAdicional != "SE"){

            alert("Por favor, selecione uma das opções acima!");

            return false;

        }

        if(hiddenVariacaoAdicional2 == "" && hiddenVariacaoAdicional2 != "SE"){

            alert("Por favor, selecione uma das opções acima!");

            return false;

        }

        if(hiddenVariacaoAdicional3 == "" && hiddenVariacaoAdicional3 != "SE"){

            alert("Por favor, selecione uma das opções acima!");

            return false;

        }

        window.location = "php/adicionarSacola.php?tamanho="+hiddenTamanho+"&variacaoComplementar="+hiddenVariacaoAdicional+"&variacaoComplementar2="+hiddenVariacaoAdicional2+"&variacaoComplementar3="+hiddenVariacaoAdicional3+"&quantidade="+qtdCarrinho+"&idProduto=<?php echo $arrProduto['id'] ?>";

    }

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

                    <li data-thumb="img/produtos/<?php echo $arrProduto["foto"] ?>" data-src="img/produtos/<?php echo $arrProduto["foto"] ?>">
                      <img id="imgSlide" src="img/produtos/<?php echo $arrProduto["foto"] ?>" width="100%"/>
                    </li>

                    <?php

                    if($classeProdutos->retorna_img_galeria($arrProduto["id"]) != false){
                    
                    foreach($classeProdutos->retorna_img_galeria($arrProduto["id"]) as $arrGaleria){
                    
                    ?>
                    
                    <li data-thumb="img/produtos/exemplo4.jpg" data-src="img/produtos/exemplo4.jpg">
                      <img id="imgSlide" src="img/produtos/exemplo4.jpg" width="100%"/>
                    </li>

                    <?php
                    
                    }

                    }   
                    
                    ?>

                </ul>

            </div>

            <div class="col-12 col-md-5 col-lg-4 pt-3" id="espacoConteudos">

                <h1 class="fs-2 fw-light text-secondary"><?php echo $arrProduto["nome"]; ?></h1>

                <div class="row">

                    <div class="col">

                        <span id="etiquetaPromocao">Promoções válidas</span>

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-4">

                        <?php
                        
                        if($arrProduto["qtd_estoque"] < 1 || $arrProduto["estado"] != "publicado-disponivel"){
                        
                        ?>

                        <span class="text-black-50">Produto indisponível</span>

                        <?php
                        
                        }else{
                        
                        ?>

                        <select class="mt-2 text-secondary" id="selectQtd">

                            <?php
                                    
                            $i_select = 1;

                            while($i_select <= $arrProduto["qtd_estoque"]){
                            
                            ?>

                            <option value="<?php echo $i_select; ?>">Qtd: <?php echo $i_select; ?></option>

                            <?php

                            $i_select++;
                            
                            }

                            ?>

                        </select>

                        <?php
                        
                        }
                        
                        ?>

                    </div>

                    <div class="col-8 text-end">

                        <?php
                        
                        if($arrProduto["preco_promocao"] != ""){

                        ?>

                        <span class="text-black-50 text-decoration-line-through">R$<?php echo number_format($arrProduto["preco_promocao"], 2, ",", "."); ?></span><br>

                        <?php

                        }
                        
                        ?>

                        <span class="fs-1 text-secondary">R$<?php echo number_format($arrProduto["preco"], 2, ",", "."); ?></span>

                    </div>

                </div>

                <?php
                
                if($arrProduto["id_variacao_produto"] == null){

                    $variacaoAdd = "d-none";

                }else{

                    $variacaoAdd = "";

                }

                if($arrProduto["id_variacao_produto2"] == null){

                    $variacaoAdd2 = "d-none";

                }else{

                    $variacaoAdd2 = "";

                }

                if($arrProduto["id_variacao_produto3"] == null){

                    $variacaoAdd3 = "d-none";

                }else{

                    $variacaoAdd3 = "";

                }

                /* Organização tamanhos */
                $arrTamaho = explode(",", $arrProduto["tamanho"]);

                $verTamanho = [];

                if(in_array("p", $arrTamaho)){

                    $verTamanho[0] = "";

                }else{

                    $verTamanho[0] = "desativado";

                }

                if(in_array("m", $arrTamaho)){

                    $verTamanho[1] = "";

                }else{

                    $verTamanho[1] = "desativado";

                }

                if(in_array("g", $arrTamaho)){

                    $verTamanho[2] = "";

                }else{

                    $verTamanho[2] = "desativado";

                }

                $iTamanho = 3;

                while($iTamanho <= 10){

                    if(in_array($iTamanho - 2, $arrTamaho)){

                        $verTamanho[$iTamanho] = "";
    
                    }else{
    
                        $verTamanho[$iTamanho] = "desativado";
    
                    }

                    $iTamanho++;

                }
                
                ?>

                <!-- Tamanhos -->
                <div class="row justify-content-center mt-2">

                    <div class="col-12 col-lg-11 text-center">

                        <div onclick="<?php
                        
                        if($verTamanho[0] != "desativado"){

                            echo "mudarTamanho('p')";

                        }
                        
                        ?>" id="boxTamanho-p" class="boxTamanho text-center mt-2 <?php echo $verTamanho[0] ?>">

                            <span class="fs-4">P</span>

                        </div>

                        <div onclick="<?php
                        
                        if($verTamanho[1] != "desativado"){

                            echo "mudarTamanho('m')";

                        }
                        
                        ?>" id="boxTamanho-m" class="boxTamanho text-center mt-2 <?php echo $verTamanho[1] ?>">

                            <span class="fs-3">M</span>

                        </div>

                        <div onclick="<?php
                        
                        if($verTamanho[2] != "desativado"){

                            echo "mudarTamanho('g')";

                        }
                        
                        ?>" id="boxTamanho-g" class="boxTamanho text-center mt-2 <?php echo $verTamanho[2] ?>">

                            <span class="fs-3">G</span>

                        </div>

                        <div onclick="<?php
                        
                        if($verTamanho[3] != "desativado"){

                            echo "mudarTamanho(1)";

                        }
                        
                        ?>" id="boxTamanho-1" class="boxTamanho text-center mt-2 <?php echo $verTamanho[3] ?>">

                            <span class="fs-3">1</span>

                        </div>

                        <div onclick="<?php
                        
                        if($verTamanho[4] != "desativado"){

                            echo "mudarTamanho(2)";

                        }
                        
                        ?>" id="boxTamanho-2" class="boxTamanho text-center mt-2 <?php echo $verTamanho[4] ?>">

                            <span class="fs-3">2</span>

                        </div>

                        <div onclick="<?php
                        
                        if($verTamanho[5] != "desativado"){

                            echo "mudarTamanho(3)";

                        }
                        
                        ?>" id="boxTamanho-3" class="boxTamanho text-center mt-2 <?php echo $verTamanho[5] ?>">

                            <span class="fs-3">3</span>

                        </div>

                        <div onclick="<?php
                        
                        if($verTamanho[6] != "desativado"){

                            echo "mudarTamanho(4)";

                        }
                        
                        ?>" id="boxTamanho-4" class="boxTamanho text-center mt-2 <?php echo $verTamanho[6] ?>">

                            <span class="fs-3">4</span>

                        </div>

                        <div onclick="<?php
                        
                        if($verTamanho[7] != "desativado"){

                            echo "mudarTamanho(5)";

                        }
                        
                        ?>" id="boxTamanho-5" class="boxTamanho text-center mt-2 <?php echo $verTamanho[7] ?>">

                            <span class="fs-3">5</span>

                        </div>

                        <div onclick="<?php
                        
                        if($verTamanho[8] != "desativado"){

                            echo "mudarTamanho(6)";

                        }
                        
                        ?>" id="boxTamanho-6" class="boxTamanho text-center mt-2 <?php echo $verTamanho[8] ?>">

                            <span class="fs-3">6</span>

                        </div>

                        <div onclick="<?php
                        
                        if($verTamanho[9] != "desativado"){

                            echo "mudarTamanho(7)";

                        }
                        
                        ?>" id="boxTamanho-7" class="boxTamanho text-center mt-2 <?php echo $verTamanho[9] ?>">

                            <span class="fs-3">7</span>

                        </div>

                        <div onclick="<?php
                        
                        if($verTamanho[10] != "desativado"){

                            echo "mudarTamanho(8)";

                        }
                        
                        ?>" id="boxTamanho-8" class="boxTamanho text-center mt-2 <?php echo $verTamanho[10] ?>">

                            <span class="fs-3">8</span>

                        </div>

                    </div>

                    <input type="hidden" id="hiddenTamanho">

                </div>

                <!-- Variação Adicional -->
                <div class="row justify-content-center mt-4 <?php echo $variacaoAdd ?>">

                    <div id="boxVariacaoAdicional" class="boxAro col-12 col-lg-10">

                        <div class="row mt-2">

                            <div>

                                <?php
                                
                                foreach($classeProdutos->retorna_opcoes_variacoes($arrProduto["id_variacao_produto"]) as $arrVariacao){
                                
                                ?>

                                <span class="text-secondary"><?php echo $arrVariacao["texto_cliente"]; ?></span>

                            </div>

                        </div>

                        <div class="row justify-content-center mt-2 mb-3">

                            <div>

                                <select class="text-secondary" id="selectVariacao" onchange="mudarResultadoVariacaoAdicional(this.value)">

                                    <option disabled selected hidden>Escolher</option>

                                        <?php

                                        foreach($classeProdutos->formatar_op_variacoes($arrVariacao["opcoes"]) as $arrVar){

                                        ?>

                                        <option value="<?php echo $arrVar ?>"><?php echo $arrVar ?></option>

                                        <?php

                                        }
                                        
                                        ?>
        
                                </select>

                                <input type="hidden" id="hiddenVariacaoAdicional">

                            </div>

                            <?php
                                
                            }
                            
                            ?>

                        </div>

                    </div>

                </div>

                <!-- Variação Adicional2 -->
                <div class="row justify-content-center mt-2 <?php echo $variacaoAdd2 ?>">

                    <div id="boxVariacaoAdicional" class="boxAro col-12 col-lg-10">

                        <div class="row mt-2">

                            <div>

                                <?php
                                
                                foreach($classeProdutos->retorna_opcoes_variacoes($arrProduto["id_variacao_produto2"]) as $arrVariacao){
                                
                                ?>

                                <span class="text-secondary"><?php echo $arrVariacao["texto_cliente"]; ?></span>

                            </div>

                        </div>

                        <div class="row justify-content-center mt-2 mb-3">

                            <div>

                                <select class="text-secondary" id="selectVariacao" onchange="mudarResultadoVariacaoAdicional2(this.value)">

                                    <option disabled selected hidden>Escolher</option>

                                        <?php

                                        foreach($classeProdutos->formatar_op_variacoes($arrVariacao["opcoes"]) as $arrVar){

                                        ?>

                                        <option value="<?php echo $arrVar ?>"><?php echo $arrVar ?></option>

                                        <?php

                                        }
                                        
                                        ?>
        
                                </select>

                                <input type="hidden" id="hiddenVariacaoAdicional2">

                            </div>

                            <?php
                                
                            }
                            
                            ?>

                        </div>

                    </div>

                </div>

                <!-- Variação Adicional3 -->
                <div class="row justify-content-center mt-2 <?php echo $variacaoAdd3 ?>">

                    <div id="boxVariacaoAdicional" class="boxAro col-12 col-lg-10">

                        <div class="row mt-2">

                            <div>

                                <?php
                                
                                foreach($classeProdutos->retorna_opcoes_variacoes($arrProduto["id_variacao_produto3"]) as $arrVariacao){
                                
                                ?>

                                <span class="text-secondary"><?php echo $arrVariacao["texto_cliente"]; ?></span>

                            </div>

                        </div>

                        <div class="row justify-content-center mt-2 mb-3">

                            <div>

                                <select class="text-secondary" id="selectVariacao" onchange="mudarResultadoVariacaoAdicional3(this.value)">

                                    <option disabled selected hidden>Escolher</option>

                                        <?php

                                        foreach($classeProdutos->formatar_op_variacoes($arrVariacao["opcoes"]) as $arrVar){

                                        ?>

                                        <option value="<?php echo $arrVar ?>"><?php echo $arrVar ?></option>

                                        <?php

                                        }
                                        
                                        ?>
        
                                </select>

                                <input type="hidden" id="hiddenVariacaoAdicional3">

                            </div>

                            <?php
                                
                            }
                            
                            ?>

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

                <div class="row justify-content-center mt-5 d-none" id="areaFrete">

                    <!-- <div class="col-10 text-center">

                        <b>Sedex:</b> R$34,50 - 3 dias para entrega<br>
                        <b>PAC:</b> R$34,50 - 3 dias para entrega

                    </div> -->

                </div>

                <script type="text/javascript">
                                                                                
                    function calcular_frete(cep, peso, altura, largura, comprimento, dias_entrega) {

                        $.ajax({

                            type: "POST",
                            dataType: "html",

                            url: "ajax/frete.php",

                            beforeSend: function () {

                                $("#areaFrete").removeClass("d-none");
                                $("#areaFrete").html("<img class='imgLoading' src='img/carregando2.gif'>");
                                /* $("#areaFrete").html("Carregando"); */

                            },

                            data: {cep: cep, peso: peso, altura: altura, largura: largura, comprimento: comprimento, dias_entrega: dias_entrega},

                            success: function (msg) {

                                $("#areaFrete").html(msg);

                            }

                        });

                    }

                    $("#inputCalculaFrete").keypress(function(event){

                        var cep = document.getElementById("inputCalculaFrete").value;
                        var campoCep = document.getElementById("areaFrete");

                        var peso = "<?php echo $arrProduto['peso']; ?>";
                        var altura = "<?php echo $arrProduto['altura']; ?>";
                        var largura = "<?php echo $arrProduto['largura']; ?>";
                        var comprimento = "<?php echo $arrProduto['comprimento']; ?>";
                        var dias_entrega = "<?php echo $arrProduto['dias_entrega']; ?>";

                        if ( event.which == 13) {
                            if(cep == ""){

                                campoCep.classList.add("d-none");

                            }else{

                                calcular_frete(cep, peso, altura, largura, comprimento, dias_entrega);

                            }
                        }

                    });

                </script>
                <!-- //Calculo do frete -->

                <!-- Botao Add a sacola -->
                <div class="row justify-content-center mt-4 pt-4 pb-4">

                    <div class="col-12 col-lg-10 text-center">

                        <?php
                        
                        if($arrProduto["qtd_estoque"] < 1 || $arrProduto["estado"] != "publicado-disponivel"){
                        
                        ?>

                        <span class="text-black-50">Produto indisponível</span>

                        <a href="loja"><button class="mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal" id="botaoVerMaisOpcoes">IR PARA LOJA</button></a>

                        <?php
                        
                        }else{
                        
                        ?>

                        <?php
                        
                        $variacao_complementar = $arrProduto['id_variacao_produto'];
                        $variacao_complementar2 = $arrProduto['id_variacao_produto2'];
                        $variacao_complementar3 = $arrProduto['id_variacao_produto3'];

                        if($arrProduto["id_variacao_produto"] == null){

                            $variacao_complementar = 0;

                        }else{

                            $variacao_complementar = 1;

                        }

                        if($arrProduto["id_variacao_produto2"] == null){

                            $variacao_complementar2 = 0;

                        }else{

                            $variacao_complementar2 = 1;

                        }

                        if($arrProduto["id_variacao_produto3"] == null){

                            $variacao_complementar3 = 0;

                        }else{

                            $variacao_complementar3 = 1;

                        }

                        if(isset($_COOKIE["iu_mb"]) && isset($_COOKIE["eu_mb"]) && isset($_COOKIE["su_mb"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_mb"], $_COOKIE["eu_mb"], $_COOKIE["su_mb"]) == true){

                        ?>

                        <button onclick="cadastrarProdutoCarrinho(<?php echo $variacao_complementar ?>, <?php echo $variacao_complementar2 ?>, <?php echo $variacao_complementar3 ?>)" id="botaoAddCarrinho">ADICIONAR À SACOLA</button>

                        <?php
                        
                        }else{
                        
                        ?>

                        <button data-bs-toggle="modal" data-bs-target="#exampleModal" id="botaoAddCarrinho">ADICIONAR À SACOLA</button>

                        <?php
                            
                        }
                        
                        ?>

                        <?php
                            
                        }
                        
                        ?>

                    </div>

                </div>
                <!-- //Botao Add a sacola -->

            </div>

        </div>

        <!-- Caracteristicas -->
        <div class="row justify-content-center">

            <div class="col-lg-10 border-top pt-4">

                <h2 class="fs-2 fw-light text-secondary">Características gerais</h2>

                <pre id="caracteristicasGerais" class="text-secondary"><?php echo $arrProduto["descricao"]; ?></pre>

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

        /* $id_produto = $arrProduto["id"]; */
        
        }
        
        ?>

        <?php
                
        include "phpPartes/rodape.php";
        
        ?>

    </div>

</body>

</html>