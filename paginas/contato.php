<!DOCTYPE html>
<html>

<head>

    <title>Contato - Oscar Jóias</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Geral -->
    <meta name="description" content="Entre em contato com a equipe Oscar Jóias.">
    <meta name="author" content="erickmota.com">
    <meta name="robots" content="index">

    <!-- Google+ / Schema.org -->
    <meta itemprop="name" content="Oscar Jóias">
    <meta itemprop="description" content="Entre em contato com a equipe Oscar Jóias.">
    <meta itemprop="image" content="img/apresentacao.jpg">

    <!-- Open Graph Facebook -->
    <meta property="og:title" content="Contato - Oscar Jóias">
    <meta property="og:description" content="Entre em contato com a equipe Oscar Jóias."/>
    <meta property="og:site_name" content="Oscar Jóias"/>
    <meta property="og:type" content="website">
    <meta property="og:image" content="img/apresentacao.jpg">

    <!-- Twitter -->
    <meta name="twitter:title" content="Oscar Jóias">
    <meta name="twitter:description" content="Entre em contato com a equipe Oscar Jóias.">
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

    <link rel="stylesheet" href="css/contato.css">

</head>

<body>

    <div class="container-fluid">

        <?php
      
        /* Cabeçalho */
        include "phpPartes/cabecalho.php";
        
        ?>

        <div class="row justify-content-center">

            <div class="col-lg-10 pt-3">

                <h1 class="fs-2 fw-light text-secondary">Entre em contato</h1>

            </div>

        </div>

        <div class="row justify-content-center mt-4 mb-5">

            <div class="col-12 col-lg-5 text-secondary">

                <form method="POST" action="php/contato.php">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Seu nome</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nome" required>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Seu e-mail</label>
                      <input type="email" class="form-control" id="exampleInputPassword1" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Assunto</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="assunto" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Texto</label>
                        <textarea class="form-control" rows="4" name="texto" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success float-end">Enviar</button>
                </form>

            </div>

            <div class="col-12 col-lg-5 d-none d-md-block">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.2472179285905!2d-47.47916748538668!3d-23.451545463430303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c5f5a7921a088d%3A0x72267f6a83df3b71!2sR.%20Michel%20Chicri%20Maluf%2C%20215%20-%20Parque%20das%20Laranjeiras%2C%20Sorocaba%20-%20SP%2C%2018077-370!5e0!3m2!1sen!2sbr!4v1615353841131!5m2!1sen!2sbr" width="100%" height="460px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

            </div>

            <div class="col-12 col-lg-5 mt-4 d-block d-md-none">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.2472179285905!2d-47.47916748538668!3d-23.451545463430303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c5f5a7921a088d%3A0x72267f6a83df3b71!2sR.%20Michel%20Chicri%20Maluf%2C%20215%20-%20Parque%20das%20Laranjeiras%2C%20Sorocaba%20-%20SP%2C%2018077-370!5e0!3m2!1sen!2sbr!4v1615353841131!5m2!1sen!2sbr" width="100%" height="350px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

            </div>

        </div>

        <?php
      
        /* Rodapé */
        include "phpPartes/rodape.php";
        
        ?>

    </div>

</body>

</html>