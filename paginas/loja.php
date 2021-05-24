<!DOCTYPE html>
<html>

<head>

    <?php
    
    /* include "classes/produtos.class.php";
    $classesProdutos = new produtos(); */
    
    ?>

    <title>Loja - Manulá Baby</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="lightslider/src/css/lightslider.css" />                  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="lightslider/src/js/lightslider.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <?php

    /* Definindo a base para o site */
    include "php/base_paginas.php";

    ?>

    <link rel="stylesheet" href="css/loja.css">

    <?php
                        
    /* Recebendo dados GET */

    /* Preços */
    if(isset($_GET["vMin"])){

        $vMin = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["vMin"]));
        $vMax = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["vMax"]));

    }else{

        $vMin = "SE";
        $vMax = "SE";

    }
    
    /* Sexo */
    if(isset($_GET["sexo"])){

        $sexoUrl = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["sexo"]));

    }else{

        $sexoUrl = "SE";

    }

    /* Ordenação */
    if(isset($_GET["ord"])){

        $ordenacao = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["ord"]));

    }else{

        $ordenacao = "SE";

    }

    /* Tamanho */
    if(isset($_GET["tamanho"])){

        $tamanhoFiltro = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["tamanho"]));

    }else{

        $tamanhoFiltro = "SE";

    }

    /* Categoria */
    if(isset($_GET["cat"])){

        $categoriaFiltro = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["cat"], ENT_QUOTES, "UTF-8"));

    }else{

        $categoriaFiltro = "SE";

    }

    /* Busca */
    if(isset($_GET["q"])){

        $buscaFiltro = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_GET["q"], ENT_QUOTES, "UTF-8"));

    }else{

        $buscaFiltro = "SE";

    }
    
    ?>

    <script>

        /* Função para o scroll */
        $(window).scroll(function(){

            /* Anima a coluna Sobre */
            if($(window).scrollTop() > $("#selectOrganizar").offset().top - 40){

                $("#colunaFiltro").addClass("colunaFiltro");
                $("#espacoItens").addClass("offset-lg-3");

            }else{

                $("#colunaFiltro").removeClass("colunaFiltro");
                $("#espacoItens").removeClass("offset-lg-3");

            }

            if($(window).scrollTop() > $("#fundoFooter").offset().top - 660){

                $("#colunaFiltro").css("bottom", "330px");

            }else{

                $("#colunaFiltro").css("bottom", "0px");

            }

        })

        <?php
        
        if($vMin != "SE" && $vMax != "SE"){

            $vMinFiltro = $vMin;
            $vMaxFiltro = $vMax;

        }else{

            $vMinFiltro = 50;
            $vMaxFiltro = 300;

        }
        
        ?>

        $( function() {
            $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 500,
            values: [ <?php echo $vMinFiltro; ?>, <?php echo $vMaxFiltro; ?> ],
            slide: function( event, ui ) {
                $( "#vMin" ).val( ui.values[ 0 ]);
                $( "#vMax" ).val( ui.values[ 1 ]);
            }
            });
            $( "#vMin" ).val( $( "#slider-range" ).slider( "values", 0 ));
            $( "#vMax" ).val( $( "#slider-range" ).slider( "values", 1 ));
        } );

        $( function() {
            $( "#slider-range2" ).slider({
            range: true,
            min: 0,
            max: 500,
            values: [ <?php echo $vMinFiltro; ?>, <?php echo $vMaxFiltro; ?> ],
            slide: function( event, ui ) {
                $( "#vMin2" ).val( ui.values[ 0 ]);
                $( "#vMax2" ).val( ui.values[ 1 ]);
            }
            });
            $( "#vMin2" ).val( $( "#slider-range" ).slider( "values", 0 ));
            $( "#vMax2" ).val( $( "#slider-range" ).slider( "values", 1 ));
        } );

        function mudar_link_sexo(sexo){

            <?php
                
            $paginaAtual = $_SERVER["REQUEST_URI"];
                
            ?>

            if(sexo == "m"){

                <?php
                    
                if(isset($_GET["sexo"])){

                    $novaPagina = str_replace(htmlentities($_GET["sexo"]), "masc", $paginaAtual);

                }else{

                    if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["ord"]) || isset($_GET["tamanho"]) || isset($_GET["q"]) || isset($_GET["cat"])){

                        $novaPagina = $paginaAtual."&sexo=masc";

                    }else{

                        $novaPagina = $paginaAtual."?sexo=masc";

                    }

                }    
                    
                ?>

                window.location="<?php echo $novaPagina; ?>";

            }else if(sexo == "f"){

                <?php
                    
                if(isset($_GET["sexo"])){

                    $novaPagina = str_replace(htmlentities($_GET["sexo"]), "fem", $paginaAtual);

                }else{

                    if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["ord"]) || isset($_GET["tamanho"]) || isset($_GET["q"]) || isset($_GET["cat"])){

                        $novaPagina = $paginaAtual."&sexo=fem";

                    }else{

                        $novaPagina = $paginaAtual."?sexo=fem";

                    }

                }    
                    
                ?>

                window.location="<?php echo $novaPagina; ?>";

            }else if(sexo == "t"){

                <?php
                    
                if(isset($_GET["sexo"])){

                    $novaPagina = str_replace(htmlentities($_GET["sexo"]), "tud", $paginaAtual);

                }else{

                    if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["ord"]) || isset($_GET["tamanho"]) || isset($_GET["q"]) || isset($_GET["cat"])){

                        $novaPagina = $paginaAtual."&sexo=tud";

                    }else{

                        $novaPagina = $paginaAtual."?sexo=tud";

                    }

                }    
                    
                ?>

                window.location="<?php echo $novaPagina; ?>";

            }

        }

        function alterar_ordenacao(ord){

            if(ord == "nome"){

                <?php
                    
                if(isset($_GET["ord"])){

                    $novaPagina = str_replace(htmlentities($_GET["ord"]), "nome", $paginaAtual);

                }else{

                    if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["sexo"]) || isset($_GET["cat"]) || isset($_GET["q"]) || isset($_GET["tamanho"])){

                        $novaPagina = $paginaAtual."&ord=nome";

                    }else{

                        $novaPagina = $paginaAtual."?ord=nome";

                    }

                }    
                    
                ?>

                window.location="<?php echo $novaPagina; ?>";

            }else if(ord == "ua"){

                <?php
                    
                if(isset($_GET["ord"])){

                    $novaPagina = str_replace(htmlentities($_GET["ord"]), "ua", $paginaAtual);

                }else{

                    if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["sexo"]) || isset($_GET["cat"]) || isset($_GET["q"]) || isset($_GET["tamanho"])){

                        $novaPagina = $paginaAtual."&ord=ua";

                    }else{

                        $novaPagina = $paginaAtual."?ord=ua";

                    }

                }    
                    
                ?>

                window.location="<?php echo $novaPagina; ?>";

            }else if(ord == "pa"){

                <?php
                    
                if(isset($_GET["ord"])){

                    $novaPagina = str_replace(htmlentities($_GET["ord"]), "pa", $paginaAtual);

                }else{

                    if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["sexo"]) || isset($_GET["cat"]) || isset($_GET["q"]) || isset($_GET["tamanho"])){

                        $novaPagina = $paginaAtual."&ord=pa";

                    }else{

                        $novaPagina = $paginaAtual."?ord=pa";

                    }

                }    
                    
                ?>

                window.location="<?php echo $novaPagina; ?>";

            }else if(ord == "menorp"){

                <?php
                    
                if(isset($_GET["ord"])){

                    $novaPagina = str_replace(htmlentities($_GET["ord"]), "menorp", $paginaAtual);

                }else{

                    if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["sexo"]) || isset($_GET["cat"]) || isset($_GET["q"]) || isset($_GET["tamanho"])){

                        $novaPagina = $paginaAtual."&ord=menorp";

                    }else{

                        $novaPagina = $paginaAtual."?ord=menorp";

                    }

                }    
                    
                ?>

                window.location="<?php echo $novaPagina; ?>";

            }else if(ord == "maiorp"){

                <?php
                    
                if(isset($_GET["ord"])){

                    $novaPagina = str_replace(htmlentities($_GET["ord"]), "maiorp", $paginaAtual);

                }else{

                    if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["sexo"]) || isset($_GET["cat"]) || isset($_GET["q"]) || isset($_GET["tamanho"])){

                        $novaPagina = $paginaAtual."&ord=maiorp";

                    }else{

                        $novaPagina = $paginaAtual."?ord=maiorp";

                    }

                }    
                    
                ?>

                window.location="<?php echo $novaPagina; ?>";

            }

        }

        function alterar_tamanho(tamanho){

            if(tamanho == "p"){

                <?php
                    
                if(isset($_GET["tamanho"])){

                    $resultTamanho = explode(",", $tamanhoFiltro);

                    if(in_array("p", $resultTamanho)){

                        $key = array_search("p", $resultTamanho);

                        unset($resultTamanho[$key]);

                        $qtdArr = count($resultTamanho);

                        if($qtdArr > 0){

                            $novoTamanho = implode(",", $resultTamanho);

                            $novaPagina = str_replace("tamanho=".htmlentities($_GET["tamanho"]), "tamanho=".$novoTamanho, $paginaAtual);

                        }else{

                            if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["ord"]) || isset($_GET["q"]) || isset($_GET["sexo"]) || isset($_GET["cat"])){

                                $novaPaginaAnt = str_replace("?tamanho=".htmlentities($_GET["tamanho"]), "?filt=sim", $paginaAtual);

                                $novaPagina = str_replace("&tamanho=".htmlentities($_GET["tamanho"]), "", $novaPaginaAnt);
        
                            }else{
        
                                $novaPagina = str_replace("?tamanho=".htmlentities($_GET["tamanho"]), "", $paginaAtual);
        
                            }

                        }

                    }else{

                        $novoTamanho = "{$tamanhoFiltro},p";

                        $novaPagina = str_replace("tamanho=".htmlentities($_GET["tamanho"]), "tamanho=".$novoTamanho, $paginaAtual);
                    
                    }

                }else{

                    if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["ord"]) || isset($_GET["tOrd"]) || isset($_GET["q"]) || isset($_GET["sexo"]) || isset($_GET["cat"])){

                        $novaPagina = $paginaAtual."&tamanho=p";

                    }else{

                        $novaPagina = $paginaAtual."?tamanho=p";

                    }

                }    
                    
                ?>

                window.location="<?php echo $novaPagina; ?>";

            }else if(tamanho == "m"){

                <?php
                    
                if(isset($_GET["tamanho"])){

                    $resultTamanho = explode(",", $tamanhoFiltro);

                    if(in_array("m", $resultTamanho)){

                        $key = array_search("m", $resultTamanho);

                        unset($resultTamanho[$key]);

                        $qtdArr = count($resultTamanho);

                        if($qtdArr > 0){

                            $novoTamanho = implode(",", $resultTamanho);

                            $novaPagina = str_replace("tamanho=".htmlentities($_GET["tamanho"]), "tamanho=".$novoTamanho, $paginaAtual);

                        }else{

                            if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["ord"]) || isset($_GET["q"]) || isset($_GET["sexo"]) || isset($_GET["cat"])){

                                $novaPaginaAnt = str_replace("?tamanho=".htmlentities($_GET["tamanho"]), "?filt=sim", $paginaAtual);

                                $novaPagina = str_replace("&tamanho=".htmlentities($_GET["tamanho"]), "", $novaPaginaAnt);
        
                            }else{
        
                                $novaPagina = str_replace("?tamanho=".htmlentities($_GET["tamanho"]), "", $paginaAtual);
        
                            }

                        }

                    }else{

                        $novoTamanho = "{$tamanhoFiltro},m";

                        $novaPagina = str_replace("tamanho=".htmlentities($_GET["tamanho"]), "tamanho=".$novoTamanho, $paginaAtual);
                    
                    }

                }else{

                    if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["ord"]) || isset($_GET["tOrd"]) || isset($_GET["q"]) || isset($_GET["sexo"]) || isset($_GET["cat"])){

                        $novaPagina = $paginaAtual."&tamanho=m";

                    }else{

                        $novaPagina = $paginaAtual."?tamanho=m";

                    }

                }    
                    
                ?>

                window.location="<?php echo $novaPagina; ?>";

            }else if(tamanho == "g"){

                <?php
                    
                if(isset($_GET["tamanho"])){

                    $resultTamanho = explode(",", $tamanhoFiltro);

                    if(in_array("g", $resultTamanho)){

                        $key = array_search("g", $resultTamanho);

                        unset($resultTamanho[$key]);

                        $qtdArr = count($resultTamanho);

                        if($qtdArr > 0){

                            $novoTamanho = implode(",", $resultTamanho);

                            $novaPagina = str_replace("tamanho=".htmlentities($_GET["tamanho"]), "tamanho=".$novoTamanho, $paginaAtual);

                        }else{

                            if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["ord"]) || isset($_GET["q"]) || isset($_GET["sexo"]) || isset($_GET["cat"])){

                                $novaPaginaAnt = str_replace("?tamanho=".htmlentities($_GET["tamanho"]), "?filt=sim", $paginaAtual);

                                $novaPagina = str_replace("&tamanho=".htmlentities($_GET["tamanho"]), "", $novaPaginaAnt);
        
                            }else{
        
                                $novaPagina = str_replace("?tamanho=".htmlentities($_GET["tamanho"]), "", $paginaAtual);
        
                            }

                        }

                    }else{

                        $novoTamanho = "{$tamanhoFiltro},g";

                        $novaPagina = str_replace("tamanho=".htmlentities($_GET["tamanho"]), "tamanho=".$novoTamanho, $paginaAtual);
                    
                    }

                }else{

                    if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["ord"]) || isset($_GET["tOrd"]) || isset($_GET["q"]) || isset($_GET["sexo"]) || isset($_GET["cat"])){

                        $novaPagina = $paginaAtual."&tamanho=g";

                    }else{

                        $novaPagina = $paginaAtual."?tamanho=g";

                    }

                }    
                    
                ?>

                window.location="<?php echo $novaPagina; ?>";

            }

            <?php
            
            $i = 1;

            while($i <= 8){

                ?>

                else if(tamanho == "<?php echo $i; ?>"){

                <?php
                    
                if(isset($_GET["tamanho"])){

                    $resultTamanho = explode(",", $tamanhoFiltro);

                    if(in_array("{$i}", $resultTamanho)){

                        $key = array_search("{$i}", $resultTamanho);

                        unset($resultTamanho[$key]);

                        $qtdArr = count($resultTamanho);

                        if($qtdArr > 0){

                            $novoTamanho = implode(",", $resultTamanho);

                            $novaPagina = str_replace("tamanho=".htmlentities($_GET["tamanho"]), "tamanho=".$novoTamanho, $paginaAtual);

                        }else{

                            if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["ord"]) || isset($_GET["q"]) || isset($_GET["sexo"]) || isset($_GET["cat"])){

                                $novaPaginaAnt = str_replace("?tamanho=".htmlentities($_GET["tamanho"]), "?filt=sim", $paginaAtual);

                                $novaPagina = str_replace("&tamanho=".htmlentities($_GET["tamanho"]), "", $novaPaginaAnt);

                            }else{

                                $novaPagina = str_replace("?tamanho=".htmlentities($_GET["tamanho"]), "", $paginaAtual);

                            }

                        }

                    }else{

                        $novoTamanho = "{$tamanhoFiltro},{$i}";

                        $novaPagina = str_replace("tamanho=".htmlentities($_GET["tamanho"]), "tamanho=".$novoTamanho, $paginaAtual);
                    
                    }

                }else{

                    if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["ord"]) || isset($_GET["tOrd"]) || isset($_GET["q"]) || isset($_GET["sexo"]) || isset($_GET["cat"])){

                        $novaPagina = $paginaAtual."&tamanho={$i}";

                    }else{

                        $novaPagina = $paginaAtual."?tamanho={$i}";

                    }

                }    
                    
                ?>

                window.location="<?php echo $novaPagina; ?>";

                }

                <?php

                $i++;

            }
            
            ?>

        }

        function alterar_precos(){

            var valorMinimo = document.getElementById("vMin").value;
            var valorMaximo = document.getElementById("vMax").value;

            <?php
            
            /* if(isset($_GET["vMin"]) || isset($_GET["vMax"]) || isset($_GET["sexo"]) || isset($_GET["cat"]) || isset($_GET["q"]) || isset($_GET["tamanho"]) || isset($_GET["ord"])) */

            /* Apenas Sexo */
            if(isset($_GET["sexo"]) && !isset($_GET["cat"]) && !isset($_GET["q"]) && !isset($_GET["tamanho"]) && !isset($_GET["ord"])){

            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&sexo=<?php echo $sexoUrl; ?>";

            <?php

            }
            /* Apenas categoria */
            else if(!isset($_GET["sexo"]) && isset($_GET["cat"]) && !isset($_GET["q"]) && !isset($_GET["tamanho"]) && !isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&cat=<?php echo $categoriaFiltro; ?>";

            <?php

            }
            /* Apenas busca */
            else if(!isset($_GET["sexo"]) && !isset($_GET["cat"]) && isset($_GET["q"]) && !isset($_GET["tamanho"]) && !isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&q=<?php echo $buscaFiltro; ?>";

            <?php

            }
            /* Apenas tamanho */
            else if(!isset($_GET["sexo"]) && !isset($_GET["cat"]) && !isset($_GET["q"]) && isset($_GET["tamanho"]) && !isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&tamanho=<?php echo $tamanhoFiltro; ?>";

            <?php

            }
            /* Apenas ordenação */
            else if(!isset($_GET["sexo"]) && !isset($_GET["cat"]) && !isset($_GET["q"]) && !isset($_GET["tamanho"]) && isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&ord=<?php echo $ordenacao; ?>";

            <?php

            }
            /* Sexo, categoria */
            else if(isset($_GET["sexo"]) && isset($_GET["cat"]) && !isset($_GET["q"]) && !isset($_GET["tamanho"]) && !isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&sexo=<?php echo $sexoUrl; ?>&cat=<?php echo $categoriaFiltro; ?>";

            <?php

            }
            /* Sexo, busca */
            else if(isset($_GET["sexo"]) && !isset($_GET["cat"]) && isset($_GET["q"]) && !isset($_GET["tamanho"]) && !isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&sexo=<?php echo $sexoUrl; ?>&q=<?php echo $buscaFiltro; ?>";

            <?php

            }
            /* Sexo, tamanho */
            else if(isset($_GET["sexo"]) && !isset($_GET["cat"]) && !isset($_GET["q"]) && isset($_GET["tamanho"]) && !isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&sexo=<?php echo $sexoUrl; ?>&tamanho=<?php echo $tamanhoFiltro; ?>";

            <?php

            }
            /* Sexo, ordenação */
            else if(isset($_GET["sexo"]) && !isset($_GET["cat"]) && !isset($_GET["q"]) && !isset($_GET["tamanho"]) && isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&sexo=<?php echo $sexoUrl; ?>&ord=<?php echo $ordenacao; ?>";

            <?php

            }
            /* Sexo, categoria, tamanho */
            else if(isset($_GET["sexo"]) && isset($_GET["cat"]) && !isset($_GET["q"]) && isset($_GET["tamanho"]) && !isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&sexo=<?php echo $sexoUrl; ?>&cat=<?php echo $categoriaFiltro; ?>&tamanho=<?php echo $tamanhoFiltro; ?>";

            <?php

            }
            /* Sexo, categoria, ordenação */
            else if(isset($_GET["sexo"]) && isset($_GET["cat"]) && !isset($_GET["q"]) && !isset($_GET["tamanho"]) && isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&sexo=<?php echo $sexoUrl; ?>&cat=<?php echo $categoriaFiltro; ?>&ord=<?php echo $ordenacao; ?>";

            <?php

            }
            /* Sexo, busca, tamanho */
            else if(isset($_GET["sexo"]) && !isset($_GET["cat"]) && isset($_GET["q"]) && isset($_GET["tamanho"]) && !isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&sexo=<?php echo $sexoUrl; ?>&q=<?php echo $buscaFiltro; ?>&tamanho=<?php echo $tamanhoFiltro; ?>";

            <?php

            }
            /* Sexo, busca, ordenacao */
            else if(isset($_GET["sexo"]) && !isset($_GET["cat"]) && isset($_GET["q"]) && !isset($_GET["tamanho"]) && isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&sexo=<?php echo $sexoUrl; ?>&q=<?php echo $buscaFiltro; ?>&ord=<?php echo $ordenacao; ?>";

            <?php

            }
            /* Sexo, tamanho, ordenacao */
            else if(isset($_GET["sexo"]) && !isset($_GET["cat"]) && !isset($_GET["q"]) && isset($_GET["tamanho"]) && isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&sexo=<?php echo $sexoUrl; ?>&tamanho=<?php echo $tamanhoFiltro; ?>&ord=<?php echo $ordenacao; ?>";

            <?php

            }
            /* Sexo, categoria, tamanho, ordenação */
            else if(isset($_GET["sexo"]) && isset($_GET["cat"]) && !isset($_GET["q"]) && isset($_GET["tamanho"]) && isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&sexo=<?php echo $sexoUrl; ?>&cat=<?php echo $categoriaFiltro; ?>&tamanho=<?php echo $tamanhoFiltro; ?>&ord=<?php echo $ordenacao; ?>";

            <?php

            }
            /* Sexo, busca, tamanho, ordenação */
            else if(isset($_GET["sexo"]) && !isset($_GET["cat"]) && isset($_GET["q"]) && isset($_GET["tamanho"]) && isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&sexo=<?php echo $sexoUrl; ?>&q=<?php echo $buscaFiltro; ?>&tamanho=<?php echo $tamanhoFiltro; ?>&ord=<?php echo $ordenacao; ?>";

            <?php

            }
            /* categoria, tamanho */
            else if(!isset($_GET["sexo"]) && isset($_GET["cat"]) && !isset($_GET["q"]) && isset($_GET["tamanho"]) && !isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&cat=<?php echo $categoriaFiltro; ?>&tamanho=<?php echo $tamanhoFiltro; ?>";

            <?php

            }
            /* categoria, ordenação */
            else if(!isset($_GET["sexo"]) && isset($_GET["cat"]) && !isset($_GET["q"]) && !isset($_GET["tamanho"]) && isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&cat=<?php echo $categoriaFiltro; ?>&ord=<?php echo $ordenacao; ?>";

            <?php

            }
            /* categoria, tamanho, ordenação */
            else if(!isset($_GET["sexo"]) && isset($_GET["cat"]) && !isset($_GET["q"]) && isset($_GET["tamanho"]) && isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&cat=<?php echo $categoriaFiltro; ?>&tamanho=<?php echo $tamanhoFiltro; ?>&ord=<?php echo $ordenacao; ?>";

            <?php

            }
            /* busca, tamanho */
            else if(!isset($_GET["sexo"]) && !isset($_GET["cat"]) && isset($_GET["q"]) && isset($_GET["tamanho"]) && !isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&q=<?php echo $buscaFiltro; ?>&tamanho=<?php echo $tamanhoFiltro; ?>";

            <?php

            }
            /* busca, ordenação */
            else if(!isset($_GET["sexo"]) && !isset($_GET["cat"]) && isset($_GET["q"]) && !isset($_GET["tamanho"]) && isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&q=<?php echo $buscaFiltro; ?>&ord=<?php echo $ordenacao; ?>";

            <?php

            }
            /* busca, tamanho, ordenação */
            else if(!isset($_GET["sexo"]) && !isset($_GET["cat"]) && isset($_GET["q"]) && isset($_GET["tamanho"]) && isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&q=<?php echo $buscaFiltro; ?>&tamanho=<?php echo $tamanhoFiltro; ?>&ord=<?php echo $ordenacao; ?>";

            <?php

            }
            /* tamanho, ordenação */
            else if(!isset($_GET["sexo"]) && !isset($_GET["cat"]) && !isset($_GET["q"]) && isset($_GET["tamanho"]) && isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo+"&tamanho=<?php echo $tamanhoFiltro; ?>&ord=<?php echo $ordenacao; ?>";

            <?php

            }
            /* Apenas valores */
            else if(!isset($_GET["sexo"]) && !isset($_GET["cat"]) && !isset($_GET["q"]) && !isset($_GET["tamanho"]) && !isset($_GET["ord"])){
            
            ?>

            window.location="loja?vMin="+valorMinimo+"&vMax="+valorMaximo;

            <?php

            }

            ?>

        }

    </script>

