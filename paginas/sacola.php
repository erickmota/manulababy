<!DOCTYPE html>
<html>

<head>

    <title>Sacola - Manulá Baby</title>

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

    <link rel="stylesheet" href="css/sacola.css">

    <script>

    function apagar_produto(id_sacola){

        window.location="php/apagarProdutoCarrinho.php?id_sacola="+id_sacola;

    }

    </script>

</head>

<body>

    <div class="container-fluid">

        <?php
        
        include "phpPartes/cabecalho.php"
        
        ?>

        <div class="row justify-content-center">

            <div class="col-lg-10 pt-3 pb-3">

                <h1 class="fs-2 fw-light text-secondary">Minha Sacola</h1>

            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-lg-10" id="fundoTituloProdutos">

                <span class="fs-5 text-white">PRODUTOS</span>

            </div>

        </div>

        <?php

        $i_preco = 0;
        $preco_total = 0;
        $pesoTotal = 0;
        $larguraTotal = 0;
        $alturaInd = [];
        $comprimentoInd = [];
        $dias_entrega_ind = [];

        if($classeCompra->retorna_dados_carrinho() == false){

        ?>

        <div class="row justify-content-center">

            <div class="col-lg-10 border-start border-end border-bottom">

                <div class="row mt-5 mb-5">

                    <div class="col text-center text-secondary">

                        SACOLA VAZIA

                    </div>

                </div>

            </div>

        </div>

        <?php

        }else{
        
        foreach($classeCompra->retorna_dados_carrinho() as $arrCompra){

            $classeCompra->comparar_qtd_carrinho_qtd_produto($arrCompra["id_produto"]);
            $nome_variacao1 = $classeCompra->retorna_dados_variacao_complementar_por_id($arrCompra["id_variacao_produto"]);
            $nome_variacao2 = $classeCompra->retorna_dados_variacao_complementar_por_id($arrCompra["id_variacao_produto2"]);
            $nome_variacao3 = $classeCompra->retorna_dados_variacao_complementar_por_id($arrCompra["id_variacao_produto3"]);
        
        ?>

        <div class="row justify-content-center">

            <div class="col-lg-10 border-start border-end border-bottom">

                <div class="row mb-3">

                    <div class="col">

                        <div class="row">

                            <div id="espacoImgProduto" class="col-md-6 col-lg-3 mt-3">

                                <img id="imgProduto" src="img/produtos/<?php echo $arrCompra["foto"] ?>" width="100%">

                            </div>

                            <div class="col-md-6 col-lg-5 mt-3">

                                <h2 class="fs-5 text-secondary"><?php echo $arrCompra["nome_produto"] ?></h2>

                                <ul class="fw-light text-secondary">

                                    <li><b>Tamanho:</b> <?php echo $arrCompra["tamanho"]; ?></li>
                                    <li class="<?php if($arrCompra["variacao_complementar"] == "SE"){ echo "d-none";} ?>"><b><?php echo $nome_variacao1; ?>:</b> <?php echo $arrCompra["variacao_complementar"]; ?></li>
                                    <li class="<?php if($arrCompra["variacao_complementar2"] == "SE"){ echo "d-none";} ?>"><b><?php echo $nome_variacao2; ?>:</b> <?php echo $arrCompra["variacao_complementar2"]; ?></li>
                                    <li class="<?php if($arrCompra["variacao_complementar3"] == "SE"){ echo "d-none";} ?>"><b><?php echo $nome_variacao3; ?>:</b> <?php echo $arrCompra["variacao_complementar3"]; ?></li>

                                </ul>

                            </div>

                            <div id="espacoImgProduto" class="col-md-6 col-lg-2 mt-3">

                                <div class="text-secondary" id="apagarProduto">

                                    <img onclick="apagar_produto(<?php echo $arrCompra['id_sacola']; ?>)" src="img/lixeira.png" id="iconeApagar" width="17px">

                                </div>

                                <?php
                        
                                if($arrCompra["qtd_estoque"] < 1 || $arrCompra["estado"] != "publicado-disponivel"){

                                    $prodIndisponivel = "sim";
                                
                                ?>

                                <span class="text-black-50">Produto indisponível</span>

                                <script>

                                    $(document).ready(function(){

                                        $("#botaoFinalizar").text("Remova o item indisponível antes de prosseguir");
                                        $("#botaoFinalizar").addClass("bg-secondary");
                                        $("#botaoFinalizar").attr("disabled", "disabled");

                                    })

                                </script>

                                <?php
                        
                                }else{
                                
                                ?>

                                <select class="mt-2 text-secondary" id="selectQtd" onchange="mudar_qtd_produto(this.value, <?php echo $arrCompra['id_sacola']; ?>)">

                                    <?php
                                    
                                    $i_select = 1;

                                    while($i_select <= $arrCompra["qtd_estoque"]){
                                    
                                    ?>

                                        <option value="<?php echo $i_select; ?>" <?php if($arrCompra["qtd_pedido"] == $i_select){ echo "selected"; } ?>>Qtd: <?php echo $i_select; ?></option>

                                    <?php

                                        $i_select++;
                                    
                                    }
                                    
                                    ?>

                                </select>

                                <?php
                        
                                }
                                
                                ?>

                            </div>

                            <?php
                            
                            $precoProdutoIndividual[$i_preco] = $arrCompra["qtd_pedido"] * $arrCompra["preco"];
                            
                            ?>

                            <div id="espacoImgProduto" class="col-md-6 col-lg-2 fs-4 mt-3 text-secondary">

                                R$<?php echo number_format($precoProdutoIndividual[$i_preco], 2, ",", "."); ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <?php

        $preco_total += $precoProdutoIndividual[$i_preco];
        
        $i_preco++;

        /* Fazendo o calculo do frete */

        $pesoTotal += $arrCompra["peso"] * $arrCompra["qtd_pedido"];
        $larguraTotal += $arrCompra["largura"] * $arrCompra["qtd_pedido"];

        array_push($alturaInd, $arrCompra["altura"]);
        array_push($comprimentoInd, $arrCompra["comprimento"]);
        array_push($dias_entrega_ind, $arrCompra["dias_entrega"]);

        $maiorAltura =  max($alturaInd);
        $maiorComprimento =  max($comprimentoInd);
        $maiorDiaEntrega = max($dias_entrega_ind);

        }

        }
        
        ?>

        <?php
                
        include "phpPartes/rodape.php";
        
        ?>

    </div>

</body>

</html>