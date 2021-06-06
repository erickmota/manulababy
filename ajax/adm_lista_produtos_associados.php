<?php

    include "../classes/produtos.class.php";
    $classeProdutos = new produtos();

    $id_promocao = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["id_promocao"], ENT_QUOTES, "UTF-8"));
                                      
    $funcRetornaProdutosPromocao = $classeProdutos->retorna_produtos_promocao($id_promocao);

    if($funcRetornaProdutosPromocao == false){

    ?>

        <p class="text-secondary text-center mt-4">NENHUM PRODUTO ENCONTRADO</p>

    <?php

    }else{

    ?>

        <ul class="list-group list-group-flush mt-3">

    <?php

        foreach($funcRetornaProdutosPromocao as $arrRetornoPromocao){

    ?>

        <li class="list-group-item"><div><img src="img/produtos/<?php echo $arrRetornoPromocao["foto"]; ?>" id="imgProdutosPromocao" class="me-4"> <?php echo $arrRetornoPromocao["nome"]; ?> <img src="img/remover.png" id="iconeRemoverProdutoPromocao" onclick="chamarAjaxApagar<?php echo $id_promocao ?>(<?php echo $arrRetornoPromocao["id"] ?>, <?php echo $id_promocao ?>)"></div></li>

    <?php

        }

    ?>

    </ul>

    <?php

    }

?>