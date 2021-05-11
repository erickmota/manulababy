<?php

include "../classes/compra.class.php";
$classeCompra = new compra();

$frete = str_replace(",", ".", htmlentities($_POST["frete"]));
$tipo = htmlentities($_POST["tipo"]);
$dias = htmlentities($_POST["dias"]);
$precosacola = str_replace(",", ".", htmlentities($_POST["precosacola"]));
$desconto_frete = str_replace(",", ".", htmlentities($_POST["desconto_frete"]));

/* $classeCompra->idCliente = 1; */
$classeCompra->idCliente = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($_COOKIE["iu_mb"])));

/* Verificar existencia usuário */

if(!isset($classeClientes)){

    include "../classes/clientes.class.php";
    $classeClientes = new clientes();

}

if(isset($_COOKIE["iu_mb"]) && isset($_COOKIE["eu_mb"]) && isset($_COOKIE["su_mb"]) && $classeClientes->verificaExistenciaUsuario($_COOKIE["iu_mb"], $_COOKIE["eu_mb"], $_COOKIE["su_mb"]) == true){

    

}else{

    die("<script>window.location='./php/deslogar.php'</script>");

}

/* //Verificar existencia usuário */

foreach($classeCompra->retorna_dados_carrinho() as $arrCarrinho){

    $str1 = preg_replace('/[áàãâä]/ui', 'a', $arrCarrinho["nome_produto"]);
    $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
    $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
    $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
    $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
    $str6 = preg_replace('/[ç]/ui', 'c', $str5);

    $produto[] = ["nome" => $str6, "preco" => floatval($arrCarrinho["preco"]), "qtd" => $arrCarrinho["qtd_pedido"], "id_produtos" => $arrCarrinho["id_produto"]];

}

if($frete > 0){

    @$produto[] = ["nome" => "Frete - {$tipo} - {$dias} dias", "preco" => floatval($frete), "qtd" => "1", "id_produtos" => "0"];

}

/* @$produto[] = ["nome" => "Desconto", "preco" => -50, "qtd" => "1", "id_produtos" => "0"]; */

$idCliente = base64_decode($_COOKIE["iu_mb"]);

$dataHoraAtual = date("dmYHis");

$codReferencia = "{$idCliente}{$dataHoraAtual}";

$varcodigo = $classeCompra->pagseguro($produto, $codReferencia, $desconto_frete);

/* $i = 0;
$totalCFrete = 0.0;

while($i < count($produto)){

    $precoProdutoQtd = $produto[$i]["preco"] * $produto[$i]["qtd"];

    $totalCFrete += floatval ($precoProdutoQtd);

    $i++;

} */

$totalCFrete = $precosacola + $frete;

?>

<input type="hidden" id="hiddenCodigo" value="<?php echo $varcodigo; ?>">

<input type="hidden" id="hiddenReferencia" value="<?php echo $codReferencia; ?>">

Total c/frete R$<?php echo number_format($totalCFrete, 2, ",", "."); ?>