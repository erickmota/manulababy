<?php

class email{

    public function confirmarcao_cadastro_cliente($emailDestino, $assunto){

        $emailOrigem = "contato@oscarjoias.com"; /* Precisa Mudar */

        $emailCompactado = base64_encode($emailDestino);

        $corpo = "<h1>Manulá Baby</h1>"
        ."<p>Obrigado por se cadstrar no Manulá Baby, toda a equipe deseja boas compras!<br>"
        ."Por favor, clique no link abaixo para confirmar seu cadastro, caso você não seja responsável pelo cadastro, favor desconsiderar.</p>"
        ."<p><a href='http://manulababy.erickmota.com/confirmacao-email?e={$emailCompactado}'>http://manulababy.erickmota.com/confirmacao-email?e={$emailCompactado}</a></p>";

        $header = "MIME-Version: 1.0\n";
        $header .= "Content-type: text/html; charset=utf-8\n";
        $header .= "from: $emailOrigem\n";

        @mail ($emailDestino,  $assunto, $corpo, $header);

    }

    public function contato($emailOrigem, $nome, $assunto, $texto){

        $emailDestino = "contato@oscarjoias.com";

        $corpo = "<h1>Oscar Jóias</h1>"
        ."<p>De: <b>{$nome}</b></p>"
        ."<p>$texto</p>";

        $header = "MIME-Version: 1.0\n";
        $header .= "Content-type: text/html; charset=utf-8\n";
        $header .= "from: $emailOrigem\n";

        @mail ($emailDestino,  $assunto, $corpo, $header);

    }

    public function lembrar_senha($emailDestino, $nome, $senha){

        $emailOrigem = "contato@oscarjoias.com";

        $assunto = "Lembrete de senha";

        $corpo = "<h1>Oscar Jóias</h1>"
        ."<p>Olá {$nome}, sua senha é {$senha}</p>";

        $header = "MIME-Version: 1.0\n";
        $header .= "Content-type: text/html; charset=utf-8\n";
        $header .= "from: $emailOrigem\n";

        @mail ($emailDestino,  $assunto, $corpo, $header);

    }

}

?>