<?php

include "../classes/produtos.class.php";
$classeProdutos = new produtos();

$nome = $_POST["nome"];
$id_variacao_produto = $_POST["id_variacao_produto"];
$id_variacao_produto2 = $_POST["id_variacao_produto2"];
$id_variacao_produto3 = $_POST["id_variacao_produto3"];
$id_promocoes = $_POST["id_promocoes"];
$tamanho = $_POST["tamanho"];
$foto = $_FILES["foto"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$qtd_estoque = $_POST["qtd_estoque"];
$estado = $_POST["estado"];
$preco_promocao = $_POST["preco_promocao"];
$sexo = $_POST["sexo"];
$peso = $_POST["peso"];
$altura = $_POST["altura"];
$largura = $_POST["largura"];
$comprimento = $_POST["comprimento"];
$dias_entrega = $_POST["dias_entrega"];

$classeProdutos->nome = $nome;
$classeProdutos->descricao = $descricao;
$classeProdutos->preco = $preco;
$classeProdutos->qtd = $qtd_estoque;
$classeProdutos->estado = $estado;
$classeProdutos->tamanho = $tamanho;
$classeProdutos->id_promocao = $id_promocoes;
$classeProdutos->preco_promocao = $preco_promocao;
$classeProdutos->sexo = $sexo;
$classeProdutos->peso = $peso;
$classeProdutos->altura = $altura;
$classeProdutos->largura = $largura;
$classeProdutos->comprimento = $comprimento;
$classeProdutos->dias_entrega = $dias_entrega;

$classeProdutos->cadastrar_produto_bd($id_variacao_produto, $id_variacao_produto2, $id_variacao_produto3);

$ultimoId = $classeProdutos->retorna_ultimo_id("produtos");

$classeProdutos->tratar_img($ultimoId, $foto, 1, 1);

/* echo "{$nome}<br>{$id_variacao_produto}<br>{$id_variacao_produto2}<br>{$id_variacao_produto3}<br>{$id_promocoes}<br>{$tamanho}<br>{$foto}<br>{$descricao}<br>{$preco}<br>{$qtd_estoque}<br>{$estado}<br>{$preco_promocao}<br>{$sexo}<br>{$peso}<br>{$altura}<br>{$largura}<br>{$comprimento}<br>{$dias_entrega}<br>"; */

?>