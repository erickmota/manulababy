<?php

include "../classes/email.class.php";
$classeEmail = new email();

$nome = htmlentities($_POST["nome"]);
$email = htmlentities($_POST["email"]);
$assunto = htmlentities($_POST["assunto"]);
$texto = htmlentities($_POST["texto"]);

$classeEmail->contato($email, $nome, $assunto, $texto);

?>

<script>

    window.alert("Obrigado, iremos responder seu e-mail o mais breve possível!");
    window.location="../contato";

</script>