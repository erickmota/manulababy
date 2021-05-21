<!DOCTYPE html>
<html>

<head>

    <?php

    $explode = explode("/", $_GET["url"]);
    
    /* Iniciando classe */
    include "classes/produtos.class.php";
    $classeProdutos = new produtos();

    include "classes/adm.class.php";
    $classeAdm = new adm();
    
    ?>

    <title>Configurações - adm - Oscar Jóias</title>

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

    <link rel="stylesheet" href="css/adm_configuracoes.css">
    <script src="plentz-jquery-maskmoney-cdbeeac/src/jquery.maskMoney.js" type="text/javascript"></script>

    <script>

        function mudarExemplosPreco(porcentagem){

            var hiddenSinal = $("#hiddenSinal").val();

            if(porcentagem < 100){

                var alteraStringPorcentagem = "0."+porcentagem.substr(1, 2);

            }else{

                var alteraStringPorcentagem = "1";

            }

            var porcentagemCorreta = parseFloat(alteraStringPorcentagem);

            if(hiddenSinal == "mais"){

              var soma100 = (100 * porcentagemCorreta) + 100;
              var soma500 = (500 * porcentagemCorreta) + 500;
              var soma1000 = (1000 * porcentagemCorreta) + 1000;
              var soma2000 = (2000 * porcentagemCorreta) + 2000;

            }else{

              var soma100 = (100 * porcentagemCorreta) - 100;
              var soma500 = (500 * porcentagemCorreta) - 500;
              var soma1000 = (1000 * porcentagemCorreta) - 1000;
              var soma2000 = (2000 * porcentagemCorreta) - 2000;

              soma100 = Math.abs(soma100);
              soma500 = Math.abs(soma500);
              soma1000 = Math.abs(soma1000);
              soma2000 = Math.abs(soma2000);

            }

            $("#amostra100").text("R$"+soma100+",00");
            $("#amostra500").text("R$"+soma500+",00");
            $("#amostra1000").text("R$"+soma1000+",00");
            $("#amostra2000").text("R$"+soma2000+",00");

        }

        function alterarSinalPorcentagem(sinal){

            if(sinal == "menos"){

                $("#amostra100").addClass("text-danger");
                $("#amostra500").addClass("text-danger");
                $("#amostra1000").addClass("text-danger");
                $("#amostra2000").addClass("text-danger");
                $("#selectSinal").addClass("btn-danger");
                $("#selectSinal").removeClass("btn-success");
                $("#hiddenSinal").val("menos");
                $("#campoPorcentagem").val("");

                $("#amostra100").text("R$100,00");
                $("#amostra500").text("R$500,00");
                $("#amostra1000").text("R$1000,00");
                $("#amostra2000").text("R$2000,00");

            }else{

                $("#amostra100").removeClass("text-danger");
                $("#amostra500").removeClass("text-danger");
                $("#amostra1000").removeClass("text-danger");
                $("#amostra2000").removeClass("text-danger");
                $("#selectSinal").removeClass("btn-danger");
                $("#selectSinal").addClass("btn-success");
                $("#hiddenSinal").val("mais");
                $("#campoPorcentagem").val("");

                $("#amostra100").text("R$100,00");
                $("#amostra500").text("R$500,00");
                $("#amostra1000").text("R$1000,00");
                $("#amostra2000").text("R$2000,00");

            }

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

                      <img id="iconeMenu" class="float-start mt-1 me-3 d-block d-md-none" src="img/iconeMenu2.png" width="30px"><h1>Configurações</h1>

                    </div>

                </div>

                <script src="jsPartes/adm_menu_mobile.js"></script>

                <div class="row mt-3">

                    <div class="col text-secondary">

                        <h2>Ajuste de preços</h2>
                        <p>

                            Ajuste os preços dos produtos todos de uma vez. Selecione a porcentagem da alteração e o tipo do produto!

                        </p>

                    </div>

                </div>

                <div class="row mt-2">

                    <div class="col-7">

                        <form method="POST" action="php/adm_atualizar_preco_geral.php">

                            <!-- <input type="text" class="form-control" onchange="mudarExemplosPreco(this.value)"> -->

                            <div class="input-group mb-3">
                              <select id="selectSinal" class="btn btn-success" aria-expanded="false" onchange="alterarSinalPorcentagem(this.value)">
                                <option value="mais">+</option>
                                <option value="menos">-</option>
                              </select>
                              <input type="hidden" id="hiddenSinal" value="mais" name="sinal">
                              <span class="input-group-text">%</span>
                              <input type="text" id="campoPorcentagem" autocomplete="off" class="form-control" name="porcentagem" required>
                            </div>

                            <script>

                            $('#campoPorcentagem').keyup(function(){
                                var valor_bruto = $('#campoPorcentagem').val().replace(/[^\d]/g, '');
                                var valor = parseInt(0 + valor_bruto);
                                var novoValor = pad(valor, 3);
                                $('#campoPorcentagem').val(novoValor);

                                mudarExemplosPreco($('#campoPorcentagem').val())
                            });


                            $(document).ready(function() {
                                $('#campoPorcentagem').focus(function() { $(this).select(); } );
                            });

                            function pad (str, max) {
                              str = str.toString();
                              str = str.length < max ? pad("0" + str, max) : str; // zero à esquerda
                              str = str.length > max ? str.substr(0,max) : str; // máximo de caracteres
                              return str;
                            }

                            </script>

                            <p class="mt-3 text-secondary">
                              
                              <b>Exemplos:</b><br>
                              R$100,00 > <span id="amostra100">R$100,00</span><br>
                              R$500,00 > <span id="amostra500">R$500,00</span><br>
                              R$1000,00 > <span id="amostra1000">R$1000,00</span><br>
                              R$2000,00 > <span id="amostra2000">R$2000,00</span>
                            
                            </p>

                    </div>

                    <div class="col-5">

                          <select class="form-select" name="tipo" required>

                              <option disabled selected hidden value="">Tipo</option>
                              <option value="ouro">Ouro</option>
                              <option value="prata">Prata</option>

                          </select>

                          <button type="submit" onclick="if(window.confirm('Essa ação não poderá ser revertida! deseja continuar?')){}else{return false;}" class="btn btn-primary mt-3 form-control">AJUSTAR</button>

                        </form>

                    </div>

                </div>

                <div class="row mt-4">

                    <div class="col text-secondary">

                        <h2>Categorias</h2>
                        <p>Quando você adiciona uma categoria que ainda não existe ao cadastrar um novo produto, ela é criada automaticamente,
                        mas você pode gerenciá-las por aqui!
                        </p>

                    </div>

                </div>

                <div class="row mt-2">

                    <div class="col text-secondary text-end">

                        <span class="badge bg-primary rounded-pill" title="Produtos Cadastrados">Produtos cadastrados</span>

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col text-secondary">

                        <ul class="list-group">

                            <?php
                            
                            foreach($classeProdutos->retorna_categorias() as $arrCategoria){

                                $id_categoria = $arrCategoria["id"];
                            
                            ?>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              <?php echo $arrCategoria["nome"]; ?>
                              <div>

                                <span class="badge bg-primary rounded-pill" title="Produtos Cadastrados">
                                    <?php echo $classeProdutos->retorna_qtd_produtos_por_categoria($arrCategoria["id"]); ?>
                                </span>
                                <a href="php/apagar_categoria.php?id_categoria=<?php echo $id_categoria; ?>"><img src="img/remover.png" width="22px"></a>

                              </div>
                            </li>

                            <?php
                            
                            }
                            
                            ?>

                        </ul>

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col">

                        <form class="row g-3" method="POST" action="php/adm_adicionar_categoria.php">
                            <div class="col-auto">
                              <input type="text" class="form-control" placeholder="Categoria" pattern="[a-zA-ZÀ-ú0-9 ]+" maxlength="30" name="nome" required>
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">ADICIONAR</button>
                            </div>
                        </form>

                    </div>

                </div>

                <div class="row mt-5">

                    <div class="col text-secondary">

                        <h2>Slide</h2>
                        <p>Slide da página inicial</p>

                    </div>

                </div>

                <div class="row mt-2 mb-5">

                    <div class="col-12 col-sm-5 mb-4">

                        <p class="text-secondary">Essa é uma amostra de imagem com a resolução ideal para colocar no slide (1920 x 1280), clique para baixar!</p>

                        <img style="cursor: pointer;" onclick="window.open('img/slides/exemplo_slide_oscar_joias.zip')" src="img/slides/exemplo_slide_oscar_joias.jpg" width="100%">

                    </div>

                    <div class="col-12 col-sm-7">

                        <p class="text-secondary">Selecione a imagem ou o link e clique em "salvar". Para desativar link, deixe o campo em branco</p>

                        <?php
                        
                        foreach($classeAdm->retorna_slide_link() as $arrAdm){
                        
                        ?>

                        <small class="text-secondary">Slide 1</small>

                        <form enctype="multipart/form-data" class="row g-1" method="POST" action="php/atualizar_img_slide.php">
                            <div class="col-auto">
                              <input type="file" accept=".jpg, .jpeg" class="form-control" placeholder="Categoria" maxlength="30" name="img" required>
                              <input type="hidden" value="1" name="hiddenFoto">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">SALVAR</button>
                            </div>
                        </form>

                        <small class="text-secondary">Link 1</small>

                        <form class="row g-3" method="POST" action="php/adm_atualizar_link_slide.php">
                            <div class="col-auto">
                              <input type="text" value="<?php echo $arrAdm["link_slide_1"]; ?>" class="form-control" placeholder="Categoria" maxlength="30" name="link">
                              <input type="hidden" value="1" name="hiddenLink">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">SALVAR</button>
                            </div>
                        </form>

                        <small class="text-secondary">Slide 2</small>

                        <form enctype="multipart/form-data" class="row g-1" method="POST" action="php/atualizar_img_slide.php">
                            <div class="col-auto">
                              <input type="file" accept=".jpg, .jpeg" class="form-control" placeholder="Categoria" maxlength="30" name="img" required>
                              <input type="hidden" value="2" name="hiddenFoto">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">SALVAR</button>
                            </div>
                        </form>

                        <small class="text-secondary">Link 2</small>

                        <form class="row g-3" method="POST" action="php/adm_atualizar_link_slide.php">
                            <div class="col-auto">
                              <input type="text" value="<?php echo $arrAdm["link_slide_2"]; ?>" class="form-control" placeholder="Categoria" maxlength="30" name="link">
                              <input type="hidden" value="2" name="hiddenLink">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">SALVAR</button>
                            </div>
                        </form>

                        <small class="text-secondary">Slide 3</small>

                        <form enctype="multipart/form-data" class="row g-1" method="POST" action="php/atualizar_img_slide.php">
                            <div class="col-auto">
                              <input type="file" accept=".jpg, .jpeg" class="form-control" placeholder="Categoria" maxlength="30" name="img" required>
                              <input type="hidden" value="3" name="hiddenFoto">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">SALVAR</button>
                            </div>
                        </form>

                        <small class="text-secondary">Link 3</small>

                        <form class="row g-3" method="POST" action="php/adm_atualizar_link_slide.php">
                            <div class="col-auto">
                              <input type="text" value="<?php echo $arrAdm["link_slide_3"]; ?>" class="form-control" placeholder="Categoria" maxlength="30" name="link">
                              <input type="hidden" value="3" name="hiddenLink">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">SALVAR</button>
                            </div>
                        </form>

                        <?php
                        
                        }
                        
                        ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>