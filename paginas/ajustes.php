<!DOCTYPE html>
<html>

<head>

    <?php
    
    include "classes/clientes.class.php";
    $classeClientes = new clientes();

    $classeClientes->emailUsuario = str_replace(array(";", "'", "/", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", base64_decode(htmlentities($_COOKIE["eu_mb"])));
    
    ?>

    <title>Ajustes - Manulá Baby</title>

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

    <link rel="stylesheet" href="css/ajustes.css">

</head>

<body>

    <div class="container-fluid">

        <?php
      
        /* Cabeçalho */
        include "phpPartes/cabecalho.php";
        
        ?>

        <div class="row justify-content-center mt-3">

            <div class="col-lg-10 pt-3 pb-3">

                <h1 class="fs-2 fw-light text-secondary">Ajustes da conta</h1>

            </div>

        </div>

        <div class="row justify-content-center mt-2">

            <div class="col-12 col-md-6 col-lg-5 mb-5 d-none d-md-block">

                <img src="img/engrenagem.png" width="80%">

            </div>

            <div class="col-12 col-md-6 col-lg-5 text-secondary">

                <span class="fs-4">Mantenha seus dados atualizados</span>

                <?php
                
                foreach($classeClientes->retorna_dados_cliente() as $arrCliente){
                
                ?>

                <div class="row mt-3">

                    <div class="col">

                        <form method="POST" action="php/atualizarNome.php">

                            <label for="inputNome" class="form-label">Seu Nome</label>
                            <input class="form-control" id="inputNome" type="text" name="nome" value="<?php echo $arrCliente["nome"]; ?>" maxlength="27" required>

                            <button type="submit" class="btn btn-success mt-3 float-end">Atualizar Nome</button>

                        </form>

                    </div>

                </div>

                <div class="row">

                    <div class="col">

                        <label for="inputNome" class="form-label">Seu Email</label>
                        <input class="form-control" id="inputNome" type="email" value="<?php echo $arrCliente["email"]; ?>" disabled>

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col">

                        <form method="POST" action="php/atualizarSenha.php">

                            <label for="inputNome" class="form-label">Seu Senha</label>
                            <input class="form-control" id="inputNome" type="password" placeholder="Senha atual" name="senha" required>
                            <input class="form-control mt-2" id="inputNome" type="password" placeholder="Nova senha" name="novaSenha" required>
                            <input class="form-control mt-2" id="inputNome" type="password" placeholder="Repita a nova senha" name="repetirNovaSenha" required>

                            <button type="submit" class="btn btn-success mt-3 float-end">Atualizar Senha</button>

                        </form>

                    </div>

                </div>

                <?php
                
                }
                
                ?>

            </div>

        </div>

        <?php
      
        /* Rodapé */
        include "phpPartes/rodape.php";
        
        ?>

    </div>

</body>

</html>