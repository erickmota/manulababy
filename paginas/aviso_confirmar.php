<!DOCTYPE html>
<html>

<head>

    <?php
    
    $explode = explode("/", $_GET["url"]);
    
    /* Iniciando classe */
    include "classes/email.class.php";
    $classeEmail = new email();

    include "classes/clientes.class.php";
    $classeClientes = new clientes();

    $email = $_GET["e"];

    $classeClientes->emailUsuario = $email;

    if($classeClientes->verifica_existencia_email() > 0){

        if($classeClientes->retorna_estado_cliente() == "pendente"){

            /* ... */

        }else{

            header("Location: ./");
            die();

        }

    }else{

        header("Location: ./");
        die();

    }
    
    ?>

    <title>Manulá Baby</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    <style>

        #fundoCorpoTela{

            width: 100vw;
            height: 100vh;
            display: table;

        }

        #conteudoCorpo{

            vertical-align: middle;
            display: table-cell;

        }

    </style>

</head>

<body>

    <?php
    
    $classeEmail->confirmarcao_cadastro_cliente($email, "Confirmação Manula Baby");
    
    ?>

    <div class="container-fluid">

        <div class="row justify-content-center" id="fundoCorpoTela">

            <div class="col" id="conteudoCorpo">

                <div class="row">

                    <div class="col text-center">

                        <img src="img/logo.png" width="230px">

                    </div>

                </div>

                <div class="row mt-4">

                    <div class="col text-center text-secondary">

                        <p>

                            Obrigado por se cadastrar no Manulá Baby, para sua segurança, acabamos de enviar um e-mail para <b>"<?php echo $email; ?>"</b>.<br>
                            Por favor, verifique sua caixa de entrada e sua caixa de spans, e clique no link para confirmação.

                        </p>

                        <p>

                            Caso não consiga achar o e-mail, <a onclick="window.location.reload()" class="text-info" style="cursor:pointer">clique aqui</a>, e te enviaremos um novo e-mail de confirmação.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>