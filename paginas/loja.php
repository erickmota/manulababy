<!DOCTYPE html>
<html>

<head>

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

    <link rel="stylesheet" href="css/loja.css">

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

        $( function() {
            $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 100, 300 ],
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
            values: [ 100, 300 ],
            slide: function( event, ui ) {
                $( "#vMin2" ).val( ui.values[ 0 ]);
                $( "#vMax2" ).val( ui.values[ 1 ]);
            }
            });
            $( "#vMin2" ).val( $( "#slider-range" ).slider( "values", 0 ));
            $( "#vMax2" ).val( $( "#slider-range" ).slider( "values", 1 ));
        } );

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

                        <input type="number" class="form-control" id="vMin2">

                    </td>

                    <td width="30px">à</td>

                    <td>

                        <input type="number" class="form-control" id="vMax2">

                    </td>

                </tr>

            </table>

            <div id="slider-range2" class="mt-3"></div>

            <button type="button" class="form-control mt-3" id="botaoFiltrar">FILTRAR</button>

        </div>

        <span>Tamanho</span>

        <div id="filtroValores" class="mb-4">

            <table border="0" cellspacing="0" width="100%" class="text-center">

                <tr>

                    <td>

                        <input type="checkbox"> P

                    </td>

                    <td>

                        <input type="checkbox"> M

                    </td>

                    <td>

                        <input type="checkbox"> G

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="checkbox"> 1

                    </td>

                    <td>

                        <input type="checkbox"> 2

                    </td>

                    <td>

                        <input type="checkbox"> 3

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="checkbox"> 4

                    </td>

                    <td>

                        <input type="checkbox"> 5

                    </td>

                    <td>

                        <input type="checkbox"> 6

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="checkbox"> 7

                    </td>

                    <td>

                        <input type="checkbox"> 8

                    </td>

                    <td>

                        

                    </td>

                </tr>

            </table>

        </div>

        <span>Marca</span>

        <div id="filtroValores" class="caixaFiltroMarca" align="center">

            <table border="0" cellspacing="0" id="tabelaMarca">

                <tr>

                    <td>

                        <input type="checkbox"> Marca 1

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="checkbox"> Marca 2

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="checkbox"> Marca 3

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="checkbox"> Marca 4

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="checkbox"> Marca 5

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="checkbox"> Marca 5

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="checkbox"> Marca 5

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="checkbox"> Marca 5

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

                                        <input type="number" class="form-control" id="vMin">

                                    </td>

                                    <td width="30px">à</td>

                                    <td>

                                        <input type="number" class="form-control" id="vMax">

                                    </td>

                                </tr>

                            </table>

                            <div id="slider-range" class="mt-3"></div>

                            <button type="button" class="form-control mt-3" id="botaoFiltrar">FILTRAR</button>

                        </div>

                        <span>Tamanho</span>

                        <div id="filtroValores" class="mb-4">

                            <table border="0" cellspacing="0" width="100%" class="text-center">

                                <tr>

                                    <td>

                                        <input type="checkbox"> P

                                    </td>

                                    <td>

                                        <input type="checkbox"> M

                                    </td>

                                    <td>

                                        <input type="checkbox"> G

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input type="checkbox"> 1

                                    </td>

                                    <td>

                                        <input type="checkbox"> 2

                                    </td>

                                    <td>

                                        <input type="checkbox"> 3

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input type="checkbox"> 4

                                    </td>

                                    <td>

                                        <input type="checkbox"> 5

                                    </td>

                                    <td>

                                        <input type="checkbox"> 6

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input type="checkbox"> 7

                                    </td>

                                    <td>

                                        <input type="checkbox"> 8

                                    </td>

                                    <td>

                                        

                                    </td>

                                </tr>

                            </table>

                        </div>

                        <span>Marca</span>

                        <div id="filtroValores" class="caixaFiltroMarca" align="center">

                            <table border="0" cellspacing="0" id="tabelaMarca">

                                <tr>

                                    <td>

                                        <input type="checkbox"> Marca 1

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input type="checkbox"> Marca 2

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input type="checkbox"> Marca 3

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input type="checkbox"> Marca 4

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input type="checkbox"> Marca 5

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input type="checkbox"> Marca 5

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input type="checkbox"> Marca 5

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input type="checkbox"> Marca 5

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

                                <div id="bFeminino" class="float-start text-center d-inline-block botaoTipoAtivo me-1">
                                    
                                    <p id="textoTipo" class="fs-4">T</p>
                                
                                </div>

                                <div id="bFeminino" class="float-start text-center text-secondary d-inline-block me-1">
                                    
                                    <p id="textoTipo" class="fs-4">F</p>
                                
                                </div>

                                <div id="bFeminino" class="float-start text-center text-secondary d-inline-block">
                                    
                                    <p id="textoTipo" class="fs-4">M</p>
                                
                                </div>

                            </div>

                            <div class="col-4">

                                <select id="selectOrganizar" class="float-end">

                                    <option>Organizar por</option>
                                    <option>Nome</option>
                                    <option>Último adicionado</option>
                                    <option>Primeiro adicionado</option>
                                    <option>Menor preço</option>
                                    <option>Maior preço</option>

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

                        <div class="row">

                            <div class="col-12 col-sm-6 col-md-4">
        
                                <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
                    
                                    <img src="img/produtos/exemplo1.jpg" id="fotoAnelProdutos">
                    
                                    <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
                    
                                    <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                                    <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
                    
                                    <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
                    
                                    <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
                    
                                </div>
                
                            </div>
        
                            <div class="col-12 col-sm-6 col-md-4">
                
                                <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
                    
                                    <img src="img/produtos/exemplo2.jpg" id="fotoAnelProdutos">
                    
                                    <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
                    
                                    <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                                    <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
                    
                                    <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
                    
                                    <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
                    
                                </div>
                
                            </div>
        
                            <div class="col-12 col-sm-6 col-md-4">
                
                                <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
                    
                                    <img src="img/produtos/exemplo3.jpg" id="fotoAnelProdutos">
                    
                                    <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
                    
                                    <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                                    <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
                    
                                    <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
                    
                                    <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
                    
                                </div>

                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
        
                                <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
                    
                                    <img src="img/produtos/exemplo4.jpg" id="fotoAnelProdutos">
                    
                                    <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
                    
                                    <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                                    <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
                    
                                    <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
                    
                                    <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
                    
                                </div>
                
                            </div>
        
                            <div class="col-12 col-sm-6 col-md-4">
                
                                <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
                    
                                    <img src="img/produtos/exemplo5.jpg" id="fotoAnelProdutos">
                    
                                    <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
                    
                                    <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                                    <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
                    
                                    <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
                    
                                    <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
                    
                                </div>
                
                            </div>
        
                            <div class="col-12 col-sm-6 col-md-4">
                
                                <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
                    
                                    <img src="img/produtos/exemplo6.jpg" id="fotoAnelProdutos">
                    
                                    <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
                    
                                    <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                                    <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
                    
                                    <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
                    
                                    <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
                    
                                </div>
                
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                
                                <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
                    
                                    <img src="img/produtos/exemplo6.jpg" id="fotoAnelProdutos">
                    
                                    <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
                    
                                    <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                                    <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
                    
                                    <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
                    
                                    <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
                    
                                </div>
                
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                
                                <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
                    
                                    <img src="img/produtos/exemplo6.jpg" id="fotoAnelProdutos">
                    
                                    <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
                    
                                    <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                                    <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
                    
                                    <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
                    
                                    <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
                    
                                </div>
                
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                
                                <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
                    
                                    <img src="img/produtos/exemplo6.jpg" id="fotoAnelProdutos">
                    
                                    <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
                    
                                    <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                                    <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
                    
                                    <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
                    
                                    <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
                    
                                </div>
                
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                
                                <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
                    
                                    <img src="img/produtos/exemplo6.jpg" id="fotoAnelProdutos">
                    
                                    <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
                    
                                    <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                                    <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
                    
                                    <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
                    
                                    <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
                    
                                </div>
                
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                
                                <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">
                    
                                    <img src="img/produtos/exemplo6.jpg" id="fotoAnelProdutos">
                    
                                    <p id="nomeItem" class="card-text mt-1 pt-2">Blusinha rosa para bebê</p>
                    
                                    <span id="precoAntigo" class="text-decoration-line-through text-secondary ">R$58,50</span>
                                    <h5 class="card-title fs-4"  id="precoPromocao">R$46,50</h5>
                    
                                    <p id="precoItemGrande" class="card-title mt-1 pt-3 border-top fs-3 text-secondary d-none">R$46,50</p>
                    
                                    <button class="botaoComprar d-none" id="botaoComprar">COMPRAR</button>
                    
                                </div>
                
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                
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