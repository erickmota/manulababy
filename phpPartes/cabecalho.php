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

                            <li><a>Inicio</a></li>
                            <li><a>Loja</a></li>
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

                    <img src="img/user.png" class="d-sm-none" id="iconeUserMobile">

                    <img src="img/bag.png" class="d-sm-none" id="iconeBagMobile">

                    <img src="img/menu.png" class="d-sm-none" id="iconeBuscaMobile">

                    <!-- Tablet -->

                    <img src="img/user.png" class="d-none d-sm-inline" id="iconeUser">

                    <img src="img/bag.png" class="d-none d-sm-inline" id="iconeBag">

                    <img src="img/search.png" onclick="abrir_campo_busca(true)" class="d-none d-lg-inline" id="iconeBusca">

                    <img src="img/menu.png" class="d-none d-sm-inline d-lg-none" id="iconeBusca">

                </div>

            </div>

        </div>

    </div>

</header>