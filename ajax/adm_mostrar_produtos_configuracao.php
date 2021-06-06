<?php

include "../classes/produtos.class.php";
$classeProdutos = new produtos();

$nome = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["nome"], ENT_QUOTES, "UTF-8"));
$id_promocao = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["id_promocao"], ENT_QUOTES, "UTF-8"));

$funcRetornoProdutos = $classeProdutos->buscar_produtos_ajax($nome);

if($funcRetornoProdutos == false || $nome == ""){

?>

<p class="text-center text-secondary mt-3">NENHUM PRODUTO ENCONTRADO</p>

<?php

}else{

?>

<ul class="list-group mt-3">

    <?php
    
    foreach($funcRetornoProdutos as $arrProdutos){
    
    ?>

    <li class="list-group-item bg-light"><div><img src="img/produtos/<?php echo $arrProdutos["foto"]; ?>" id="imgProdutosPromocao" class="me-4"> <?php echo $arrProdutos["nome"]; ?> <img src="img/add.png" onclick="chamarAjax<?php echo $id_promocao ?>(<?php echo $arrProdutos["id"]; ?>, <?php echo $id_promocao; ?>)" id="iconeRemoverProdutoPromocao"></div></li>

    <?php
    
    }
    
    ?>

</ul>

<?php

}

?>