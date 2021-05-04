<?php

include "../classes/produtos.class.php";
$classeProdutos = new produtos();

$pg = $_POST["pg"];

$vMin = $_POST["vMin"];

$vMax = $_POST["vMax"];

$sexo = $_POST["sexo"];

$ordenacao = $_POST["ordenacao"];

$tamanho = $_POST["tamanho"];

$categoria = $_POST["categoria"];

$busca = $_POST["busca"];

$funcRetornaProdutos = $classeProdutos->retorna_lista_produtos($pg, $vMin, $vMax, $categoria, $sexo, $ordenacao, $busca, $tamanho);

if($funcRetornaProdutos[2] > 0){

foreach($funcRetornaProdutos[0] as $arrProdutos){

    $nomeComTraco = str_replace(" ", "-", $arrProdutos["nome"]);
    $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
    $trataInjection = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $transformarEmMinuscula);
    $str1 = preg_replace('/[áàãâä]/ui', 'a', $trataInjection);
    $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
    $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
    $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
    $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
    $str6 = preg_replace('/[ç]/ui', 'c', $str5);

?>

<div class="col-12 col-sm-6 col-md-4">

    <div onclick="window.location='produto/<?php echo $str6; ?>'" class="boxProdutos text-center" onmouseover="mudarItemAdd()" onmouseout="mudarItemRemove()">

        <img src="img/produtos/<?php echo $arrProdutos["foto"]; ?>" id="fotoAnelProdutos">

        <p id="nomeItem" class="card-text mt-1 pt-2"><?php echo $arrProdutos["nome"]; ?></p>

        <span id="precoAntigo" class="text-decoration-line-through text-secondary "><?php echo $arrProdutos["preco_promocao"]; ?></span>
        <h5 class="card-title fs-4"  id="precoPromocao"><?php echo $arrProdutos["preco"]; ?></h5>

    </div>

</div>

<?php

}

}else{

?>

<script>

$("#botaoMostrar").css("display", "none");
$("#issoETudo").removeClass("d-none");
    
</script>

<?php

}

?>