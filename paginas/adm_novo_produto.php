<!DOCTYPE html>
<html>

<head>

    

    <title>Novo produto - adm - Manulá Baby</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Geral -->
    <meta name="description" content="Compre jóias e acessórios com o melhor custo benefício do mercado, só aqui no Oscar Jóias.">
    <meta name="author" content="erickmota.com">
    <meta name="robots" content="noindex">

    <!-- Google+ / Schema.org -->
    <meta itemprop="name" content="Oscar Jóias">
    <meta itemprop="description" content="Compre jóias e acessórios com o melhor custo benefício do mercado, só aqui no Oscar Jóias.">
    <meta itemprop="image" content="img/apresentacao.jpg">

    <!-- Open Graph Facebook -->
    <meta property="og:title" content="Oscar Jóias">
    <meta property="og:description" content="Compre jóias e acessórios com o melhor custo benefício do mercado, só aqui no Oscar Jóias."/>
    <meta property="og:site_name" content="Oscar Jóias"/>
    <meta property="og:type" content="website">
    <meta property="og:image" content="img/apresentacao.jpg">

    <!-- Twitter -->
    <meta name="twitter:title" content="Oscar Jóias">
    <meta name="twitter:description" content="Compre jóias e acessórios com o melhor custo benefício do mercado, só aqui no Oscar Jóias.">
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

    <!-- FlexDatalist -->
    <link href="jquery-flexdatalist-2.3.0/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
    <script src="jquery-flexdatalist-2.3.0/jquery.flexdatalist.min.js"></script>

    <link rel="stylesheet" href="css/adm_novo_produto.css">

    <script>
        
        function aparecerVariacoes1(op){

            var nomeVariacao1 = document.getElementById("campoVariacao1");
            var textoClienteVariacao1 = document.getElementById("textoClienteVariacao1");
            var opVariacao1 = document.getElementById("opVariacao1");
            var botaoAddVariacao1 = document.getElementById("botaoAddVariacao1");
            var botaoRemoveVariacao1 = document.getElementById("botaoRemoveVariacao1");

            if(op == true){

                $("#fundoVariacoesCinza1").slideDown("fast");
                $("#botaoAddVariacao2").removeClass("d-none");

                botaoAddVariacao1.classList.add("d-none");
                botaoRemoveVariacao1.classList.remove("d-none");

            }else{

                aparecerVariacoes3(false);
                $("#botaoAddVariacao3").addClass("d-none");
                aparecerVariacoes2(false);
                $("#botaoAddVariacao2").addClass("d-none");

                nomeVariacao1.value = "";
                textoClienteVariacao1.value = "";
                $('#opVariacao1').flexdatalist('disabled', false);
                $('#opVariacao1').flexdatalist('value', '');
                $('#opVariacao1').flexdatalist('disabled', true);
                textoClienteVariacao1.setAttribute("disabled", "disabled");

                $("#fundoVariacoesCinza1").slideUp("fast");

                botaoAddVariacao1.classList.remove("d-none");
                botaoRemoveVariacao1.classList.add("d-none");

            }

        }

        function aparecerVariacoes2(op){

            var nomeVariacao2 = document.getElementById("campoVariacao2");
            var textoClienteVariacao2 = document.getElementById("textoClienteVariacao2");
            var opVariacao2 = document.getElementById("opVariacao2");
            var botaoAddVariacao2 = document.getElementById("botaoAddVariacao2");
            var botaoRemoveVariacao2 = document.getElementById("botaoRemoveVariacao2");

            if(op == true){

                $("#fundoVariacoesCinza2").slideDown("fast");
                $("#botaoAddVariacao3").removeClass("d-none");

                botaoAddVariacao2.classList.add("d-none");
                botaoRemoveVariacao2.classList.remove("d-none");

            }else{

                aparecerVariacoes3(false);
                $("#botaoAddVariacao3").addClass("d-none");

                nomeVariacao2.value = "";
                textoClienteVariacao2.value = "";
                $('#opVariacao2').flexdatalist('disabled', false);
                $('#opVariacao2').flexdatalist('value', '');
                $('#opVariacao2').flexdatalist('disabled', true);
                textoClienteVariacao2.setAttribute("disabled", "disabled");

                $("#fundoVariacoesCinza2").slideUp("fast");

                botaoAddVariacao2.classList.remove("d-none");
                botaoRemoveVariacao2.classList.add("d-none");

            }

        }

        function aparecerVariacoes3(op){

            var nomeVariacao3 = document.getElementById("campoVariacao3");
            var textoClienteVariacao3 = document.getElementById("textoClienteVariacao3");
            var opVariacao3 = document.getElementById("opVariacao3");
            var botaoAddVariacao3 = document.getElementById("botaoAddVariacao3");
            var botaoRemoveVariacao3 = document.getElementById("botaoRemoveVariacao3");

            if(op == true){

                $("#fundoVariacoesCinza3").slideDown("fast");
                /* $("#botaoAddVariacao3").removeClass("d-none"); */

                botaoAddVariacao3.classList.add("d-none");
                botaoRemoveVariacao3.classList.remove("d-none");

            }else{

                nomeVariacao3.value = "";
                textoClienteVariacao3.value = "";
                $('#opVariacao3').flexdatalist('disabled', false);
                $('#opVariacao3').flexdatalist('value', '');
                $('#opVariacao3').flexdatalist('disabled', true);
                textoClienteVariacao3.setAttribute("disabled", "disabled");

                $("#fundoVariacoesCinza3").slideUp("fast");

                botaoAddVariacao3.classList.remove("d-none");
                botaoRemoveVariacao3.classList.add("d-none");

            }

        }

        $('.flexdatalist').flexdatalist({
            minLength: 1,
        });
        
        $(document).ready(function () {
        $('input').keypress(function (e) {
                var code = null;
                code = (e.keyCode ? e.keyCode : e.which);                
                return (code == 13) ? false : true;
        });
        });

        $(document).ready(function() {
            $(".checkTamanho").click(function(e) {
                var checados = [];
                $.each($("input[name='checkTamanho[]']:checked"), function(){            
                    checados.push($(this).val());
                });
                /* console.log(checados.join(", ")); */
                $("#tamanhos").val(checados.join(","));
            });
        });

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

                        <img id="iconeMenu" class="float-start mt-1 me-3 d-block d-md-none" src="img/menu.png" width="30px"><h1>Novo Produto</h1>

                    </div>

                </div>

                <script src="jsPartes/adm_menu_mobile.js"></script>

                <div class="row">

                    <div class="col text-secondary">

                        <form enctype="multipart/form-data" action="php/adm.php" method="POST">

                            <div class="row mt-4">

                                <div class="col-12 col-md-9">

                                    <label class="form-label">Nome do produto <span class="text-danger">*</span></label>
                                    <input id="campoNomeProduto" class="form-control" type="text" name="nome" maxlength="47" autocomplete="off" pattern="[a-zA-ZÀ-ú0-9 ]+" required>
                                    <div id="avisoNome" class="form-text text-danger"></div>
                                    <div class="form-text">Máximo de 47 caracteres; *Permitido apenas letras e números</div>

                                </div>

                                <script>

                                    function verifica_nome_produto(nome_produto) {
                                                        
                                        $.ajax({

                                            type: "POST",
                                            dataType: "html",

                                            url: "ajax/verifica_nome_produto.php",

                                            /* beforeSend: function () {

                                                $("#areaInputVariacaoTexto").html("<img src='img/loading.gif' width='60px'>");

                                            }, */

                                            data: {nome_produto: nome_produto},

                                            success: function (msg) {

                                                $("#avisoNome").html(msg);

                                            }

                                        });

                                    }

                                    $("#campoNomeProduto").keyup(function(){

                                        var campoNomeProduto = document.getElementById("campoNomeProduto").value;

                                        verifica_nome_produto(campoNomeProduto);

                                    });

                                </script>

                            </div>

                            <div class="row mt-4">

                                <script>

                                    function mudar_img(event, tipo){

                                        if(tipo == "capa"){

                                            var formatoArquivo = document.getElementById("input-capa").value.split('.').pop();
                                            var campoArquivo = document.getElementById("input-capa");

                                            if(formatoArquivo != "jpg" && formatoArquivo != "jpeg"){

                                                campoArquivo.value = "";
                                                var output = document.getElementById('escolher-img-capa');
                                                output.src = "img/selecionar-capa.png";
                                                alert("Por favor, selecione uma imagem no formato JPG");

                                            }else{

                                                var output = document.getElementById('escolher-img-capa');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.onload = function() {
                                                URL.revokeObjectURL(output.src)
                                                }

                                                $("#label-img-1").removeClass("d-none");

                                            }                                      

                                        }else{

                                            var formatoArquivo = document.getElementById("input-img-"+tipo).value.split('.').pop();
                                            var campoArquivo = document.getElementById("input-img-"+tipo);

                                            if(formatoArquivo != "jpg" && formatoArquivo != "jpeg"){

                                                var i = 9;

                                                while(i > tipo){

                                                    var formatoArquivoS = document.getElementById("input-img-"+i).value.split('.').pop();
                                                    var campoArquivoS = document.getElementById("input-img-"+i);

                                                    campoArquivoS.value = "";
                                                    var outputS = document.getElementById("escolher-img-"+i);
                                                    outputS.src = "img/selecionar-galeria.png";
                                                    $("#label-img-"+i).addClass("d-none");

                                                    i--;

                                                }

                                                $("#hiddenQtdImg").val(tipo - 1);

                                                campoArquivo.value = "";
                                                var output = document.getElementById("escolher-img-"+tipo);
                                                output.src = "img/selecionar-galeria.png";
                                                alert("Por favor, selecione uma imagem no formato JPG");

                                            }else{

                                                var output = document.getElementById("escolher-img-"+tipo);
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.onload = function() {
                                                URL.revokeObjectURL(output.src)
                                                }

                                                var somaTipo = tipo + 1;

                                                if($("#hiddenQtdImg").val() < somaTipo){

                                                    $("#hiddenQtdImg").val(tipo);

                                                }else{

                                                    

                                                }

                                                $("#label-img-"+somaTipo).removeClass("d-none");

                                            }

                                            /* var output = document.getElementById("escolher-img-"+tipo);
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            output.onload = function() {
                                            URL.revokeObjectURL(output.src)
                                            }

                                            var somaTipo = tipo + 1;

                                            if($("#hiddenQtdImg").val() < somaTipo){

                                                $("#hiddenQtdImg").val(tipo);

                                            }else{

                                                

                                            }

                                            $("#label-img-"+somaTipo).removeClass("d-none"); */

                                        }

                                    }

                                    function remover_img(){

                                        var numeroImg = $("#hiddenQtdImg").val();

                                        var somaImg = parseInt(numeroImg) + 1;

                                        $("#input-img-"+numeroImg).val("");
                                        document.getElementById("escolher-img-"+numeroImg).src ="img/selecionar-galeria.png";
                                        $("#label-img-"+somaImg).addClass("d-none");

                                        $("#hiddenQtdImg").val(numeroImg - 1);

                                    }

                                </script>

                                <div class="col">

                                    <label class="form-label" for="input-img1">Imagem da capa  <span class="text-danger">*</span> / Galeria</label>
                                    <div class="form-text text-info">*Essa prévia das imagens não correspondem ao modo como elas irão aparecer na galeria!</div><br>

                                    <label class="form-label" for="input-capa"><img src="img/selecionar-capa.png" id="escolher-img-capa" width="150px"></label>
                                    <input id="input-capa" class="form-control d-none" accept=".jpg, .jpeg" onchange="mudar_img(event, 'capa')" type="file" name="capa" required>

                                    <?php
                                    
                                    $i = 1;

                                    while($i <= 9){
                                    
                                    ?>

                                    <label id="label-img-<?php echo $i; ?>" class="form-label d-none" for="input-img-<?php echo $i; ?>"><img src="img/selecionar-galeria.png" id="escolher-img-<?php echo $i; ?>" width="150px"></label>
                                    <input id="input-img-<?php echo $i; ?>" class="form-control d-none" accept=".jpg, .jpeg" onchange="mudar_img(event, <?php echo $i; ?>)" type="file" name="img-<?php echo $i; ?>">

                                    <?php
                                    
                                    $i++;

                                    }
                                    
                                    ?>

                                    <input type="hidden" id="hiddenQtdImg" name="qtd-galeria">

                                    <img onclick="remover_img()" src="img/remover.png" width="25px" style="cursor: pointer;">

                                    <div class="form-text">A imagem da capa é obrigatória; adicione até 9 imagens (opcionais) para a galeria fora a capa</div>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-md-9">

                                    <label class="form-label" for="input-img1">Descrição do produto <span class="text-danger">*</span></label>

                                    <textarea class="form-control" rows="10" cols="80" name="descricao" required></textarea>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-sm-6 col-md-5 pb-3">

                                    <label class="form-label" for="input-img1">Preço <span class="text-danger">*</span></label>

                                    <input class="form-control" type="number" name="preco" step=".01" required>

                                    <div class="form-text">Preço para venda</div>

                                </div>

                                <div class="col-12 col-sm-6 col-md-4">

                                    <label class="form-label" for="input-img1">Preço antigo</label>

                                    <input class="form-control" type="number" step=".01" name="promocao">

                                    <div class="form-text text-info">*Deixe em branco, se não quiser mostrar nenhuma promoção</div>
                                    <div class="form-text">Irá aparecer assim <span class="text-decoration-line-through">R$1000,00</span></div>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-sm-6 col-md-5 pb-3">

                                    <label class="form-label" for="input-img1">Quantidade no estoque <span class="text-danger">*</span></label>

                                    <input class="form-control" type="number" name="qtd" required>

                                    <div class="form-text">Dica: se estiver vendendo esse produto sob encomenda, defina uma quantidade alta</div>

                                </div>

                                <div class="col-12 col-sm-6 col-md-4">

                                    <label class="form-label" for="input-img1">Estado do produto <span class="text-danger">*</span></label>

                                    <select class="form-select" name="estado" required>

                                        <option disabled selected hidden value="">Difina o estado</option>
                                        <option value="publicado-disponivel">Publicado - disponível</option>
                                        <option value="publicado-nao-disponivel">Publicado - Não disponível</option>
                                        <option value="rascunho">Rascunho</option>
            
                                    </select>

                                </div>

                            </div>

                            <!-- <div class="row mt-4">

                                <div class="col-12 col-md-9">

                                    <label class="form-label" for="input-img1">Variação padrão <span class="text-danger">*</span></label>

                                    <select class="form-select" name="variacao" required>

                                        <option disabled selected hidden value="">Difina um padrão</option>
                                        <option value="nenhum">P</option>
                                        <option value="unico">M</option>
                                        <option value="casal">G</option>
                                        <option value="aro">Apenas aro</option>
                                        <option value="gravacao">Apenas gravação</option>
            
                                    </select>

                                    <div class="form-text"><b>Nenhum padrão:</b> não será solicitado nenhum padrão de escolha ao usuário<br>
                                    <b>Anel único:</b> Será solicitado número do aro e gravação, apenas para uma pessoa<br>
                                    <b>Anel casal:</b> Será solicitado número do aro e gravação, para duas pessoas<br>
                                    <b>Apenas aro:</b> Será solicitado apenas o número do aro (sem a gravação), apenas para uma pessoa<br>
                                    <b>Apenas gravação:</b> Será solicitado apenas a gravação, apenas para uma pessoa</div>

                                </div>

                            </div> -->

                            <div class="row mt-4">

                                <div class="col-12 col-md-9">

                                    <label>Tamanhos disponíveis <span class="text-danger">*</span></label>

                                    <div id="filtroValores">

                                        <table border="0" cellspacing="0" width="100%" class="text-center">

                                        <tr>

                                            <td>

                                                <input id="tamanhop" class="checkTamanho" type="checkbox" name="checkTamanho[]" value="p">
                                                <label id="boxTamanho-m" class="boxTamanho text-center" for="tamanhop">

                                                    <span class="fs-3">P</span>

                                                </label>

                                            </td>

                                            <td>

                                                <input id="tamanhom" class="checkTamanho" type="checkbox" name="checkTamanho[]" value="m">
                                                <label id="boxTamanho-m" class="boxTamanho text-center" for="tamanhom">

                                                    <span class="fs-3">M</span>

                                                </label>

                                            </td>

                                            <td>

                                                <input id="tamanhog" class="checkTamanho" type="checkbox" name="checkTamanho[]" value="g">
                                                <label id="boxTamanho-m" class="boxTamanho text-center" for="tamanhog">

                                                    <span class="fs-3">G</span>

                                                </label>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td>

                                                <input id="tamanho1" class="checkTamanho" type="checkbox" name="checkTamanho[]" value="1">
                                                <label id="boxTamanho-m" class="boxTamanho text-center" for="tamanho1">

                                                    <span class="fs-3">1</span>

                                                </label>

                                            </td>

                                            <td>

                                                <input id="tamanho2" class="checkTamanho" type="checkbox" name="checkTamanho[]" value="2">
                                                <label id="boxTamanho-m" class="boxTamanho text-center" for="tamanho2">

                                                    <span class="fs-3">2</span>

                                                </label>

                                            </td>

                                            <td>

                                                <input id="tamanho3" class="checkTamanho" type="checkbox" name="checkTamanho[]" value="3">
                                                <label id="boxTamanho-m" class="boxTamanho text-center" for="tamanho3">

                                                    <span class="fs-3">3</span>

                                                </label>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td>

                                                <input id="tamanho4" class="checkTamanho" type="checkbox" name="checkTamanho[]" value="4">
                                                <label id="boxTamanho-m" class="boxTamanho text-center" for="tamanho4">

                                                    <span class="fs-3">4</span>

                                                </label>

                                            </td>

                                            <td>

                                                <input id="tamanho5" class="checkTamanho" type="checkbox" name="checkTamanho[]" value="5">
                                                <label id="boxTamanho-m" class="boxTamanho text-center" for="tamanho5">

                                                    <span class="fs-3">5</span>

                                                </label>

                                            </td>

                                            <td>

                                                <input id="tamanho6" class="checkTamanho" type="checkbox" name="checkTamanho[]" value="6">
                                                <label id="boxTamanho-m" class="boxTamanho text-center" for="tamanho6">

                                                    <span class="fs-3">6</span>

                                                </label>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td>

                                                <input id="tamanho7" class="checkTamanho" type="checkbox" name="checkTamanho[]" value="7">
                                                <label id="boxTamanho-m" class="boxTamanho text-center" for="tamanho7">

                                                    <span class="fs-3">7</span>

                                                </label>

                                            </td>

                                            <td>

                                                <input id="tamanho8" class="checkTamanho" type="checkbox" name="checkTamanho[]" value="8">
                                                <label id="boxTamanho-m" class="boxTamanho text-center" for="tamanho8">

                                                    <span class="fs-3">8</span>

                                                </label>

                                            </td>

                                            <td>

                                                

                                            </td>

                                        </tr>

                                        </table>

                                        <input type="text" id="tamanhos" name="tamanhos" required>

                                    </div>

                                    <div class="form-text">Selecione acima, todos os tamanhos diponíveis para essa peça</div>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-md-9 text-center">

                                    <!-- <a onclick="aparecerVariacoes(true)" id="botaoAddVariacao" class="" style="cursor: pointer;">Adicionar variação complementar</a>
                                    <a onclick="aparecerVariacoes(false)" class="d-none" id="botaoRemoveVariacao" style="cursor: pointer;">Remover variação complementar</a> -->

                                    <button onclick="aparecerVariacoes1(true)" id="botaoAddVariacao1" type="button" class="form-control btn-outline-primary">+ VARIAÇÃO COMPLEMENTAR</button>
                                    <button onclick="aparecerVariacoes1(false)" id="botaoRemoveVariacao1" type="button" class="form-control btn-outline-secondary d-none">- VARIAÇÃO COMPLEMENTAR</button>

                                </div>

                            </div>

                            <div class="row mt-4" id="fundoVariacoesCinza1" style="display: none;">

                                <div class="col-12 col-md-9 p-3 bg-light">

                                    <div class="row">

                                        <div class="col">

                                            <label class="form-label" for="input-img1">Nome da variação</label>

                                            <input style="text-transform:lowercase;" list="variacoesDisponiveis" autocomplete="off" id="campoVariacao1" type="text" class="form-control" name="novaVariacao1">

                                            <div class="form-text">Selecione uma variacao já existente ou crie uma nova</div>

                                            <datalist id="variacoesDisponiveis">

                                                <?php
                                                
                                                foreach($classeProdutos->retorna_variacoes() as $arrVariacoes){
                                                
                                                ?>

                                                <option value="<?php echo $arrVariacoes["nome"]; ?>">

                                                <?php
                                                
                                                }
                                                
                                                ?>

                                            </datalist>

                                        </div>

                                    </div>

                                    <div class="row mt-4">

                                        <div class="col">

                                            <label class="form-label" for="input-img1">Texto para o cliente</label>

                                            <div id="areaInputVariacaoTexto1" class="text-center">

                                                <input autocomplete="off" id="textoClienteVariacao1" type="text" class="form-control" name="texto-variacao1" disabled>

                                            </div>

                                            <div class="form-text"><b>Exemplo:</b> Escolha a cor da pedra</div>

                                        </div>

                                    </div>

                                    <div class="row mt-4 mb-2">

                                        <div class="col">

                                            <label class="form-label" for="input-img1">Opções da variação</label>

                                            <!-- <input class="form-control" autocomplete="off" id="opVariacao" type="text" placeholder="separe cada opção com uma vírgula" name="opNovaVariacao"> -->

                                            <div id="areaInputVariacao1" class="text-center">

                                                <input id="opVariacao1" type='text' class='flexdatalist flex1  form-control' data-min-length='1' multiple='multiple' name="opNovaVariacao1" disabled>

                                            </div>

                                            <div class="form-text text-warning">Digite o nome da opção e pressione <b>ENTER</b> para confirmar e pular para a próxima opção</div>

                                        </div>

                                    </div>

                                    <script type="text/javascript">
                                                                                
                                        function retornar_op_variacoes1(nome_variacao) {
                    
                                            $.ajax({
                    
                                                type: "POST",
                                                dataType: "html",
                    
                                                url: "ajax/retorna_op_variacao.php",
                    
                                                beforeSend: function () {
                    
                                                    $("#areaInputVariacao1").html("<img src='img/loading.gif' width='60px'>");
                    
                                                },
                    
                                                data: {nome_variacao: nome_variacao, posicao: 1},
                    
                                                success: function (msg) {
                    
                                                    $("#areaInputVariacao1").html(msg);
                    
                                                }
                    
                                            });
                    
                                        }

                                        function retornar_texto_variacoes1(nome_variacao) {
                    
                                            $.ajax({

                                                type: "POST",
                                                dataType: "html",

                                                url: "ajax/retorna_texto_variacao.php",

                                                beforeSend: function () {

                                                    $("#areaInputVariacaoTexto1").html("<img src='img/loading.gif' width='60px'>");

                                                },

                                                data: {nome_variacao: nome_variacao, posicao: 1},

                                                success: function (msg) {

                                                    $("#areaInputVariacaoTexto1").html(msg);

                                                }

                                            });

                                        }

                                        $("#campoVariacao1").keyup(function(){

                                            var campoVariacao1 = document.getElementById("campoVariacao1").value;

                                            retornar_op_variacoes1(campoVariacao1);
                                            retornar_texto_variacoes1(campoVariacao1);

                                        });
                
                                    </script>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12 col-md-9 text-center">

                                    <!-- <a onclick="aparecerVariacoes(true)" id="botaoAddVariacao" class="" style="cursor: pointer;">Adicionar variação complementar</a>
                                    <a onclick="aparecerVariacoes(false)" class="d-none" id="botaoRemoveVariacao" style="cursor: pointer;">Remover variação complementar</a> -->

                                    <button onclick="aparecerVariacoes2(true)" id="botaoAddVariacao2" type="button" class="form-control btn-outline-primary d-none mt-4">+ VARIAÇÃO COMPLEMENTAR</button>
                                    <button onclick="aparecerVariacoes2(false)" id="botaoRemoveVariacao2" type="button" class="form-control btn-outline-secondary d-none mt-4">- VARIAÇÃO COMPLEMENTAR</button>

                                </div>

                            </div>

                            <div class="row mt-4" id="fundoVariacoesCinza2" style="display: none;">

                                <div class="col-12 col-md-9 p-3 bg-light">

                                    <div class="row">

                                        <div class="col">

                                            <label class="form-label" for="input-img1">Nome da variação</label>

                                            <input style="text-transform:lowercase;" list="variacoesDisponiveis" autocomplete="off" id="campoVariacao2" type="text" class="form-control" name="novaVariacao2">

                                            <div class="form-text">Selecione uma variacao já existente ou crie uma nova</div>

                                            <datalist id="variacoesDisponiveis">

                                                <?php
                                                
                                                foreach($classeProdutos->retorna_variacoes() as $arrVariacoes){
                                                
                                                ?>

                                                <option value="<?php echo $arrVariacoes["nome"]; ?>">

                                                <?php
                                                
                                                }
                                                
                                                ?>

                                            </datalist>

                                        </div>

                                    </div>

                                    <div class="row mt-4">

                                        <div class="col">

                                            <label class="form-label" for="input-img1">Texto para o cliente</label>

                                            <div id="areaInputVariacaoTexto2" class="text-center">

                                                <input autocomplete="off" id="textoClienteVariacao2" type="text" class="form-control" name="texto-variacao2" disabled>

                                            </div>

                                            <div class="form-text"><b>Exemplo:</b> Escolha a cor da pedra</div>

                                        </div>

                                    </div>

                                    <div class="row mt-4 mb-2">

                                        <div class="col">

                                            <label class="form-label" for="input-img1">Opções da variação</label>

                                            <!-- <input class="form-control" autocomplete="off" id="opVariacao" type="text" placeholder="separe cada opção com uma vírgula" name="opNovaVariacao"> -->

                                            <div id="areaInputVariacao2" class="text-center">

                                                <input id="opVariacao2" type='text' class='flexdatalist flex2 form-control' data-min-length='1' multiple='multiple' name="opNovaVariacao2" disabled>

                                            </div>

                                            <div class="form-text text-warning">Digite o nome da opção e pressione <b>ENTER</b> para confirmar e pular para a próxima opção</div>

                                        </div>

                                    </div>

                                    <script type="text/javascript">
                                                                                
                                        function retornar_op_variacoes2(nome_variacao) {
                    
                                            $.ajax({
                    
                                                type: "POST",
                                                dataType: "html",
                    
                                                url: "ajax/retorna_op_variacao.php",
                    
                                                beforeSend: function () {
                    
                                                    $("#areaInputVariacao2").html("<img src='img/loading.gif' width='60px'>");
                    
                                                },
                    
                                                data: {nome_variacao: nome_variacao, posicao: 2},
                    
                                                success: function (msg) {
                    
                                                    $("#areaInputVariacao2").html(msg);
                    
                                                }
                    
                                            });
                    
                                        }

                                        function retornar_texto_variacoes2(nome_variacao) {
                    
                                            $.ajax({

                                                type: "POST",
                                                dataType: "html",

                                                url: "ajax/retorna_texto_variacao.php",

                                                beforeSend: function () {

                                                    $("#areaInputVariacaoTexto2").html("<img src='img/loading.gif' width='60px'>");

                                                },

                                                data: {nome_variacao: nome_variacao, posicao: 2},

                                                success: function (msg) {

                                                    $("#areaInputVariacaoTexto2").html(msg);

                                                }

                                            });

                                        }

                                        $("#campoVariacao2").keyup(function(){

                                            var campoVariacao2 = document.getElementById("campoVariacao2").value;

                                            retornar_op_variacoes2(campoVariacao2);
                                            retornar_texto_variacoes2(campoVariacao2);

                                        });
                
                                    </script>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12 col-md-9 text-center">

                                    <!-- <a onclick="aparecerVariacoes(true)" id="botaoAddVariacao" class="" style="cursor: pointer;">Adicionar variação complementar</a>
                                    <a onclick="aparecerVariacoes(false)" class="d-none" id="botaoRemoveVariacao" style="cursor: pointer;">Remover variação complementar</a> -->

                                    <button onclick="aparecerVariacoes3(true)" id="botaoAddVariacao3" type="button" class="form-control btn-outline-primary d-none mt-4">+ VARIAÇÃO COMPLEMENTAR</button>
                                    <button onclick="aparecerVariacoes3(false)" id="botaoRemoveVariacao3" type="button" class="form-control btn-outline-secondary d-none mt-4">- VARIAÇÃO COMPLEMENTAR</button>

                                </div>

                            </div>

                            <div class="row mt-4" id="fundoVariacoesCinza3" style="display: none;">

                                <div class="col-12 col-md-9 p-3 bg-light">

                                    <div class="row">

                                        <div class="col">

                                            <label class="form-label" for="input-img1">Nome da variação</label>

                                            <input style="text-transform:lowercase;" list="variacoesDisponiveis" autocomplete="off" id="campoVariacao3" type="text" class="form-control" name="novaVariacao3">

                                            <div class="form-text">Selecione uma variacao já existente ou crie uma nova</div>

                                            <datalist id="variacoesDisponiveis">

                                                <?php
                                                
                                                foreach($classeProdutos->retorna_variacoes() as $arrVariacoes){
                                                
                                                ?>

                                                <option value="<?php echo $arrVariacoes["nome"]; ?>">

                                                <?php
                                                
                                                }
                                                
                                                ?>

                                            </datalist>

                                        </div>

                                    </div>

                                    <div class="row mt-4">

                                        <div class="col">

                                            <label class="form-label" for="input-img1">Texto para o cliente</label>

                                            <div id="areaInputVariacaoTexto3" class="text-center">

                                                <input autocomplete="off" id="textoClienteVariacao3" type="text" class="form-control" name="texto-variacao3" disabled>

                                            </div>

                                            <div class="form-text"><b>Exemplo:</b> Escolha a cor da pedra</div>

                                        </div>

                                    </div>

                                    <div class="row mt-4 mb-2">

                                        <div class="col">

                                            <label class="form-label" for="input-img1">Opções da variação</label>

                                            <!-- <input class="form-control" autocomplete="off" id="opVariacao" type="text" placeholder="separe cada opção com uma vírgula" name="opNovaVariacao"> -->

                                            <div id="areaInputVariacao3" class="text-center">

                                                <input id="opVariacao3" type='text' class='flexdatalist flex3 form-control' data-min-length='1' multiple='multiple' name="opNovaVariacao3" disabled>

                                            </div>

                                            <div class="form-text text-warning">Digite o nome da opção e pressione <b>ENTER</b> para confirmar e pular para a próxima opção</div>

                                        </div>

                                    </div>

                                    <script type="text/javascript">
                                                                                
                                        function retornar_op_variacoes3(nome_variacao) {
                    
                                            $.ajax({
                    
                                                type: "POST",
                                                dataType: "html",
                    
                                                url: "ajax/retorna_op_variacao.php",
                    
                                                beforeSend: function () {
                    
                                                    $("#areaInputVariacao3").html("<img src='img/loading.gif' width='60px'>");
                    
                                                },
                    
                                                data: {nome_variacao: nome_variacao, posicao: 3},
                    
                                                success: function (msg) {
                    
                                                    $("#areaInputVariacao3").html(msg);
                    
                                                }
                    
                                            });
                    
                                        }

                                        function retornar_texto_variacoes3(nome_variacao) {
                    
                                            $.ajax({

                                                type: "POST",
                                                dataType: "html",

                                                url: "ajax/retorna_texto_variacao.php",

                                                beforeSend: function () {

                                                    $("#areaInputVariacaoTexto3").html("<img src='img/loading.gif' width='60px'>");

                                                },

                                                data: {nome_variacao: nome_variacao, posicao: 3},

                                                success: function (msg) {

                                                    $("#areaInputVariacaoTexto3").html(msg);

                                                }

                                            });

                                        }

                                        $("#campoVariacao3").keyup(function(){

                                            var campoVariacao3 = document.getElementById("campoVariacao3").value;

                                            retornar_op_variacoes3(campoVariacao3);
                                            retornar_texto_variacoes3(campoVariacao3);

                                        });
                
                                    </script>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-md-9">

                                    <label class="form-label" for="input-img1">Categoria <span class="text-danger">*</span></label>

                                    <input type='text' autocomplete="off" class='flexdatalist form-control' pattern="[a-zA-ZÀ-ú0-9, ]+" data-min-length='0' multiple='multiple' list='categorias' name='categoria' required>

                                    <div class="form-text text-warning">Selecione categorias existentes, ou crie uma nova e pressione <b>ENTER</b> para confirmar</div>
                                    <div class="form-text">Você pode selecionar mais de uma categoria; é necessário pelo menos 1 categoria</div>

                                    <datalist id="categorias">

                                        <?php
                                        
                                        foreach($classeProdutos->retorna_categorias() as $arrCategoria){
                                        
                                        ?>

                                        <option value="<?php echo $arrCategoria["nome"]; ?>"><?php echo $arrCategoria["nome"]; ?></option>

                                        <?php
                                        
                                        }
                                        
                                        ?>

                                    </datalist>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-md-9">

                                    <label class="form-label" for="input-img1">Sexo <span class="text-danger">*</span></label>

                                    <select name="sexo" class="form-select" required>

                                        <option disabled selected hidden value="">Defina o sexo</option>
                                        <option value="feminino">Feminino</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="indefinido">Indefinido</option>

                                    </select>

                                    <div class="form-text">Defina se o produto é para o sexo masculino ou feminino</div>

                                </div>

                            </div>

                            <div class="row mt-5">

                                <div class="col-12 col-md-9">

                                    <h2>Correios / Frete <span class="text-danger">*</span></h2>

                                    <p class="text-info">Dados para calculo do frete. Preencher corretamente de acordo com as especificações dos campos!</p>
                                    
                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-sm-6 col-md-5 pb-3">

                                    <label class="form-label" for="input-img1">Peso do produto <span class="text-danger">*</span></label>

                                    <input class="form-control" type="number" name="peso" step=".01" required>

                                    <div class="form-text">Em Kg, onde 500g é equivalente a <b>0.5</b></div>
                                    
                                </div>

                                <div class="col-12 col-sm-6 col-md-4">

                                    <label class="form-label" for="input-img1">Altura do produto <span class="text-danger">*</span></label>

                                    <input class="form-control" type="number" min="1" name="altura" required>

                                    <div class="form-text">Em centímetros (cm), mínimo 1cm</div>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-sm-6 col-md-5 pb-3">

                                    <label class="form-label" for="input-img1">Largura do produto <span class="text-danger">*</span></label>

                                    <input class="form-control" type="number" min="10" name="largura" required>

                                    <div class="form-text">Em centímetros (cm), mínimo 10cm</div>
                                    
                                </div>

                                <div class="col-12 col-sm-6 col-md-4">

                                    <label class="form-label" for="input-img1">Comprimento do produto <span class="text-danger">*</span></label>

                                    <input class="form-control" type="number" min="15" name="comprimento" required>

                                    <div class="form-text">Em centímetros (cm), mínimo 15cm</div>

                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12 col-md-9">

                                    <label class="form-label" for="input-img1">Dias para entrega</label>

                                    <input class="form-control" type="number" name="dias-entrega">

                                    <div class="form-text text-info">*Deixe em branco para desconsiderar.</div>
                                    <div class="form-text">Esse valor será somado a quantidade de dias que o correios levará para entregar o produto,
                                    por exemplo, se os correios levará 5 dias, e você definir esse valor como 20, o cliente será informado que a encomenda
                                    levará 25 dias para entrega.
                                    </div>
                                    
                                </div>

                            </div>

                            <div class="row mt-4 mb-4">

                                <div class="col-12 col-md-9">

                                    <button id="botaoEnviar" type="submit" class="btn btn-success float-end">CADASTRAR</button>
                                    
                                </div>

                            </div>

                        </form>

                    </div>

                </div>

                    <!-- <form enctype="multipart/form-data" action="php/adm.php" method="POST">

                        Nome: <input type="text" name="nome" maxlength="47"><br>

                        Imagem capa: <input type="file" name="capa"><br>

                        Imagem galeria 1: <input type="file" name="galeria1"><br>

                        Imagem galeria 2: <input type="file" name="galeria2"><br>

                        Imagem galeria 3: <input type="file" name="galeria3"><br>

                        Descrição: <textarea rows="3" cols="80" name="descricao"></textarea><br>

                        Preço <input type="number" name="preco" step=".01"><br>

                        Quantidade estoque: <input type="number" name="qtd"><br>

                        estado da publicação: <select name="estado">

                            <option value="publicado-disponivel">Publicado - disponível</option>
                            <option value="publicado-nao-disponivel">Publicado - Não disponível</option>
                            <option value="rascunho">Rascunho</option>

                        </select><br>

                        Variação Padrão: <select name="variacao" onchange="aparecerVariacoes(this.value)">

                            <option value="nenhum">Nenhum padrão</option>
                            <option value="unico">Anel único</option>
                            <option value="casal">Anel casal</option>
                            <option value="aro">Apenas Aro</option>
                            <option value="gravacao">Apenas Gravação</option>

                        </select><br>

                        <a onclick="aparecerVariacoes(true)" id="botaoAddVariacao">Variação complementar</a>
                        <a onclick="aparecerVariacoes(false)" class="d-none" id="botaoRemoveVariacao">Remover variação complementar</a>

                        <br>Nome da variação: <input id="campoVariacao" type="text" class="d-none" name="novaVariacao"><br>

                        Opções das variações: <input id="opVariacao" type="text" placeholder="separe cada opção com uma vírgula" class="d-none" name="opNovaVariacao"><br>

                        <input type='text'
                            placeholder='Categoria'
                            class='flexdatalist'
                            data-min-length='1'
                            multiple='multiple'
                            list='languages'
                            name='categoria'>

                        <datalist id="languages">
                            <option value="PHP">PHP</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="Cobol">Cobol</option>
                            <option value="C#">C#</option>
                            <option value="C++">C++</option>
                            <option value="Java">Java</option>
                            <option value="Pascal">Pascal</option>
                            <option value="FORTRAN">FORTRAN</option>
                            <option value="Lisp">Lisp</option>
                            <option value="Swift">Swift</option>
                        </datalist><br>

                        Máximo de caracteres: <input type="number" name="maximo_caracteres"><br>

                        Promoção: <input type="number" step=".01" name="promocao"><br>

                        Tipo: <select name="tipo">

                            <option value="nenhum">Nenhum</option>
                            <option value="ouro">Ouro</option>
                            <option value="prata">Prata</option>

                        </select><br>

                        <input type="submit">

                    </form> -->

            </div>

        </div>

    </div>

</body>

</html>