<?php

include "../classes/clientes.class.php";
$classeClientes = new clientes();

$email = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["email"]));

$classeClientes->emailUsuario = $email;

$resultEmail = $classeClientes->verifica_existencia_email();

if($resultEmail > 0){

?><span class="text-info">Esse e-mail já existe em nossa base de dados, tente clicar em esqueci a senha.</span><?php /* Precisa deixar com essa formatação pro javascript não reconhecer espaço */

}else{

?>

    Use o seu melhor e-mail

<?php
    
}

?>