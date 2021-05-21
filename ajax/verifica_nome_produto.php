<?php

include "../classes/produtos.class.php";
$classeProdutos = new produtos();

$nome_produto = str_replace(array(";", "'", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["nome_produto"], ENT_QUOTES, "UTF-8"));

$classeProdutos->nome = $nome_produto;

$funcNomeProduto = $classeProdutos->verifica_nome_produto();

if($funcNomeProduto > 0){

    echo "Você não pode cadastrar mais de um produto com o mesmo nome!";

?>

    <script>

    var campoNome = document.getElementById("campoNomeProduto");
    var botaoEnviar = document.getElementById("botaoEnviar");

    campoNome.classList.add("is-invalid");
    botaoEnviar.setAttribute("disabled", "disabled");

    </script>

<?php

}else{

?>

    <script>

    var campoNome = document.getElementById("campoNomeProduto");

    campoNome.classList.remove("is-invalid");
    botaoEnviar.removeAttribute("disabled", "disabled");

    </script>

<?php

}

?>