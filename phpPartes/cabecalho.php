<link rel="stylesheet" href="cssPartes/cabecalho.css">

<?php

if(!isset($classeClientes)){
    
    /* Iniciando classe */
    include "classes/clientes.class.php";
    $classeClientes = new clientes();

}

if(!isset($classeCompra)){
    
    /* Iniciando classe */
    include "classes/compra.class.php";
    $classeCompra = new compra();

}

?>

<script>

    function abrir_campo_busca(tipo){

        var menu = document.getElementById("menuPrincipal");
        var busca = document.getElementById("formBusca");
        var campoBusca = document.getElementById("campoBusca");

        if(tipo == true){

            menu.classList.add("d-none");
            busca.classList.remove("d-none");
            campoBusca.focus();

        }else{

            menu.classList.remove("d-none");
            busca.classList.add("d-none");

        }            

    }

    function aparecer_espaco_user(){

        $("#espacoUser").css({display: "inline-block"});
        $("#telaTransparente").css({display: "block"});

    }

    function alterar_login_cadastro(modo){

        var corpoLogar = document.getElementById("espacoLoginUser");
        var corpoCadastrar = document.getElementById("espacoCadastrarUser");

        if(modo == 1){

            corpoLogar.classList.add("d-none");
            corpoCadastrar.classList.remove("d-none");

        }else{

            corpoLogar.classList.remove("d-none");
            corpoCadastrar.classList.add("d-none");

        }

    }

    function verificar_senha_igual(senha2){

        var senha1 = document.getElementById("inputSenha").value;

        if(senha1 != "" && senha2 != ""){

            if(senha1 != senha2){

                $("#campoDicaSenha").text("Campo senha e confirmar senha são diferentes!");
                $("#campoDicaSenha").removeClass("text-white");
                $("#campoDicaSenha").addClass("text-info");

                $('#botaoCadastrar').attr('disabled', 'disabled');

            }else{

                $("#campoDicaSenha").text("Dica: use letras e números; não use uma senha muito óbvia");
                $("#campoDicaSenha").addClass("text-secondary");
                $("#campoDicaSenha").removeClass("text-info");

                $('#botaoCadastrar').removeAttr('disabled', 'disabled');

            }

        }

    }

</script>

