<!DOCTYPE html>
<html>

<head>

    <?php

    $explode = explode("/", $_GET["url"]);
    
    /* Iniciando classe */
    /* include "classes/produtos.class.php";
    $classeProdutos = new produtos(); */

    include "classes/adm.class.php";
    $classeAdm = new adm();
    
    ?>

    <title>Configurações - adm - Manulá Baby</title>

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

                      <img id="iconeMenu" style="cursor: pointer;" class="float-start mt-1 me-3 d-block d-md-none" src="img/menu.png" width="30px"><h1>Configurações</h1>

                    </div>

                </div>

                <script src="jsPartes/adm_menu_mobile.js"></script>

                <div class="row mt-3">

                    <div class="col text-secondary">

                        <h2>Promoções</h2>
                        <p>

                            Gerencie as promoções disponíveis no site

                        </p>

                    </div>

                </div>

                <div class="row mt-2">

                    <div class="col-12 col-md-6">

                        <h5 class="text-secondary">Nova promoção</h5>

                        <div class="row">

                            <div class="col">

                                <form method="POST" action="php/adm_cadastrar_promocao.php">

                                <input type="text" maxlength="25" placeholder="Nome" class="form-control" name="nome" required>

                            </div>

                        </div>

                        <div class="row mt-3">

                            <div class="col">

                                <input type="number" placeholder="Quantidade produtos" class="form-control" name="quantidade" required>
                                <div class="form-text">Quantidade de produtos necessários para validar a promoção, no carrinho.</div>

                            </div>

                            <div class="col">

                              <input type="number" placeholder="Preço promoção" step=".01" class="form-control" name="preco" required>
                              <div class="form-text">Quando o cliente validar a promoção, o pedido ficará esse preço.</div>

                            </div>

                        </div>

                        <div class="row mt-3">

                            <div class="col">

                                <textarea class="form-control" rows="3" placeholder="Descrição" maxlength="80" name="descricao" required></textarea>
                                <div class="form-text">Crie uma descrição para sua promoção. Obs: NÃO é necessário informar nesse campo, formas de validação, como,
                                  quantidade e preço, pois o sistema mostrará essas informação automaticamente.
                                </div>

                            </div>

                        </div>

                        <div class="row mt-3">

                          <div class="col">

                              <button type="submit" class="form-control btn btn-success">CADASTRAR</button>

                              </form>

                          </div>

                      </div>

                    </div>

                    <div class="col-12 col-md-6">

                        <h5 class="text-secondary d-none d-md-block">Minhas promoções</h5>
                        <h5 class="text-secondary d-block d-md-none mt-3">Minhas promoções</h5>

                        <small class="text-secondary">Clique sobre alguma promoção, para editar ou incluir produtos</small>

                        <?php
                        
                        $funcRetornaListaPromocoes = $classeProdutos->retorna_lista_promocoes();

                        if($funcRetornaListaPromocoes == false){
                        
                        ?>

                        <p class="text-center text-secondary mt-4 pt-1 pb-1 border-start border-end">NENHUMA PROMOÇÃO CADASTRADA</p>

                        <?php
                        
                        }else{
                        
                        ?>

                        <ol class="list-group list-group-flush" id="corpoListaPromocoes">

                            <?php
                            
                            foreach($funcRetornaListaPromocoes as $arrPromocoes){
                            
                            ?>

                            <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-start" data-bs-toggle="modal" data-bs-target="#modalPromocao<?php echo $arrPromocoes["id"] ?>">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold"><?php echo $arrPromocoes["nome"] ?></div>
                                <?php echo $arrPromocoes["qtd_pecas"] ?> Produto(s) - R$<?php echo number_format($arrPromocoes["preco"], 2, ",", "") ?>
                              </div>
                            </li>

                            <!-- Modal -->
                            <div class="modal fade" id="modalPromocao<?php echo $arrPromocoes["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel"><?php echo $arrPromocoes["nome"] ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">

                                      <h5 class="text-secondary">Editar promoção</h5>

                                      <img src="img/remover.png" onclick="if(window.confirm('Tem certeza que deseja excluir essa promoção?')){window.location='php/adm_remover_promocao.php?id=<?php echo $arrPromocoes["id"] ?>'}else{}" id="iconeRemoverPromocao">

                                      <div class="row mt-3">

                                        <div class="col">

                                            <form method="POST" action="php/adm_atualizar_promocao.php">
            
                                            <label class="form-label">Nome</label>
                                            <input type="text" maxlength="20" placeholder="Nome" class="form-control" name="nome" value="<?php echo $arrPromocoes["nome"] ?>">
                                            <input type="hidden" name="id" value="<?php echo $arrPromocoes["id"] ?>">
            
                                        </div>
            
                                      </div>
            
                                      <div class="row mt-3">
              
                                          <div class="col">
              
                                              <label class="form-label">Quantidade produtos</label>
                                              <input type="number" placeholder="Quantidade produtos" class="form-control" name="quantidade" value="<?php echo $arrPromocoes["qtd_pecas"] ?>">
              
                                          </div>
              
                                          <div class="col">

                                            <label class="form-label">Preço promoção</label>
                                            <input type="number" placeholder="Preço promoção" class="form-control" step=".01" name="preco" value="<?php echo $arrPromocoes["preco"] ?>">
              
                                          </div>
              
                                      </div>
            
                                      <div class="row mt-3">
              
                                          <div class="col">
              
                                              <label class="form-label">Descrição</label>
                                              <textarea class="form-control" rows="3" placeholder="Descrição" name="descricao"><?php echo $arrPromocoes["descricao"] ?></textarea>
              
                                          </div>
              
                                      </div>
            
                                      <div class="row mt-3">
              
                                        <div class="col">
              
                                            <button type="submit" class="form-control btn btn-success">ATUALIZAR</button>

                                            </form>
              
                                        </div>
              
                                      </div>

                                      <h5 class="text-secondary mt-3" id="nomeAssociados">Produtos associados</h5>

                                      <div id="espacoProdutosAssociados<?php echo $arrPromocoes["id"] ?>"></div>

                                      <label class="text-secondary mt-4"><span id="maisNomeAssociar" class="me-2">+</span> Associar produtos</label>
                                      <input autocomplete="off" id="campoBuscaProdutoPromocao<?php echo $arrPromocoes["id"] ?>" type="text" class="form-control" placeholder="Buscar produtos">
                                      <div class="form-text">Digite o nome do produto, e clique em INCLUIR para associar um novo produto a promoção.</div>

                                      <div id="espacoProdutosBusca<?php echo $arrPromocoes["id"] ?>">
                                    
                                          
                                    
                                      </div>
                                    
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                  </div>

                                  <script>

                                    function buscar_produto_promocao<?php echo $arrPromocoes["id"] ?>(nome, id_promocao) {
        
                                      $.ajax({
              
                                          type: "POST",
                                          dataType: "html",
              
                                          url: "ajax/adm_mostrar_produtos_configuracao.php",
              
                                          beforeSend: function () {
              
                                              $("#espacoProdutosBusca<?php echo $arrPromocoes["id"] ?>").html("<p class='text-center mt-3'><img style='width:80px' src='img/carregando3.gif'></p>");
              
                                          },
              
                                          data: {nome: nome, id_promocao: id_promocao},
              
                                          success: function (msg) {
              
                                              $("#espacoProdutosBusca<?php echo $arrPromocoes["id"] ?>").html(msg);
              
                                          }
              
                                      });
              
                                    }

                                    $("#campoBuscaProdutoPromocao<?php echo $arrPromocoes["id"] ?>").keyup(function(event){

                                        var nomeProduto = document.getElementById("campoBuscaProdutoPromocao<?php echo $arrPromocoes["id"] ?>").value;

                                        buscar_produto_promocao<?php echo $arrPromocoes["id"] ?>(nomeProduto, <?php echo $arrPromocoes["id"] ?>);

                                    })

                                  </script>

                                  <script>

                                  function mostrar_produtos_listados<?php echo $arrPromocoes["id"] ?>(id_promocao) {

                                      $.ajax({

                                          type: "POST",
                                          dataType: "html",

                                          url: "ajax/adm_lista_produtos_associados.php",

                                          beforeSend: function () {
              
                                              $("#espacoProdutosAssociados<?php echo $arrPromocoes["id"] ?>").html("<p class='text-center mt-3'><img style='width:80px' src='img/carregando3.gif'></p>");

                                          },

                                          data: {id_promocao: id_promocao},

                                          success: function (msg) {

                                              $("#espacoProdutosAssociados<?php echo $arrPromocoes["id"] ?>").html(msg);

                                          }

                                      });

                                  }

                                  function incluir_produto_promocao<?php echo $arrPromocoes["id"] ?>(id_promocao, id_produto) {

                                      $.ajax({

                                          type: "POST",
                                          dataType: "html",

                                          url: "php/adm_adicionar_produto_promocao.php",

                                          data: {id_promocao: id_promocao, id_produto: id_produto},

                                          success: function (msg) {

                                              mostrar_produtos_listados<?php echo $arrPromocoes["id"] ?>(<?php echo $arrPromocoes["id"] ?>);

                                          }

                                      });

                                  }

                                  function apagar_produto_promocao<?php echo $arrPromocoes["id"] ?>(id_promocao, id_produto) {

                                      $.ajax({

                                          type: "POST",
                                          dataType: "html",

                                          url: "php/adm_apagar_produto_promocao.php",

                                          data: {id_promocao: id_promocao, id_produto: id_produto},

                                          success: function (msg) {

                                              mostrar_produtos_listados<?php echo $arrPromocoes["id"] ?>(<?php echo $arrPromocoes["id"] ?>);

                                          }

                                      });

                                  }

                                  function chamarAjax<?php echo $arrPromocoes["id"] ?>(id_produto, id_promocao){

                                      incluir_produto_promocao<?php echo $arrPromocoes["id"] ?>(id_promocao, id_produto);

                                  }

                                  function chamarAjaxApagar<?php echo $arrPromocoes["id"] ?>(id_produto, id_promocao){

                                      apagar_produto_promocao<?php echo $arrPromocoes["id"] ?>(id_promocao, id_produto);

                                  }

                                  $(document).ready(function(){
    
                                      mostrar_produtos_listados<?php echo $arrPromocoes["id"] ?>(<?php echo $arrPromocoes["id"] ?>);

                                  });

                                  </script>

                                </div>
                              </div>
                            </div>

                            <?php
                            
                            }
                            
                            ?>

                        </ol>

                        <?php
                        
                        }
                        
                        ?>

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