</head>

<body>

    <div class="container-fluid">

        <?php
        
        include "phpPartes/cabecalho.php"
        
        ?>

    </div>

    <div id="espacoMenuFiltroPreto"></div>

    <div id="espacoMenuFiltro">

        <span>Preço</span>

        <div id="filtroValores" class="mb-4">

            <table border="0" cellspacing="0" width="100%" class="text-center">

                <tr>

                    <td>

                        <div class="input-group">
                            <span class="input-group-text">R$</span>
                            <input type="number" id="vMin2" autocomplete="off" class="form-control" name="vMin" required>
                        </div>

                    </td>

                </tr>

                <tr>

                    <td class="pt-3">

                        <div class="input-group">
                            <span class="input-group-text">R$</span>
                            <input type="number" id="vMax2" autocomplete="off" class="form-control" name="vMax" required>
                        </div>

                    </td>

                </tr>

            </table>

            <div id="slider-range2" class="mt-3 d-none"></div>

            <button onclick="alterar_precos()" type="button" class="form-control mt-3" id="botaoFiltrar">FILTRAR</button>

        </div>

        <span>Tamanho</span>

        <div id="filtroValores" class="mb-4">

            <table border="0" cellspacing="0" width="100%" class="text-center">

            <?php
                            
            $resultTamanho = explode(",", $tamanhoFiltro);
            
            ?>

            <tr>

                <td>

                    <input id="tamanhop" type="checkbox" onchange="alterar_tamanho('p')" <?php
                    
                    $key = array_search("p", $resultTamanho);

                    if(in_array("p", $resultTamanho)){

                        echo "checked";

                    }
                    
                    ?>> <label for="tamanhop">P</label>

                </td>

                <td>

                    <input id="tamanhom" type="checkbox" onchange="alterar_tamanho('m')" <?php
                    
                    $key = array_search("m", $resultTamanho);

                    if(in_array("m", $resultTamanho)){

                        echo "checked";

                    }
                    
                    ?>> <label for="tamanhom">M</label>

                </td>

                <td>

                    <input id="tamanhog" type="checkbox" onchange="alterar_tamanho('g')" <?php
                    
                    $key = array_search("g", $resultTamanho);

                    if(in_array("g", $resultTamanho)){

                        echo "checked";

                    }
                    
                    ?>> <label for="tamanhog">G</label>

                </td>

            </tr>

            <tr>

                <td>

                    <input id="tamanho1" type="checkbox" onchange="alterar_tamanho('1')" <?php
                    
                    $key = array_search("1", $resultTamanho);

                    if(in_array("1", $resultTamanho)){

                        echo "checked";

                    }
                    
                    ?>> <label for="tamanho1">1</label>

                </td>

                <td>

                    <input id="tamanho2" type="checkbox" onchange="alterar_tamanho('2')" <?php
                    
                    $key = array_search("2", $resultTamanho);

                    if(in_array("2", $resultTamanho)){

                        echo "checked";

                    }
                    
                    ?>> <label for="tamanho2">2</label>

                </td>

                <td>

                    <input id="tamanho3" type="checkbox" onchange="alterar_tamanho('3')" <?php
                    
                    $key = array_search("3", $resultTamanho);

                    if(in_array("3", $resultTamanho)){

                        echo "checked";

                    }
                    
                    ?>> <label for="tamanho3">3</label>

                </td>

            </tr>

            <tr>

                <td>

                    <input id="tamanho4" type="checkbox" onchange="alterar_tamanho('4')" <?php
                    
                    $key = array_search("4", $resultTamanho);

                    if(in_array("4", $resultTamanho)){

                        echo "checked";

                    }
                    
                    ?>> <label for="tamanho4">4</label>

                </td>

                <td>

                    <input id="tamanho5" type="checkbox" onchange="alterar_tamanho('5')" <?php
                    
                    $key = array_search("5", $resultTamanho);

                    if(in_array("5", $resultTamanho)){

                        echo "checked";

                    }
                    
                    ?>> <label for="tamanho5">5</label>

                </td>

                <td>

                    <input id="tamanho6" type="checkbox" onchange="alterar_tamanho('6')" <?php
                    
                    $key = array_search("6", $resultTamanho);

                    if(in_array("6", $resultTamanho)){

                        echo "checked";

                    }
                    
                    ?>> <label for="tamanho6">6</label>

                </td>

            </tr>

            <tr>

                <td>

                    <input id="tamanho7" type="checkbox" onchange="alterar_tamanho('7')" <?php
                    
                    $key = array_search("7", $resultTamanho);

                    if(in_array("7", $resultTamanho)){

                        echo "checked";

                    }
                    
                    ?>> <label for="tamanho7">7</label>

                </td>

                <td>

                    <input id="tamanho8" type="checkbox" onchange="alterar_tamanho('8')" <?php
                    
                    $key = array_search("8", $resultTamanho);

                    if(in_array("8", $resultTamanho)){

                        echo "checked";

                    }
                    
                    ?>> <label for="tamanho8">8</label>

                </td>

                <td>

                    

                </td>

            </tr>

            </table>

        </div>

    </div>

    <div class="container-fluid">

        <div class="row justify-content-center mt-4">

            <div class="col-12 col-lg-10">

                <div class="row">

                    <div class="col-3 d-none d-lg-block text-secondary" id="colunaFiltro">

                        <span>Preço</span>

                        <div id="filtroValores" class="mb-4">

                            <table border="0" cellspacing="0" width="100%" class="text-center">

                                <tr>

                                    <td>

                                        <div class="input-group">
                                            <span class="input-group-text">R$</span>
                                            <input type="number" id="vMin" autocomplete="off" class="form-control" name="vMin" required>
                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td class="pt-3">

                                        <div class="input-group">
                                            <span class="input-group-text">R$</span>
                                            <input type="number" id="vMax" autocomplete="off" class="form-control" name="vMax" required>
                                        </div>

                                    </td>

                                </tr>

                            </table>

                            <div id="slider-range" class="mt-3"></div>

                            <button onclick="alterar_precos()" type="button" class="form-control mt-3" id="botaoFiltrar">FILTRAR</button>

                        </div>

                        <span>Tamanho</span>

                        <div id="filtroValores" class="mb-4">

                            <table border="0" cellspacing="0" width="100%" class="text-center">

                                <tr>

                                    <td>

                                        <input id="tamanhop" type="checkbox" onchange="alterar_tamanho('p')" <?php
                                        
                                        $key = array_search("p", $resultTamanho);

                                        if(in_array("p", $resultTamanho)){

                                            echo "checked";

                                        }
                                        
                                        ?>> <label for="tamanhop">P</label>

                                    </td>

                                    <td>

                                        <input id="tamanhom" type="checkbox" onchange="alterar_tamanho('m')" <?php
                                        
                                        $key = array_search("m", $resultTamanho);

                                        if(in_array("m", $resultTamanho)){

                                            echo "checked";

                                        }
                                        
                                        ?>> <label for="tamanhom">M</label>

                                    </td>

                                    <td>

                                        <input id="tamanhog" type="checkbox" onchange="alterar_tamanho('g')" <?php
                                        
                                        $key = array_search("g", $resultTamanho);

                                        if(in_array("g", $resultTamanho)){

                                            echo "checked";

                                        }
                                        
                                        ?>> <label for="tamanhog">G</label>

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input id="tamanho1" type="checkbox" onchange="alterar_tamanho('1')" <?php
                                        
                                        $key = array_search("1", $resultTamanho);

                                        if(in_array("1", $resultTamanho)){

                                            echo "checked";

                                        }
                                        
                                        ?>> <label for="tamanho1">1</label>

                                    </td>

                                    <td>

                                        <input id="tamanho2" type="checkbox" onchange="alterar_tamanho('2')" <?php
                                        
                                        $key = array_search("2", $resultTamanho);

                                        if(in_array("2", $resultTamanho)){

                                            echo "checked";

                                        }
                                        
                                        ?>> <label for="tamanho2">2</label>

                                    </td>

                                    <td>

                                        <input id="tamanho3" type="checkbox" onchange="alterar_tamanho('3')" <?php
                                        
                                        $key = array_search("3", $resultTamanho);

                                        if(in_array("3", $resultTamanho)){

                                            echo "checked";

                                        }
                                        
                                        ?>> <label for="tamanho3">3</label>

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input id="tamanho4" type="checkbox" onchange="alterar_tamanho('4')" <?php
                                        
                                        $key = array_search("4", $resultTamanho);

                                        if(in_array("4", $resultTamanho)){

                                            echo "checked";

                                        }
                                        
                                        ?>> <label for="tamanho4">4</label>

                                    </td>

                                    <td>

                                        <input id="tamanho5" type="checkbox" onchange="alterar_tamanho('5')" <?php
                                        
                                        $key = array_search("5", $resultTamanho);

                                        if(in_array("5", $resultTamanho)){

                                            echo "checked";

                                        }
                                        
                                        ?>> <label for="tamanho5">5</label>

                                    </td>

                                    <td>

                                        <input id="tamanho6" type="checkbox" onchange="alterar_tamanho('6')" <?php
                                        
                                        $key = array_search("6", $resultTamanho);

                                        if(in_array("6", $resultTamanho)){

                                            echo "checked";

                                        }
                                        
                                        ?>> <label for="tamanho6">6</label>

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input id="tamanho7" type="checkbox" onchange="alterar_tamanho('7')" <?php
                                        
                                        $key = array_search("7", $resultTamanho);

                                        if(in_array("7", $resultTamanho)){

                                            echo "checked";

                                        }
                                        
                                        ?>> <label for="tamanho7">7</label>

                                    </td>

                                    <td>

                                        <input id="tamanho8" type="checkbox" onchange="alterar_tamanho('8')" <?php
                                        
                                        $key = array_search("8", $resultTamanho);

                                        if(in_array("8", $resultTamanho)){

                                            echo "checked";

                                        }
                                        
                                        ?>> <label for="tamanho8">8</label>

                                    </td>

                                    <td>

                                        

                                    </td>

                                </tr>

                            </table>

                        </div>

                    </div>

                    <div class="col-12 col-lg-9" id="espacoItens">

                        <div class="row">

                            <div class="col-8">

                                <div id="bFiltro" class="float-start text-center me-1 d-block d-lg-none">
                                    
                                    <img src="img/filtro.png" id="imgFiltro">
                                
                                </div>

                                <div id="bFeminino" onclick="mudar_link_sexo('t')" class="float-start text-center <?php
                                
                                if(!isset($_GET["sexo"]) || $_GET["sexo"] == "tud"){

                                    echo "botaoTipoAtivo";

                                }
                                
                                ?> d-inline-block me-1">
                                    
                                    <p id="textoTipo" class="fs-6 d-none d-md-block">TUDO</p>
                                    <p id="textoTipo" class="fs-5 d-block d-md-none">T</p>
                                
                                </div>

                                <div id="bFeminino" onclick="mudar_link_sexo('f')" class="float-start text-center <?php
                                
                                if($_GET["sexo"] == "fem"){

                                    echo "botaoTipoAtivo";

                                }
                                
                                ?> d-inline-block me-1">
                                    
                                    <p id="textoTipo" class="fs-6 d-none d-md-block">FEMININO</p>
                                    <p id="textoTipo" class="fs-5 d-block d-md-none">F</p>
                                
                                </div>

                                <div id="bFeminino" onclick="mudar_link_sexo('m')" class="float-start text-center <?php
                                
                                if($_GET["sexo"] == "masc"){

                                    echo "botaoTipoAtivo";

                                }
                                
                                ?> d-inline-block">
                                    
                                    <p id="textoTipo" class="fs-6 d-none d-md-block">MASCULINO</p>
                                    <p id="textoTipo" class="fs-5 d-block d-md-none">M</p>
                                
                                </div>

                            </div>

                            <div class="col-4">

                                <select id="selectOrganizar" class="float-end text-secondary" onchange="alterar_ordenacao(this.value)">

                                    <option hidden disbled>Organizar por</option>
                                    <option value="nome">Nome</option>
                                    <option value="ua">Último adicionado</option>
                                    <option value="pa">Primeiro adicionado</option>
                                    <option value="menorp">Menor preço</option>
                                    <option value="maiorp">Maior preço</option>

                                </select>

                            </div>

                        </div>

                        <script>

                            $( "#bFiltro" ).click(function() {
                                $("#espacoMenuFiltroPreto").css("display", "block");
                                $("#espacoMenuFiltroPreto").animate({
                                    opacity: "0.2"
                                }, 100 );
                                $( "#espacoMenuFiltro" ).animate({
                                    width: "256px",
                                    right: "0px"
                                }, 100 );
                            });
                    
                            $( "#espacoMenuFiltroPreto" ).click(function() {
                                $("#espacoMenuFiltroPreto").animate({
                                    opacity: "0.0"
                                }, 100 );
                                $("#espacoMenuFiltroPreto").css("display", "none");
                                $( "#espacoMenuFiltro" ).animate({
                                    width: "0px",
                                    right: "-50px"
                                }, 100 );
                            });
                    
                        </script>

                        <div class="row" id="espacoProdutos">

                            <?php

                            $funcRetornaProdutos = $classeProdutos->retorna_lista_produtos(1, $vMin, $vMax, $categoriaFiltro, $sexoUrl, $ordenacao, $buscaFiltro, $tamanhoFiltro);

                            if($funcRetornaProdutos != false){
                            
                            foreach($funcRetornaProdutos[0] as $arrProdutos){

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

                            <div class="col-12 col-sm-6 col-md-4">

                                <div onclick="window.location='produto/<?php echo $str6; ?>'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">

                                    <img src="img/produtos/<?php echo $arrProdutos["foto"]; ?>" id="fotoAnelProdutos">

                                    <p id="nomeItem" class="card-text mt-1 pt-2"><?php echo $arrProdutos["nome"]; ?></p>

                                    <span id="precoAntigo" class="text-decoration-line-through text-secondary <?php if($arrProdutos["preco_promocao"] == ""){ echo "d-none"; } ?>">R$<?php echo number_format($arrProdutos["preco_promocao"], 2, ",", "."); ?></span>
                                    <h5 class="card-title fs-4"  id="precoPromocao">R$<?php echo number_format($arrProdutos["preco"], 2, ",", "."); ?></h5>

                                </div>

                            </div>

                            <?php

                            }

                            }else{

                            ?>

                            <div class="col-12 text-center mt-5 text-secondary">

                                OOPS NÃO ENCONTRAMOS NADA AQUI!

                            </div>

                            <?php
                            
                            }
                            
                            ?>

                        </div>

                        <div class="row mt-5">

                            <div class="col text-center">

                                <input type="hidden" id="hiddenPg" value="2">

                                <button id="botaoMostrar">Carregar mais</button>

                                <span class="text-secondary d-none" id="issoETudo">ISSO É TUDO!<br>AJUSTE SEU FILTRO, TALVEZ ENCONTRE MAIS PRODUTOS :) </span>

                                <img id="imgLoading" src='img/carregando3.gif' class="d-none" width='80px'>

                            </div>

                        </div>

                        <script>

                        function retornaProdutos(pg, vMin, vMax, sexo, ordenacao, tamanho, categoria, busca) {
                            
                            $.ajax({

                                type: "POST",
                                dataType: "html",

                                url: "ajax/listarProdutosLoja.php",

                                /* beforeSend: function () {

                                    var pgMenosUm = parseInt(pg) - 1;

                                    $("#espacoProdutos"+pg).html("<img src='img/carregando.gif' width='60px'>");

                                }, */

                                data: {pg: pg, vMin: vMin, vMax: vMax, sexo: sexo, ordenacao: ordenacao, tamanho: tamanho, categoria: categoria, busca: busca},

                                success: function (msg) {

                                    $("#espacoProdutos").append(msg);

                                    $("#botaoMostrar").removeClass("d-none");
                                    $("#imgLoading").addClass("d-none");

                                }

                            });

                        }

                        $("#botaoMostrar").click(function(){

                            $("#botaoMostrar").addClass("d-none");
                            $("#imgLoading").removeClass("d-none");

                            var pg = document.getElementById("hiddenPg").value;

                            retornaProdutos(pg, "<?php echo $vMin ?>", "<?php echo $vMax ?>", "<?php echo $sexoUrl ?>", "<?php echo $ordenacao ?>", "<?php echo $tamanhoFiltro ?>", "<?php echo $categoriaFiltro ?>", "<?php echo $buscaFiltro ?>");

                            $("#hiddenPg").val(parseInt(pg) + 1);

                            var pgMenosUm = parseInt(pg) - 1;

                            /* $("<div class='row' id='espacoProdutos"+pg+"'></div>").insertAfter("#espacoProdutos"+pgMenosUm); */

                        });

                        </script>

                    </div>

                </div>

            </div>

        </div>

        <div style="margin-top: 400px;"></div>

        <?php
                
        include "phpPartes/rodape.php";
        
        ?>

    </div>

</body>

</html>