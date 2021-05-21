<!DOCTYPE html>
<html>

<head>

<?php

    $explode = explode("/", $_GET["url"]);

    /* Verificar existencia usuário */

    if(!isset($classeClientes)){

        include "classes/clientes.class.php";
        $classeClientes = new clientes();

    }

    if(isset($_COOKIE["iu_mb"]) && isset($_COOKIE["eu_mb"]) && isset($_COOKIE["su_mb"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_mb"], $_COOKIE["eu_mb"], $_COOKIE["su_mb"]) == true){



    }else{

        die("<script>window.location='php/deslogar.php'</script>");

    }

    /* //Verificar existencia usuário */
    
    /* Iniciando classe */
    include "classes/compra.class.php";
    $classeCompra = new compra();

    $idCliente = $classeCompra->idCliente = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($_COOKIE["iu_mb"])));

    $classeCompra->idCliente = $idCliente;

    if(isset($_GET["promo"])){

        $prmoAtiva = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_GET["promo"]));

        $nomePromoAtiva = $classeCompra->retorna_nome_promo($prmoAtiva);

    }else{

        $prmoAtiva = "SE";

    }
    
    ?>

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
    <script src="jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>

    <script>

        function apagar_produto(id_sacola){

            window.location="php/apagarProdutoCarrinho.php?id_sacola="+id_sacola;

        }

        function mudar_qtd_produto(qtd, id_sacola){

            window.location="php/mudarQtdProdutoCarrinho.php?id_sacola="+id_sacola+"&nova_qtd="+qtd;

        }

        function ativar_promo(id_promo){

            window.location="sacola?promo="+id_promo;

        }

        /* Mask */
        $(document).ready(function(){

            $('.maskCep').mask('00000-000');

        });

        var options =  {
            onKeyPress: function(cep, e, field, options) {
                var masks = ['000.000.000-00#', '00.000.000/0000-00'];
                var mask = (cep.length>14) ? masks[1] : masks[0];
                $('.maskCpf').mask(mask, options);
        }};

        $('.maskCpf').mask('000.000.000-00#', options);

        var options2 =  {
            onKeyPress: function(cep, e, field, options) {
                var masks = ['(00) 0000-0000#', '(00) 00000-0000'];
                var mask = (cep.length>14) ? masks[1] : masks[0];
                $('.maskCelular').mask(mask, options);
        }};

        $('.maskCelular').mask('(00) 0000-0000#', options2);

        function mudar_qtd_produto(qtd, id_sacola){

            window.location="php/mudarQtdProdutoCarrinho.php?id_sacola="+id_sacola+"&nova_qtd="+qtd;

        }

        function apagar_produto(id_sacola){

            window.location="php/apagarProdutoCarrinho.php?id_sacola="+id_sacola;

        }

        function verificar_campo_frete(){

            var campoFrete = document.getElementById("inputCalculaFrete");
            var botaoFinalizar = document.getElementById("botaoFinalizar");
            var selectFrete = document.getElementById("selectFrete");

            if(campoFrete.value == ""){

                campoFrete.focus();
                botaoFinalizar.classList.add("bg-danger");
                botaoFinalizar.innerHTML = "Calcule o frete";

                setTimeout(function(){ 
                    botaoFinalizar.classList.remove("bg-danger");
                    botaoFinalizar.innerHTML = "FINALIZAR COMPRA";
                }, 3000);

            }else{

                if(selectFrete.value == "vazio"){

                    selectFrete.classList.add("border");
                    selectFrete.classList.add("border-danger");
                    botaoFinalizar.classList.add("bg-danger");
                    botaoFinalizar.innerHTML = "Selecione o frete";

                    setTimeout(function(){ 
                        selectFrete.classList.remove("border");
                        selectFrete.classList.remove("border-danger");
                        botaoFinalizar.classList.remove("bg-danger");
                        botaoFinalizar.innerHTML = "FINALIZAR COMPRA";
                    }, 3000);

                }else{

                    var campoCidade = document.getElementById("inputCidade");
                    var campoEstado = document.getElementById("inputEstado");
                    var campoBairro = document.getElementById("inputBairro");
                    var campoRua = document.getElementById("inputEndereco");
                    var campoNumero = document.getElementById("inputNumero");
                    var campoDetalhes = document.getElementById("detalhesAdicionais");
                    var campoCpf = document.getElementById("cpf");
                    var campoCelular = document.getElementById("celular");

                    if(campoCidade.value == "" || campoEstado == "" || campoBairro.value == "" || campoRua.value == "" || campoNumero.value == "" || campoCpf.value == "" || campoCelular.value == ""){

                        botaoFinalizar.classList.add("bg-danger");
                        botaoFinalizar.innerHTML = "Preencha os campos *";
                        campoBairro.classList.add("border");
                        campoBairro.classList.add("border-danger");
                        campoRua.classList.add("border");
                        campoRua.classList.add("border-danger");
                        campoNumero.classList.add("border");
                        campoNumero.classList.add("border-danger");
                        campoCidade.classList.add("border");
                        campoCidade.classList.add("border-danger");
                        campoEstado.classList.add("border");
                        campoEstado.classList.add("border-danger");
                        campoCpf.classList.add("border");
                        campoCpf.classList.add("border-danger");
                        campoCelular.classList.add("border");
                        campoCelular.classList.add("border-danger");

                        setTimeout(function(){ 
                            botaoFinalizar.classList.remove("bg-danger");
                            botaoFinalizar.innerHTML = "FINALIZAR COMPRA";
                            campoBairro.classList.remove("border");
                            campoBairro.classList.remove("border-danger");
                            campoRua.classList.remove("border");
                            campoRua.classList.remove("border-danger");
                            campoNumero.classList.remove("border");
                            campoNumero.classList.remove("border-danger");
                            campoCidade.classList.remove("border");
                            campoCidade.classList.remove("border-danger");
                            campoEstado.classList.remove("border");
                            campoEstado.classList.remove("border-danger");
                            campoCpf.classList.remove("border");
                            campoCpf.classList.remove("border-danger");
                            campoCelular.classList.remove("border");
                            campoCelular.classList.remove("border-danger");
                        }, 3000);

                    }else{

                        var hiidenCodigoPS = document.getElementById('hiddenCodigo').value;

                        efetua_pedido();

                        abrir_pagseguro(hiidenCodigoPS);

                    }

                }

            }

        }

        function abrir_campo_endereco(){

            $(function(){

                $( "#campoEndereco" ).slideDown(300);

            })

        }

    </script>

