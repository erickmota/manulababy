<?php

if(!isset($classeAdm)){

    include "./classes/adm.class.php";
    $classeAdm = new adm();

}

$idAdm = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($_COOKIE["aiu_mb"])));

$classeAdm->id = $idAdm;

/* Verificando existencia do usuário */

if(isset($_COOKIE["aiu_mb"]) && isset($_COOKIE["aeu_mb"]) && isset($_COOKIE["asu_mb"])){

    if($classeAdm->verifica_existencia_adm($_COOKIE["aiu_mb"], $_COOKIE["aeu_mb"], $_COOKIE["asu_mb"]) == true){



    }else{

        die("<script>window.location='php/adm_deslogar.php';</script>");

    }

}else{

    die("<script>window.location='php/adm_deslogar.php';</script>");

}

/* // Verificando existencia do usuário */

$nomeAdm = $classeAdm->retorna_dados_adm_id();

?>

<link rel="stylesheet" href="./cssPartes/menu_adm.css">

<!-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script> -->

<div class="col-3 d-none d-md-block" id="fundoMenuPrincipal">

    <div class="row mt-3">

        <div class="col text-center">

            <img src="img/logo.png" width="50%">

        </div>

    </div>

    <div class="row mt-3 border-bottom border-secondary pb-4">

        <div class="col text-center text-white">

            <span>Bem vindo <b><?php echo $nomeAdm; ?></b></span>

        </div>

    </div>

    <div class="row mt-3">

        <div class="col text-white">

            <nav>

                <ul id="listaMenu">

                    <li><a href="adm/novo-produto">NOVO PRODUTO</a></li>
                    <li><a href="adm/produtos-cadastrados">PRODUTOS</a></li>
                    <li><a href="adm/pedidos">PEDIDOS</a></li>
                    <li><a href="adm/configuracoes">CONFIGURAÇÕES</a></li>
                    <li><a href="https://pagseguro.uol.com.br/" target="_blank">PAGSEGURO</a></li>
                    <li><a href="php/adm_deslogar.php">SAIR</a></li>

                </ul>

            </nav>

        </div>

    </div>

</div>

<div id="fundoAreaMenuMobile">

    <!-- fundo preto -->

</div>

<div class="d-md-none" id="areaMenuMobile">

    <div class="row mt-3">

        <div class="col text-center">

            <img src="img/logo.png" width="50%">

        </div>

    </div>

    <div class="row mt-3 border-bottom border-secondary pb-4">

        <div class="col text-center text-white">

            <span>Bem vindo <b><?php echo $nomeAdm; ?></b></span>

        </div>

    </div>

    <div class="row mt-3">

        <div class="col text-white">

            <nav>

                <ul id="listaMenuMobile" style="display: none;">

                    <li><a href="adm/novo-produto">NOVO PRODUTO</a></li>
                    <li><a href="adm/produtos-cadastrados">PRODUTOS</a></li>
                    <li><a href="adm/pedidos">PEDIDOS</a></li>
                    <li><a href="adm/configuracoes">CONFIGURAÇÕES</a></li>
                    <li><a href="https://pagseguro.uol.com.br/" target="_blank">PAGSEGURO</a></li>
                    <li><a href="php/adm_deslogar.php">SAIR</a></li>

                </ul>

            </nav>

        </div>

    </div>

</div>