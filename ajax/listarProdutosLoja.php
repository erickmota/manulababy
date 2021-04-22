<?php

include "../classes/produtos.class.php";
$classesProdutos = new produtos();

$pg = $_POST["pg"];

foreach($classesProdutos->retorna_lista_produtos($pg)[0] as $arrProdutos){

?>

<div class="col-12 col-sm-6 col-md-4">

    <div onclick="window.location='produto/'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">

        <img src="img/produtos/<?php echo $arrProdutos["foto"]; ?>" id="fotoAnelProdutos">

        <p id="nomeItem" class="card-text mt-1 pt-2"><?php echo $arrProdutos["nome"]; ?></p>

        <span id="precoAntigo" class="text-decoration-line-through text-secondary "><?php echo $arrProdutos["preco_promocao"]; ?></span>
        <h5 class="card-title fs-4"  id="precoPromocao"><?php echo $arrProdutos["preco"]; ?></h5>

    </div>

</div>

<?php

}

?>