</head>

<body>

    <div class="container-fluid">

        <?php
        
        include "phpPartes/cabecalho.php"
        
        ?>

        <?php
        
        if($prmoAtiva != "SE"){

            $metodoVerificaProdutoPromo = $classeCompra->verificar_produtos_promo($prmoAtiva);

        }
        
        ?>

        <div class="row justify-content-center mt-3">

            <div class="col-lg-10 pt-3 pb-3">

                <h1 class="fs-2 fw-light text-secondary">Minha Sacola</h1>

            </div>

        </div>

        <?php
        
        if(isset($metodoVerificaProdutoPromo) && $metodoVerificaProdutoPromo[0] == "erro qtd"){
        
        ?>

        <div class="row justify-content-center pb-4">

            <div class="col-lg-10 border border-danger p-4 text-danger" id="boxMsgPromo">

                * Para que sua promoção seja válida, você precisa deixar todos os itens que pertencem a promoção,
                com quantidade "1" na sacola.<br>
                * Se quiser comprar mais de uma unidade do mesmo produto, adicione o mesmo, duas vezes na sacola.

            </div>

        </div>

        <?php
        
        }else if(isset($metodoVerificaProdutoPromo) && $metodoVerificaProdutoPromo == "Quantidade de produtos inválida"){

            $nomeComTraco = str_replace(" ", "-", $nomePromoAtiva);
            $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
            $trataInjection = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $transformarEmMinuscula);
            $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
            $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
            $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
            $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
            $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
            $str6 = preg_replace('/[ç]/ui', 'c', $str5);
        
        ?>

        <div class="row justify-content-center pb-4">

            <div class="col-lg-10 border border-danger p-4 text-danger" id="boxMsgPromo">

                * Oops, adicione a quantidade de produto adequada para liberar a promoção!<br>
                * Leia a descrição e quantidade correta de produtos para essa promoção, <a class="text-decoration-none" target="_blank" href="promocao/<?php echo $str6 ?>">clicando aqui</a>

            </div>

        </div>

        <?php
        
        }
        
        if($prmoAtiva != "SE" && $metodoVerificaProdutoPromo != "Quantidade de produtos inválida" && $metodoVerificaProdutoPromo[0] != "erro qtd"){
        
        ?>

        <div class="row justify-content-center pb-4">

            <div class="col-lg-10 border border-success p-4 text-success" id="boxMsgPromo">

                * <b>Oba!</b> A promoção foi habilitada com sucesso, e já calculamos o valor total da sua sacola :)

            </div>

        </div>

        <?php
        
        }
        
        ?>

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

            $funcVerificarQtd = $classeCompra->verificar_limite_qtd_produtos_sacola($arrCompra["id_produto"]);

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

                                <div class="row">

                                    <div class="col">

                                        <h2 class="fs-5 text-secondary"><?php echo $arrCompra["nome_produto"] ?></h2>

                                    </div>

                                </div>

                                <div class="row justify-content-center">

                                    <div class="col-5 col-md-5">

                                        <div class="boxTamanho text-center mt-2 <?php echo $verTamanho[0] ?>">
    
                                            <span class="fs-4 text-uppercase"><?php echo $arrCompra["tamanho"]; ?></span>

                                        </div>
    
                                    </div>

                                    <div class="col-5 col-md-7">
    
                                        <ul class="fw-light text-secondary">

                                            <li class="<?php if($arrCompra["variacao_complementar"] == "SE"){ echo "d-none";} ?>"><b><?php echo $nome_variacao1; ?>:</b> <?php echo $arrCompra["variacao_complementar"]; ?></li>
                                            <li class="<?php if($arrCompra["variacao_complementar2"] == "SE"){ echo "d-none";} ?>"><b><?php echo $nome_variacao2; ?>:</b> <?php echo $arrCompra["variacao_complementar2"]; ?></li>
                                            <li class="<?php if($arrCompra["variacao_complementar3"] == "SE"){ echo "d-none";} ?>"><b><?php echo $nome_variacao3; ?>:</b> <?php echo $arrCompra["variacao_complementar3"]; ?></li>
    
                                        </ul>
    
                                    </div>

                                </div>

                                <?php
                                
                                if($funcVerificarQtd[0] == false){

                                $variavelBloqueio = true;
                                
                                ?>

                                <div class="row justify-content-center">

                                    <div class="col">

                                        <div class="alert alert-danger" role="alert">

                                            Desculpe, esse produto possui <?php echo $funcVerificarQtd[1] ?> unidades em estoque

                                        </div>

                                    </div>

                                </div>

                                <?php
                                
                                }
                                
                                ?>

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

                                <select class="mt-2 text-secondary <?php
                                
                                if(isset($metodoVerificaProdutoPromo) && $metodoVerificaProdutoPromo[0] == "erro qtd"){

                                    echo "border border-danger";

                                }
                                
                                ?>" id="selectQtd" onchange="mudar_qtd_produto(this.value, <?php echo $arrCompra['id_sacola']; ?>)">

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

                            <div id="espacoImgProduto" class="col-md-6 col-lg-2 fs-2 mt-3 text-secondary">

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

        if($prmoAtiva != "SE" && $metodoVerificaProdutoPromo != "Quantidade de produtos inválida" && $metodoVerificaProdutoPromo[0] != "erro qtd"){

            $preco_total_antigo = $preco_total;

            $preco_promocao_menos = $metodoVerificaProdutoPromo[0];
            $preco_promocao = $metodoVerificaProdutoPromo[1];

            $preco_total = ($preco_total - $preco_promocao_menos) + $preco_promocao;

        }
        
        ?>

        <?php
        
        if($classeCompra->retornar_promocoes_disponiveis() != null){
        
        ?>

        <div class="row justify-content-center mt-3">

            <div class="col-lg-10 text-end">

                <p class="text-secondary">Você possui produtos com promoções na sacola. Deseja utilizar alguma promoção?</p>

                <select id="selecaoPromo" class="text-secondary" onchange="ativar_promo(this.value)">

                    <option hidden disbled>Selecionar promoção</option>

                    <?php
                    
                    foreach($classeCompra->retornar_promocoes_disponiveis() as $arrOpPromo){
                    
                    ?>

                    <option value="<?php echo $arrOpPromo ?>" <?php
                    
                    if($prmoAtiva == $arrOpPromo){

                        echo "selected";

                    }
                    
                    ?>><?php echo $classeCompra->retorna_nome_promo($arrOpPromo) ?></option>

                    <?php
                    
                    }
                    
                    ?>

                </select>

            </div>

        </div>

        <?php
        
        }
        
        ?>

        <div class="row justify-content-center mt-3">

            <div class="col-lg-10">

                <div class="row">

                    <div class="col-5">

                        <button onclick="window.location='loja'" type="button" class="btn btn-secondary" id="botaoComprarMais">Comprar mais</button>

                    </div>

                    <div class="col-7 text-end">

                        <a href="php/apagarProdutoCarrinho.php?limpar=sim" class="text-secondary me-5 d-none d-md-inline">Esvaziar Sacola</a>

                        <?php
                        
                        if(isset($preco_total_antigo)){

                            $valor_desconto = $preco_total_antigo - $preco_total;
                        
                        ?>

                        <span class="text-secondary me-2">Desconto de</span><span class="text-info">R$<?php echo number_format($valor_desconto, 2, ",", ".") ?></span><br>

                        <?php
                        
                        }
                        
                        ?>

                        <span class="text-secondary me-2">Total</span><span class="fs-4">R$<?php echo number_format($preco_total, 2, ",", ".") ?></span>

                        <div id="espacoPagseguro" class="text-secondary">Total c/frete R$<?php echo number_format($preco_total, 2, ",", ".") ?></div>

                        <div id="espacoNovaCompra"></div>

                    </div>

                </div>

            </div>

        </div>

        <div class="row justify-content-center mt-5">

            <div class="col-lg-10">

                <div class="row justify-content-between">

                    <div class="col-md-5">

                        <!-- Calculo do frete -->
                        <div class="row justify-content-center">
        
                            <div class="col">
        
                                <label class="text-secondary" for="inputCalculaFrete">Digite seu CEP e pressione enter</label><br>
                                <input onkeyup="abrir_campo_endereco()" type="text" id="inputCalculaFrete" autocomplete="off" class="maskCep" <?php if($classeCompra->retorna_dados_carrinho() == false){ echo "disabled"; } ?>>
        
                            </div>
        
                        </div>

                        <div class="row justify-content-center mt-4" id="areaFrete">

                            <!-- <div class="col text-center">

                                <select id="selectFrete" class="text-secondary">

                                    <option disabled selected hidden>Selecione o tipo de entrega</option>
                                    <option>Sedex: R$34,50 - 3 dias para entrega</option>
                                    <option>PAC: R$34,50 - 3 dias para entrega</option>

                                </select>

                                <br><br><b>Sedex:</b> R$34,50 - 3 dias para entrega<br>
                                <b>PAC:</b> R$34,50 - 3 dias para entrega

                            </div> -->

                        </div>

                        <?php
                        
                        if(isset($valor_desconto)){

                            $desconto_frete = $valor_desconto;

                        }else{

                            $desconto_frete = 0.00;

                        }
                        
                        ?>

                        <script type="text/javascript">
                                                                                
                            function calcular_frete(cep, peso, altura, largura, comprimento, dias_entrega, preco_total_sacola, desconto_frete) {
        
                                $.ajax({
        
                                    type: "POST",
                                    dataType: "html",
        
                                    url: "ajax/freteSacola.php",
        
                                    beforeSend: function () {
        
                                        $("#areaFrete").html("<img class='imgLoading' src='img/carregando2.gif'>");
        
                                    },
        
                                    data: {cep: cep, peso: peso, altura: altura, largura: largura, comprimento: comprimento, dias_entrega: dias_entrega, preco_total_sacola: preco_total_sacola, desconto_frete: desconto_frete},
        
                                    success: function (msg) {
        
                                        $("#areaFrete").html(msg);
                                        $("#areaFrete").removeClass("d-none");
        
                                        /* setTimeout(function() {
                                            $("#areaIconeOk").html("");
                                            $("#textoAnotacoesRapidas").removeClass("is-valid");;
                                        }, 3000); */
        
                                    }
        
                                });
        
                            }
        
                            $("#inputCalculaFrete").keypress(function(event){
        
                                var cep = document.getElementById("inputCalculaFrete").value;
                                var campoCep = document.getElementById("areaFrete");

                                var peso = "<?php echo $pesoTotal; ?>";
                                var altura = "<?php echo $maiorAltura; ?>";
                                var largura = "<?php echo $larguraTotal; ?>";
                                var comprimento = "<?php echo $maiorComprimento; ?>";
                                var dias_entrega = "<?php echo $maiorDiaEntrega; ?>";
                                var preco_total_sacola = "<?php echo $preco_total; ?>";
                                var desconto_frete = "<?php echo $desconto_frete; ?>";

                                if ( event.which == 13) {
                                    if(cep == ""){
        
                                        campoCep.classList.add("d-none");

                                    }else{

                                        calcular_frete(cep, peso, altura, largura, comprimento, dias_entrega, preco_total_sacola, desconto_frete);

                                    }
                                }
        
                            });
        
                            </script>
                        <!-- //Calculo do frete -->
        
                    </div>
        
                    <div class="col-md-5">
        
                        <div class="row mt-4">
        
                            <div class="col">

                                <?php
                                
                                /* foreach($classeCompra->retorna_dados_carrinho() as $arrCarrinho){

                                    $produto[] = ["nome" => $arrCarrinho["nome_produto"], "preco" => $arrCarrinho["preco"], "qtd" => $arrCarrinho["qtd_pedido"], "id_produtos" => $arrCarrinho["id_produto"]];
                                
                                }

                                $codigoPagseguro = $classeCompra->pagseguro($produto); */
                                /* $codigoPagseguro = "065EA1E56868532BB4D1DF95CD639934"; */
                                
                                ?>

                                <div class="row" id="campoEndereco" style="display: none;">

                                    <div class="col">

                                        <div class="row">

                                            <div class="col fs-4">

                                                Dados para entrega

                                            </div>

                                        </div>

                                        <div class="row mt-3">

                                            <div class="col-8">

                                                <label for="basic-url" class="form-label">Cidade <span class="text-danger">*</span></label>
                                                <input id="inputCidade" type="text" class="form-control">

                                            </div>

                                            <div class="col-4">

                                                <label for="basic-url" class="form-label">UF <span class="text-danger">*</span></label>
                                                <input style="text-transform: uppercase;" id="inputEstado" type="text" class="form-control" maxlength="5">

                                            </div>

                                        </div>

                                        <div class="row mt-2">

                                            <div class="col">

                                                <label for="basic-url" class="form-label">Bairro <span class="text-danger">*</span></label>
                                                <input id="inputBairro" type="text" class="form-control">

                                            </div>

                                        </div>

                                        <div class="row mt-2">

                                            <div class="col">

                                                <label for="basic-url" class="form-label">Rua <span class="text-danger">*</span></label>
                                                <input id="inputEndereco" type="text" class="form-control">

                                            </div>

                                        </div>

                                        <div class="row mt-2">

                                            <div class="col-8">

                                                <label for="basic-url" class="form-label">Complemento</label>
                                                <input id="inputComplemento" type="text" class="form-control">

                                            </div>

                                            <div class="col-4">

                                                <label for="basic-url" class="form-label">Nº <span class="text-danger">*</span></label>
                                                <input id="inputNumero" type="number" class="form-control">

                                            </div>

                                        </div>

                                        <div class="row mt-2">

                                            <div class="col">

                                                <label for="basic-url" class="form-label">Detalhes adicionais</label>
                                                <textarea class="form-control" rows="3" id="detalhesAdicionais" name="detalhesAdicionais" maxlength="120"></textarea>
                                                <div class="form-text">Se necessário, use esse campo para informar detalhes adicionais da entrega</div>

                                            </div>

                                        </div>

                                        <div class="row mt-2">

                                            <div class="col">

                                                <label for="basic-url" class="form-label">CPF/CNPJ <span class="text-danger">*</span></label>
                                                <input class="form-control maskCpf" id="cpf" name="cpf">

                                            </div>

                                        </div>

                                        <div class="row mt-2 mb-4">

                                            <div class="col">

                                                <label for="basic-url" class="form-label">Número para contato <span class="text-danger">*</span></label>
                                                <input class="form-control maskCelular" id="celular" name="celular">
                                                <div class="form-text">Preferencialmente WhatsApp</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <script>

                                $("#inputCalculaFrete").keyup(function(){
                                //Início do Comando AJAX
                                    $.ajax({
                                        //O campo URL diz o caminho de onde virá os dados
                                        //É importante concatenar o valor digitado no CEP
                                        url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
                                        //Aqui você deve preencher o tipo de dados que será lido,
                                        //no caso, estamos lendo JSON.
                                        dataType: 'json',
                                        //SUCESS é referente a função que será executada caso
                                        //ele consiga ler a fonte de dados com sucesso.
                                        //O parâmetro dentro da função se refere ao nome da variável
                                        //que você vai dar para ler esse objeto.
                                        success: function(resposta){
                                            //Agora basta definir os valores que você deseja preencher
                                            //automaticamente nos campos acima.
                                            $("#inputEndereco").val(resposta.logradouro);
                                            $("#inputComplemento").val(resposta.complemento);
                                            $("#inputBairro").val(resposta.bairro);
                                            $("#inputCidade").val(resposta.localidade);
                                            $("#inputEstado").val(resposta.uf);
                                            //Vamos incluir para que o Número seja focado automaticamente
                                            //melhorando a experiência do usuário
                                            /* $("#inputNumeroCasa").focus(); */
                                        }
                                    });

                                    var imputCidade = document.getElementById("inputCidade");
                                    var imputEstado = document.getElementById("inputEstado");
                                    var imputBairro = document.getElementById("inputBairro");
                                    var imputRua = document.getElementById("inputEndereco");

                                    setTimeout(function(){ 
                                        
                                        if(imputCidade.value != ""){

                                            imputCidade.setAttribute("disabled", true);

                                        }else{

                                            imputCidade.removeAttribute("disabled", true);

                                        }

                                        if(imputEstado.value != ""){

                                            imputEstado.setAttribute("disabled", true);

                                        }else{

                                            imputEstado.removeAttribute("disabled", true);

                                        }

                                        if(imputBairro.value != ""){

                                            imputBairro.setAttribute("disabled", true);

                                        }else{

                                            imputBairro.removeAttribute("disabled", true);

                                        }

                                        if(imputRua.value != ""){

                                            imputRua.setAttribute("disabled", true);

                                        }else{

                                            imputRua.removeAttribute("disabled", true);

                                        }

                                    }, 1500);

                                    /* if(imputCidade.value != ""){

                                        imputCidade.setAttribute("disabled", true);

                                    }

                                    if(imputEstado.value != ""){

                                        imputEstado.setAttribute("disabled", true);

                                    }

                                    if(imputBairro.value != ""){

                                        imputBairro.setAttribute("disabled", true);

                                    }

                                    if(imputRua.value != ""){

                                        imputRua.setAttribute("disabled", true);

                                    } */

                                });

                                </script>
        
                                <!-- Botão comprar -->

                                <?php
                                
                                if($classeCompra->retorna_dados_carrinho() == false || isset($variavelBloqueio)){
                                
                                ?>

                                <button id="botaoFinalizar" disabled>FINALIZAR COMPRA</button>

                                <?php
                                
                                }else{
                                
                                ?>

                                <button onclick="verificar_campo_frete()" id="botaoFinalizar">FINALIZAR COMPRA</button>

                                <?php
                                
                                }
                                
                                ?>
                                
                                <script type="text/javascript">
                                                                                
                                    function retorna_codigo_pagseguro(frete, precosacola, desconto_frete) {

                                        var freteSplit = frete.split("-");

                                        $(function(){

                                        })
                
                                        $.ajax({
                
                                            type: "POST",
                                            dataType: "html",
                
                                            url: "php/pagseguro.php",
                
                                            beforeSend: function () {
                
                                                $("#espacoPagseguro").html("<img src='img/loading.gif' width='50px'>");
                
                                            },
                
                                            data: {frete: freteSplit[1], tipo: freteSplit[0], dias: freteSplit[2], precosacola: precosacola, desconto_frete: desconto_frete},
                
                                            success: function (msg) {
                
                                                $("#espacoPagseguro").html(msg);
                
                                            }
                
                                        });
                
                                    }
                
                                    /* $("#selectFrete").click(function(){
                
                                        var campoSelect = document.getElementById("selectFrete").value;

                                        retorna_codigo_pagseguro("44.50");
                
                                    }); */
            
                                </script>

                                <!-- Efetuar registro da compra -->
                                <script type="text/javascript">
                                                                                                                
                                    function efetua_pedido() {

                                        var cidade = document.getElementById("inputCidade").value;
                                        var estado = document.getElementById("inputEstado").value;
                                        var bairro = document.getElementById("inputBairro").value;
                                        var rua = document.getElementById("inputEndereco").value;
                                        var complemento = document.getElementById("inputComplemento").value;
                                        var numero = document.getElementById("inputNumero").value;
                                        var referencia = document.getElementById("hiddenReferencia").value;
                                        var cep = document.getElementById("inputCalculaFrete").value;
                                        var detalhes = document.getElementById("detalhesAdicionais").value;
                                        var cpf = document.getElementById("cpf").value;
                                        var celular = document.getElementById("celular").value;

                                        $.ajax({

                                            type: "POST",
                                            dataType: "html",

                                            url: "php/novaCompra.php",

                                            /* beforeSend: function () {

                                                $("#espacoPagseguro").html("<img class='imgLoading' src='img/loading.gif' width='50px'>");

                                            }, */

                                            data: {cidade: cidade, estado: estado, bairro: bairro, rua: rua, complemento: complemento, numero: numero, referencia: referencia, cep: cep, detalhes: detalhes, cpf: cpf, celular: celular},

                                            success: function (msg) {

                                                $("#espacoNovaCompra").html(msg);

                                                /* setTimeout(function() {
                                                    $("#areaIconeOk").html("");
                                                    $("#textoAnotacoesRapidas").removeClass("is-valid");;
                                                }, 3000); */

                                            }

                                        });

                                    }

                                    $("#selectFrete").click(function(){

                                        var campoSelect = document.getElementById("selectFrete").value;

                                        var preco_total = "<?php echo $preco_total; ?>";

                                        var desconto_frete = "<?php echo $desconto_frete; ?>";

                                        retorna_codigo_pagseguro("44.50", preco_total, desconto_frete);

                                    });

                                </script>

                                <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
                                <!-- <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script> -->

                                <script type="text/javascript">
                                
                                    function abrir_pagseguro(code){

                                        //Insira o código de checkout gerado no Passo 1
                                        /* var code = '065EA1E56868532BB4D1DF95CD639934'; */
                                        var callback = {
                                            success : function(transactionCode) {
                                                //Insira os comandos para quando o usuário finalizar o pagamento. 
                                                //O código da transação estará na variável "transactionCode"

                                                /* console.log("Compra feita com sucesso, código de transação: " + transactionCode); */

                                                window.location="pedidos?ls=s";

                                            },
                                            abort : function() {
                                                //Insira os comandos para quando o usuário abandonar a tela de pagamento.
                                                /* console.log("abortado"); */

                                                var referencia = document.getElementById("hiddenReferencia").value;
                                                var id_cliente = "<?php echo $idCliente; ?>";

                                                window.location = "php/apagarPedidoAoCancelar.php?idU="+id_cliente+"&referencia="+referencia;

                                            }
                                        };
                                        //Chamada do lightbox passando o código de checkout e os comandos para o callback
                                        var isOpenLightbox = PagSeguroLightbox(code, callback);
                                        // Redireciona o comprador, caso o navegador não tenha suporte ao Lightbox
                                        if (!isOpenLightbox){
                                            location.href="https://pagseguro.uol.com.br/v2/checkout/payment.html?code=" + code;
                                            console.log("Redirecionamento")
                                        }

                                    }

                                </script>
        
                            </div>
        
                        </div>
        
                    </div>

                </div>

            </div>

        </div>

        <?php
                
        include "phpPartes/rodape.php";
        
        ?>

    </div>

</body>

</html>