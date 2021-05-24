<?php

    include "../classes/produtos.class.php";

    /* Verificando existencia do ADM */

    if(!isset($classeAdm)){

        include "../classes/adm.class.php";
        $classeAdm = new adm();

    }

    if(isset($_COOKIE["aiu_mb"]) && isset($_COOKIE["aeu_mb"]) && isset($_COOKIE["asu_mb"]) && $classeAdm->verifica_existencia_adm($_COOKIE["aiu_mb"], $_COOKIE["aeu_mb"], $_COOKIE["asu_mb"]) == true){

        

    }else{

        die("<script>window.location='../php/adm_deslogar.php'</script>");

    }

    /* // Verificando existencia do ADM */

    /* $qtdGaleria = $_POST["qtd-galeria"]; */
    $qtdGaleria = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["qtd-galeria"]));

    if($qtdGaleria == ""){

        $qtdGaleria = 0;

    }

    /* $nome = $_POST["nome"]; */
    $nome = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["nome"], ENT_QUOTES, "UTF-8"));
    $capa = $_FILES["capa"];

    $i = 0;

    while($i < $qtdGaleria){

        $i_plus = $i + 1;

        $galeria[$i] = $_FILES["img-{$i_plus}"];

        $i++;

    }

    /* $descricao = $_POST["descricao"]; */
    $descricao = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["descricao"], ENT_QUOTES, "UTF-8"));
    /* $preco = $_POST["preco"]; */
    $preco = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["preco"]));
    /* $qtd = $_POST["qtd"]; */
    $qtd = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["qtd"]));
    /* $estado = $_POST["estado"]; */
    $estado = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["estado"]));
    /* $variacao = $_POST["variacao"]; */
    $tamanho = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["tamanhos"]));

    /* @$novaVariacao1 = $_POST["novaVariacao1"]; */
    @$novaVariacao1 = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["novaVariacao1"], ENT_QUOTES, "UTF-8"));
    /* @$textoVariacao1 = $_POST["texto-variacao1"]; */
    @$textoVariacao1 = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["texto-variacao1"], ENT_QUOTES, "UTF-8"));
    /* @$opNovaVariacao1 = $_POST["opNovaVariacao1"]; */
    @$opNovaVariacao1 = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["opNovaVariacao1"], ENT_QUOTES, "UTF-8"));
    /* @$novaVariacao2 = $_POST["novaVariacao2"]; */
    @$novaVariacao2 = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["novaVariacao2"], ENT_QUOTES, "UTF-8"));
    /* @$textoVariacao2 = $_POST["texto-variacao2"]; */
    @$textoVariacao2 = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["texto-variacao2"], ENT_QUOTES, "UTF-8"));
    /* @$opNovaVariacao2 = $_POST["opNovaVariacao2"]; */
    @$opNovaVariacao2 = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["opNovaVariacao2"], ENT_QUOTES, "UTF-8"));
    /* @$novaVariacao3 = $_POST["novaVariacao3"]; */
    @$novaVariacao3 = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["novaVariacao3"], ENT_QUOTES, "UTF-8"));
    /* @$textoVariacao3 = $_POST["texto-variacao3"]; */
    @$textoVariacao3 = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["texto-variacao3"], ENT_QUOTES, "UTF-8"));
    /* @$opNovaVariacao3 = $_POST["opNovaVariacao3"]; */
    @$opNovaVariacao3 = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["opNovaVariacao3"], ENT_QUOTES, "UTF-8"));

    /* $categoria = mb_strtolower($_POST["categoria"], "UTF-8"); */
    $categoria = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars(mb_strtolower($_POST["categoria"], "UTF-8"), ENT_QUOTES, "UTF-8"));

    $promocao = $_POST["promocao"];

    if($promocao == ""){

        $promocao = 'null';

    }

    /* $tipo = $_POST["tipo"]; */
    $sexo = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["sexo"]));

    /* $peso = $_POST["peso"]; */
    $peso = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["peso"]));
    /* $altura = $_POST["altura"]; */
    $altura = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["altura"]));
    /* $largura = $_POST["largura"]; */
    $largura = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["largura"]));
    /* $comprimento = $_POST["comprimento"]; */
    $comprimento = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["comprimento"]));

    /* $dias_entrega = $_POST["dias-entrega"]; */
    $dias_entrega = str_replace(array(";", "'", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["dias-entrega"]));

    if($dias_entrega == ""){

        $dias_entrega = 0;

    }

    /* echo "{$maximo_caracteres} {$promocao} {$dias_entrega}"; */

    $classeImg = new produtos();

    $classeImg->nome = $nome;
    $classeImg->descricao = $descricao;
    $classeImg->preco = $preco;
    $classeImg->qtd = $qtd;
    $classeImg->estado = $estado;
    $classeImg->tamanho = $tamanho;
    $classeImg->preco_promocao = $promocao;
    $classeImg->sexo = $sexo;
    $classeImg->peso = $peso;
    $classeImg->altura = $altura;
    $classeImg->largura = $largura;
    $classeImg->comprimento = $comprimento;
    $classeImg->dias_entrega = $dias_entrega;

    if($novaVariacao1 != "" || $novaVariacao2 != "" || $novaVariacao3 != ""){

        if($novaVariacao1 != ""){

            $funcVariacao1 = $classeImg->cadastrar_variacao_personalizada($novaVariacao1, $opNovaVariacao1, $textoVariacao1);

            $varia1 = $funcVariacao1;

        }else{

            $varia1 = 'null';

        }

        if($novaVariacao2 != ""){

            $funcVariacao2 = $classeImg->cadastrar_variacao_personalizada($novaVariacao2, $opNovaVariacao2, $textoVariacao2);

            $varia2 = $funcVariacao2;

        }else{

            $varia2 = 'null';

        }

        if($novaVariacao3 != ""){

            $funcVariacao3 = $classeImg->cadastrar_variacao_personalizada($novaVariacao3, $opNovaVariacao3, $textoVariacao3);

            $varia3 = $funcVariacao3;

        }else{

            $varia3 = 'null';

        }

        $classeImg->cadastrar_produto_bd($varia1, $varia2, $varia3);

    }else{

        $classeImg->cadastrar_produto_bd('null', 'null', 'null');

    }

    $ultimoId = $classeImg->retorna_ultimo_id("produtos");

    $ultimoIdCategoria = $classeImg->retorna_ultimo_id("categoria");

    $classeImg->categoria($categoria, $ultimoIdCategoria, $ultimoId);

    $classeImg->tratar_img($ultimoId, $capa, 1, 1);

    $i_img = 0;

    while($i_img < $qtdGaleria){

        $classeImg->tratar_img($ultimoId, $galeria[$i_img], $i_img + 2, 2);

        $i_img++;

    }

    $classeAdm->sitemap("../sitemap.xml");

?>

<script>

    window.alert("Produto cadastrado com sucesso!");
    window.location="../adm/novo-produto";

</script>