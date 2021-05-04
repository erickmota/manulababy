<link rel="stylesheet" href="cssPartes/cabecalho.css">

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

                    <form class="d-none" id="formBusca">

                        <input type="text" id="campoBusca" onfocusout="abrir_campo_busca(false)" placeholder="Faça uma busca">

                    </form>

                </div>

                <div class="col-7 col-md-6 col-lg-3 text-end">

                    <!-- Mobile -->

                    <img src="img/user.png" class="d-sm-none" id="iconeUserMobile" onclick="aparecer_espaco_user()">

                    <img src="img/bag.png" class="d-sm-none" id="iconeBagMobile">

                    <img src="img/menu.png" class="d-sm-none" id="iconeBuscaMobile">

                    <!-- Tablet -->
                    
                    <img src="img/user.png" class="d-none d-sm-inline" id="iconeUser" onmouseover="aparecer_espaco_user()">

                    <div id="espacoUser-compensa"></div>
                    <div id="espacoUser">

                        <div id="espacoLoginUser" class="text-center ps-4 pe-4">

                            <form>

                                <input type="email" id="campoUser" class="mt-4" placeholder=" E-mail"><br>
    
                                <input type="password" id="campoUser" placeholder=" Senha"><br>
    
                                <button type="submit" class="mb-3" id="botaoUser">ENTRAR</button>
    
                            </form>
    
                            <span class="mt-3 text-secondary"><a id="botaoEsqueciSenha" class="botaoLink text-secondary text-decoration-none">Esqueci a senha</a> / <a class="botaoLink text-secondary text-decoration-none" onclick="alterar_login_cadastro(1)">Cadastrar</a></span>
                            
                            <div id="espacoEsqueci" class="mt-3" style="display: none;">

                                <form method="POST" action="php/esqueciSenha.php">

                                    <input type="email" id="campoUser" placeholder=" E-mail cadastrado" name="esqueci-email" required>

                                    <input type="submit" id="botaoUser2" class="btn mt-2" value="LEMBRAR SENHA">

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

                            <form>

                                <input type="text" id="campoUser" class="mt-1" placeholder=" Seu nome" name="nome" maxlength="27" required><br>
                                <small class="text-secondary">Como gostaria de ser chamado(a)?</small><br>

                                <input type="email" id="campoUser" placeholder=" Seu-email" name="email" id="inputEmail" autocomplete="off" required><br>
                                <small class="text-secondary" id="espacoVerificarEmail">Use o seu melhor e-mail</small><br>

                                <input id="inputSenha" type="password" placeholder=" Sua senha" name="senha" maxlength="20" required><br>

                                <input onkeyup="verificar_senha_igual(this.value)" id="campoUser" type="password" placeholder=" Confirme a senha" maxlength="20" name="confirmarSenha" required><br>
                                <small class="text-secondary" id="campoDicaSenha">Dica: use letras e números; não use uma senha muito óbvia</small><br>

                                <input type="submit" id="botaoUser" value="CADASTRAR">

                            </form>

                        </div>

                    </div>

                    <img src="img/bag.png" class="d-none d-sm-inline" id="iconeBag">

                    <img src="img/search.png" onclick="abrir_campo_busca(true)" class="d-none d-lg-inline" id="iconeBusca">

                    <img src="img/menu.png" class="d-none d-sm-inline d-lg-none" id="iconeBusca">

                </div>

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