<header>

    <div class="row justify-content-center">

        <div class="col-12 col-lg-10">

            <div class="row mt-4">

                <div class="col-5 col-md-6 col-lg-3">

                    <img src="img/logo.png" width="100%" id="logo">

                </div>

                <div class="col-6 d-none d-lg-block text-center">

                    <nav id="menuPrincipal">

                        <ul class="text-secondary">

                            <li><a href="./" class="text-secondary text-decoration-none">Inicio</a></li>
                            <li><a href="loja" class="text-secondary text-decoration-none">Loja</a></li>
                            <li id="liCategorias"><a>Categorias</a>

                                <ul>

                                    <li>
                                        
                                        <ul id="subLista">

                                            <li><a>Sub1</a></li>
                                            <li><a>Sub2</a></li>
                                            <li><a>Sub3</a></li>
                                            <li><a>Sub4</a></li>

                                        </ul>    
                                        
                                    <a>Esse é apenas</a></li>
                                    <li>
                                        
                                        <ul id="subLista">

                                            <li><a>Sub1</a></li>
                                            <li><a>Sub2</a></li>
                                            <li><a>Sub3</a></li>
                                            <li><a>Sub4</a></li>

                                        </ul>    
                                        
                                    <a>Cat2</a></li>
                                    <li><a>Cat3</a></li>
                                    <li>
                                        
                                        <ul id="subLista">

                                            <li><a>Sub1</a></li>
                                            <li><a>Sub2</a></li>
                                            <li><a>Sub3</a></li>
                                            <li><a>Sub4</a></li>

                                        </ul>
                                        
                                    <a>Cat4</a></li>

                                </ul>

                            </li>
                            <li><a>Quem Somos</a></li>
                            <li><a>Contato</a></li>

                        </ul>

                    </nav>

                    <form method="GET" action="loja" class="d-none" id="formBusca">

                        <input type="text" id="campoBusca" onfocusout="abrir_campo_busca(false)" placeholder="Faça uma busca" name="q">

                    </form>

                </div>

                <div class="col-7 col-md-6 col-lg-3 text-end">

                    <!-- Mobile -->

                    <img src="img/user.png" class="d-sm-none" id="iconeUserMobile" onclick="aparecer_espaco_user()">

                    <img src="img/bag.png" class="d-sm-none" id="iconeBagMobile">

                    <img src="img/menu.png" class="d-sm-none" id="iconeMenuMobile">

                    <!-- Tablet -->
                    
                    <img src="img/user.png" class="d-none d-sm-inline" id="iconeUser" onmouseover="aparecer_espaco_user()">

                    <div id="espacoUser-compensa"></div>
                    <div id="espacoUser">

                        <?php
                        
                        if(isset($_COOKIE["iu_mb"]) && isset($_COOKIE["eu_mb"]) && isset($_COOKIE["su_mb"])){

                            if($classeClientes->verificaExistenciaUsuario($_COOKIE["iu_mb"], $_COOKIE["eu_mb"], $_COOKIE["su_mb"]) != true){

                                die("<script>window.location='php/deslogar.php'</script>");

                            }else{

                                $classeCompra->idCliente = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($_COOKIE["iu_mb"])));

                                $qtdItemCarrinho = $classeCompra->retorna_qtd_itens_carrinho();

                            ?>

                            <div id="espacoMenuUser" class="text-center text-secondary">

                                <div id="espacoNomeUsuario">

                                    <p class="pt-1">Bem vindo Erick Mota</p>

                                </div>

                                <table class="mt-3" width="100%" align="center" border="0px">

                                    <tr>

                                        <td width="33%">

                                            <img src="img/check.png" width="40px"><br>

                                            Pedidos

                                        </td>

                                        <td width="33%">

                                            <img src="img/config.png" width="40px"><br>

                                            Ajustes
                                            
                                        </td>

                                        <td width="33%" style="cursor: pointer;" onclick="window.location='php/deslogar.php'">

                                            <img src="img/sair.png" width="40px"><br>

                                            Sair
                                            
                                        </td>

                                    </tr>

                                </table>

                            </div>

                            <?php

                            }

                        }else{

                            $qtdItemCarrinho = 0;
                        
                        ?>

                        <div id="espacoLoginUser" class="text-center ps-4 pe-4">

                            <form method="POST" action="php/login.php">

                                <input name="email" type="email" class="campoUser mt-4" placeholder=" E-mail"><br>
    
                                <input name="senha" type="password" class="campoUser" placeholder=" Senha"><br>

                                <input type="hidden" value="<?php echo $_SERVER["REQUEST_URI"] ?>" name="url">
    
                                <button type="submit" class="botaoUser mb-3">ENTRAR</button>
    
                            </form>
    
                            <span class="mt-3 text-secondary"><a id="botaoEsqueciSenha" class="botaoLink text-secondary text-decoration-none">Esqueci a senha</a> / <a class="botaoLink text-secondary text-decoration-none" onclick="alterar_login_cadastro(1)">Cadastrar</a></span>
                            
                            <div id="espacoEsqueci" class="mt-3" style="display: none;">

                                <form method="POST" action="php/esqueciSenha.php">

                                    <input type="email" class="campoUser" placeholder=" E-mail cadastrado" name="esqueci-email" required>

                                    <input type="submit" class="botaoUser2 btn mt-2" value="LEMBRAR SENHA">

                                </form>

                            </div>

                            <script>

                                $("#botaoEsqueciSenha").click(function(){
    
                                    $("#espacoEsqueci").slideToggle("fast");
    
                                })
    
                            </script>

                        </div>

                        <div id="espacoCadastrarUser" class="d-none text-start ps-4 pe-4">

                            <p class="botaoLink text-decoration-none mt-3" onclick="alterar_login_cadastro(2)"><small id="botaoVoltarLogin"><- Fazer login</small></p>

                            <form method="POST" action="php/cadastrarCliente.php">

                                <input type="text" class="campoUser mt-1" placeholder=" Seu nome" name="nome" maxlength="27" required><br>
                                <small class="text-secondary">Como gostaria de ser chamado(a)?</small><br>

                                <input type="email" class="campoUser" placeholder=" Seu-email" name="email" id="inputEmail" autocomplete="off" required><br>
                                <small class="text-secondary" id="espacoVerificarEmail">Use o seu melhor e-mail</small><br>

                                <script>

                                    function verifica_existencia_email(email) {

                                    $.ajax({

                                        type: "POST",
                                        dataType: "html",

                                        url: "ajax/verificar_email.php",

                                        /* beforeSend: function () {

                                            $("#espacoPagseguro").html("<img class='imgLoading' src='img/loading.gif' width='50px'>");

                                        }, */

                                        data: {email: email},

                                        success: function (msg) {

                                            $("#espacoVerificarEmail").html(msg);

                                            var espacoMsg = $("#espacoVerificarEmail").text();  

                                            if(espacoMsg == "Esse e-mail já existe em nossa base de dados, tente clicar em esqueci a senha."){

                                                $('#botaoCadastrar').attr('disabled', 'disabled');

                                            }else{

                                                $('#botaoCadastrar').removeAttr('disabled', 'disabled');

                                            }

                                            /* setTimeout(function() {
                                                $("#areaIconeOk").html("");
                                                $("#textoAnotacoesRapidas").removeClass("is-valid");;
                                            }, 3000); */

                                        }

                                    });

                                    }

                                    $("#inputEmail").keyup(function(){

                                    var inputEmail = document.getElementById("inputEmail").value;

                                    verifica_existencia_email(inputEmail);

                                    });

                                </script>

                                <input id="inputSenha" class="inputSenha" type="password" placeholder=" Sua senha" name="senha" maxlength="20" required><br>

                                <input onkeyup="verificar_senha_igual(this.value)" class="campoUser" type="password" placeholder=" Confirme a senha" maxlength="20" name="confirmarSenha" required><br>
                                <small class="text-secondary" id="campoDicaSenha">Dica: use letras e números; não use uma senha muito óbvia</small><br>

                                <input type="submit" id="botaoCadastrar" class="botaoUser" value="CADASTRAR">

                            </form>

                        </div>
                        
                        <?php
                        
                        }
                        
                        ?>

                    </div>

                    <img src="img/bag.png" class="d-none d-sm-inline" id="iconeBag">

                    <div onclick="window.location='sacola'" id="numeroItemSacola" class="text-center"><p><?php echo $qtdItemCarrinho; ?></p></div>

                    <img src="img/search.png" onclick="abrir_campo_busca(true)" class="d-none d-lg-inline" id="iconeBusca">

                    <img src="img/menu.png" class="d-none d-sm-inline d-lg-none" id="iconeMenu">

                </div>

                <div id="areaMenuMobile">

                    <form id="bordaCampoBuscaMobile" class="pb-4" action="loja" class="" method="GET">
    
                        <input type="text" id="campoBuscaMobile" placeholder="Buscar Produto" name="q">
    
                    </form>
    
                    <nav>
    
                        <ul class="mt-3" id="ulMenuPricipal" style="display: none;">
    
                            <li><span><a class="text-decoration-none" href="">Início</a></span></li>
                            <li><span><a class="text-decoration-none" href="loja">Loja</a></span></li>
                            <li id="itemCategoria"><span>Categorias</span> <img src="img/down.png" width="20px"></li>
    
                                <ul id="listaCategoria" style="display: none;">
    
                                <?php
                            
                                foreach($classeProdutos->retorna_categorias() as $arrCategoria){
    
                                $catComTraco = str_replace(" ", "-", $arrCategoria["nome"]);
                                $transformarEmMinuscula = mb_strtolower($catComTraco, "UTF-8");
                                $trataInjection = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($transformarEmMinuscula, ENT_QUOTES, "UTF-8"));
                                $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
                                $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
                                $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
                                $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
                                $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
                                $str6 = preg_replace('/[ç]/ui', 'c', $str5);
                                
                                ?>
    
                                    <li><a class="text-decoration-none" href="loja?pg=1&cat=<?php echo $str6; ?>&ordenacao=adicionado&tipoord=cre"><?php echo $arrCategoria["nome"]; ?></a></li>
    
                                <?php
                        
                                }
                                
                                ?>
    
                                </ul>
    
                            <li><span><a class="text-decoration-none" href="quem-somos">Quem Somos</a></span></li>
                            <li><span><a class="text-decoration-none" href="contato">Contato</a></span></li>
    
                        </ul>
    
                    </nav>
    
                    <script>
    
                    $( "#itemCategoria" ).click(function() {
                        $( "#listaCategoria" ).toggle("fast");
                    });
    
                    </script>
    
                </div>

                <div id="fundoAreaMenuMobile">



                </div>
    
                <script>
    
                $( "#iconeMenu, #iconeMenuMobile" ).click(function() {
                    $("#fundoAreaMenuMobile").css("display", "block");
                    $("#fundoAreaMenuMobile").animate({
                        opacity: "0.2"
                    }, 100 );
                    $( "#areaMenuMobile" ).animate({
                        width: "256px",
                        left: "0px"
                    }, 100 );
                    $( "#ulMenuPricipal" ).fadeIn();
                });
    
                $( "#fundoAreaMenuMobile" ).click(function() {
                    $("#fundoAreaMenuMobile").animate({
                        opacity: "0.0"
                    }, 100 );
                    $("#fundoAreaMenuMobile").css("display", "none");
                    $( "#areaMenuMobile" ).animate({
                        width: "0px",
                        left: "-50px"
                    }, 100 );
                    $( "#ulMenuPricipal" ).fadeOut("fast");
                });
    
                </script>

                <div id="telaTransparente"></div>

                <script>

                    var telaTransparente = document.getElementById("telaTransparente");

                    var x = window.matchMedia("(max-width: 575px)")

                    if (x.matches) { // If media query matches
                        
                        telaTransparente.onclick = function(){

                            $("#espacoUser").css({display: "none"});
                            $("#telaTransparente").css({display: "none"});

                        };

                    } else {
                        
                        telaTransparente.onmouseover = function(){

                            $("#espacoUser").css({display: "none"});
                            $("#telaTransparente").css({display: "none"});

                        };

                    }

                </script>

            </div>

        </div>

    </div>

</header>