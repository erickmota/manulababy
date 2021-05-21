<?php

class produtos{

    public $id;
    public $nome;
    public $descricao;
    public $preco;
    public $qtd;
    public $estado;
    public $tamanho;
    public $id_promocao;
    public $preco_promocao;
    public $sexo;
    public $peso;
    public $altura;
    public $largura;
    public $comprimento;
    public $dias_entrega;

    /* Tratar imagem do produto e enviar a pasta de destino */
    public function tratar_img($id_produto, $img, $ordemEnvio, $capaGaleria){

        include 'conexao.class.php';

        $pasta = "../img/produtos/";

        $dataHoraAtual = date("dmYHis");

        move_uploaded_file($img["tmp_name"], $pasta.$ordemEnvio.$dataHoraAtual."-".$id_produto.".jpg");

        $orgFile =  $pasta.$ordemEnvio.$dataHoraAtual."-".$id_produto.".jpg";
        
        list($largura, $altura) = getimagesize($orgFile);

        $novaImg = imagecreatefromjpeg($orgFile);

        if($largura >= 1500){
            
            $novaLargura = $largura*0.25;
            $novaAltura = $altura*0.25;
            
        }elseif($largura < 1500 && $largura > 1000){
            
            $novaLargura = $largura*0.50;
            $novaAltura = $altura*0.50;
            
        }else{
            
            $novaLargura = $largura;
            $novaAltura = $altura;
            
        }

        $trucolor = imagecreatetruecolor($novaLargura, $novaAltura);

        $novaI = imagecopyresampled($trucolor, $novaImg, 0, 0, 0, 0, $novaLargura, $novaAltura, $largura, $altura);

        $nova = imagejpeg($trucolor, $pasta.$ordemEnvio.$dataHoraAtual."-".$id_produto.".jpg", 80);

        $novoNome = $ordemEnvio.$dataHoraAtual."-".$id_produto.".jpg";

        if($capaGaleria == 1){

            $sql = mysqli_query($conn, "UPDATE produtos SET foto='$novoNome' WHERE id=$id_produto") or die ("Erro ao Upar a imagem de capa");

        }else{

            $sql = mysqli_query($conn, "INSERT INTO galeria (id_produtos, caminho) VALUES ($id_produto, '$novoNome')") or die("Erro ao mandar galeria ao BD");

        }

    }

    /* Enviar produto para o BD */
    public function cadastrar_produto_bd($variacaoAdicional1, $variacaoAdicional2, $variacaoAdicional3){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "INSERT INTO produtos (id_variacao_produto, id_variacao_produto2, id_variacao_produto3, id_promocoes, tamanho, nome, foto, descricao, preco, qtd_estoque, estado, preco_promocao, sexo, peso, altura, largura, comprimento, dias_entrega) VALUES ($variacaoAdicional1, $variacaoAdicional2, $variacaoAdicional3, $this->id_promocao, '$this->tamanho', '$this->nome', NULL, '$this->descricao', $this->preco, $this->qtd, '$this->estado', $this->preco_promocao, '$this->sexo', '$this->peso', '$this->altura', '$this->largura', '$this->comprimento', $this->dias_entrega)") or die("Erro ao cadastrar o produto");

        echo "{$variacaoAdicional1}<br>{$variacaoAdicional2}<br>{$variacaoAdicional3}<br>{$this->id_promocao}<br>{$this->tamanho}<br>{$this->nome}<br>{$this->descricao}<br>{$this->preco}<br>{$this->qtd}<br>{$this->estado}<br>{$this->preco_promocao}<br>{$this->sexo}<br>{$this->peso}<br>{$this->altura}<br>{$this->largura}<br>{$this->comprimento}<br>{$this->dias_entrega}";

    }

    /* Retorna ultimo id de uma tabela */
    public function retorna_ultimo_id($tabela){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT id FROM $tabela ORDER BY id DESC") or die("Erro ao retornar ultimo ID");
        $linha = mysqli_fetch_array($sql);

        return $linha["id"];

    }

    public function retorna_lista_produtos($pg, $vMinimo, $vMaximo, $categoria, $sexo, $ordenacao, $busca, $tamanho){

        include 'conexao.class.php';

        /* Sexo */
        if($sexo == "tud"){

            $sexoSql = "sexo!='null'";

        }else if($sexo == "fem"){

            $sexoSql = "sexo='feminino'";

        }else if($sexo == "masc"){

            $sexoSql = "sexo='masculino'";

        }

        /* Ordenação */
        if($ordenacao != "SE"){

            if($ordenacao == "nome"){

                $ordFiltro = "nome";
                $tipoOrd = "ASC";
    
            }else if($ordenacao == "ua"){
    
                $ordFiltro = "id";
                $tipoOrd = "DESC";
    
            }else if($ordenacao == "pa"){
    
                $ordFiltro = "id";
                $tipoOrd = "ASC";
    
            }else if($ordenacao == "menorp"){
    
                $ordFiltro = "preco";
                $tipoOrd = "ASC";
    
            }else if($ordenacao == "maiorp"){
    
                $ordFiltro = "preco";
                $tipoOrd = "DESC";
    
            }

        }else{

            $ordFiltro = "id";
            $tipoOrd = "DESC";

        }

        /* Tamanho */

        $arrTamanho = explode(",", $tamanho);

        /* Quantidade de produtos por página */
        $qtdProdutosPg = 6;

        $somaPg = ($pg * $qtdProdutosPg) - $qtdProdutosPg;

        if($tamanho != "SE"){

            $i = 0;

            if($categoria != "SE"){

                while($i <= 10){

                    if(isset($arrTamanho[$i])){
    
                        if($i == 0){
    
                            $arrTamanhoFiltro[$i] = "produtos.tamanho LIKE '%".$arrTamanho[$i]."%'";
    
                        }else{
    
                            $arrTamanhoFiltro[$i] = "OR produtos.tamanho LIKE '%".$arrTamanho[$i]."%'";
    
                        }
    
                    }else{
    
                        $arrTamanhoFiltro[$i] = "";
    
                    }
    
                    $i++;
    
                }

            }else{

                while($i <= 10){

                    if(isset($arrTamanho[$i])){
    
                        if($i == 0){
    
                            $arrTamanhoFiltro[$i] = "tamanho LIKE '%".$arrTamanho[$i]."%'";
    
                        }else{
    
                            $arrTamanhoFiltro[$i] = "OR tamanho LIKE '%".$arrTamanho[$i]."%'";
    
                        }
    
                    }else{
    
                        $arrTamanhoFiltro[$i] = "";
    
                    }
    
                    $i++;
    
                }

            }

        }

        if($busca != "SE"){

            /* Apenas Busca */
            if($vMinimo == "SE" && $sexo == "SE" && $tamanho == "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci ORDER BY $ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci ORDER BY $ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Apenas Valores */
            else if($vMinimo != "SE" && $sexo == "SE" && $tamanho == "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND preco BETWEEN $vMinimo AND $vMaximo ORDER BY $ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND preco BETWEEN $vMinimo AND $vMaximo ORDER BY $ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Apenas Sexo */
            else if($vMinimo == "SE" && $sexo != "SE" && $tamanho == "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND $sexoSql ORDER BY $ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND $sexoSql ORDER BY $ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Apenas tamanho */
            else if($vMinimo == "SE" && $sexo == "SE" && $tamanho != "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY $ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY $ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Valores, sexo */
            else if($vMinimo != "SE" && $sexo != "SE" && $tamanho == "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND preco BETWEEN $vMinimo AND $vMaximo AND $sexoSql ORDER BY $ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND preco BETWEEN $vMinimo AND $vMaximo AND $sexoSql ORDER BY $ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Valores, tamanho */
            else if($vMinimo != "SE" && $sexo == "SE" && $tamanho != "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND preco BETWEEN $vMinimo AND $vMaximo AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY $ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND preco BETWEEN $vMinimo AND $vMaximo AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY $ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Valores, sexo, tamanho */
            else if($vMinimo != "SE" && $sexo != "SE" && $tamanho != "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND preco BETWEEN $vMinimo AND $vMaximo AND $sexoSql AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY $ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND preco BETWEEN $vMinimo AND $vMaximo AND $sexoSql AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY $ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Sexo, tamanho */
            else if($vMinimo == "SE" && $sexo != "SE" && $tamanho != "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND $sexoSql AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY $ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE nome LIKE '%$busca%' collate utf8_general_ci AND $sexoSql AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY $ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }

        }else if($categoria != "SE"){

            $catSemTraco = str_replace("-", " ", $categoria);

            $sqlCat = mysqli_query($conn, "SELECT * FROM categoria WHERE nome='$catSemTraco' collate utf8_general_ci") or die("Erro ao retornar dados categoria");
            $linhaCat = mysqli_fetch_array($sqlCat);

            $id_categoria = $linhaCat["id"];

            /* Apenas categoria */
            if($vMinimo == "SE" && $sexo == "SE" && $tamanho == "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 ORDER BY produtos.$ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos-cat");
                $sql2 = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 ORDER BY produtos.$ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos-cat2");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Apenas Valores */
            else if($vMinimo != "SE" && $sexo == "SE" && $tamanho == "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 AND produtos.preco BETWEEN $vMinimo AND $vMaximo ORDER BY produtos.$ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 AND produtos.preco BETWEEN $vMinimo AND $vMaximo ORDER BY produtos.$ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Apenas Sexo */
            else if($vMinimo == "SE" && $sexo != "SE" && $tamanho == "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 AND produtos.$sexoSql ORDER BY produtos.$ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 AND produtos.$sexoSql ORDER BY produtos.$ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Apenas tamanho */
            else if($vMinimo == "SE" && $sexo == "SE" && $tamanho != "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY produtos.$ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY produtos.$ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Valores, sexo */
            else if($vMinimo != "SE" && $sexo != "SE" && $tamanho == "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 AND produtos.preco BETWEEN $vMinimo AND $vMaximo AND produtos.$sexoSql ORDER BY produtos.$ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 AND produtos.preco BETWEEN $vMinimo AND $vMaximo AND produtos.$sexoSql ORDER BY produtos.$ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Valores, tamanho */
            else if($vMinimo != "SE" && $sexo == "SE" && $tamanho != "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 AND produtos.preco BETWEEN $vMinimo AND $vMaximo AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY produtos.$ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 AND produtos.preco BETWEEN $vMinimo AND $vMaximo AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY produtos.$ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Valores, sexo, tamanho */
            else if($vMinimo != "SE" && $sexo != "SE" && $tamanho != "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 AND produtos.preco BETWEEN $vMinimo AND $vMaximo AND produtos.$sexoSql AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY produtos.$ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 AND produtos.preco BETWEEN $vMinimo AND $vMaximo AND produtos.$sexoSql AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY produtos.$ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Sexo, tamanho */
            else if($vMinimo == "SE" && $sexo != "SE" && $tamanho != "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 AND produtos.$sexoSql AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY produtos.$ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM categoria_produto INNER JOIN produtos ON categoria_produto.id_produtos=produtos.id WHERE categoria_produto.id_categoria=$id_categoria AND produtos.estado='publicado-disponivel' AND produtos.qtd_estoque > 0 AND produtos.$sexoSql AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY produtos.$ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }

        }else{

            /* Apenas Valores */
            if($vMinimo != "SE" && $sexo == "SE" && $tamanho == "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE preco BETWEEN $vMinimo AND $vMaximo ORDER BY $ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE preco BETWEEN $vMinimo AND $vMaximo ORDER BY $ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Apenas Sexo */
            else if($vMinimo == "SE" && $sexo != "SE" && $tamanho == "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE $sexoSql ORDER BY $ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE $sexoSql ORDER BY $ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Apenas tamanho */
            else if($vMinimo == "SE" && $sexo == "SE" && $tamanho != "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY $ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY $ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Valores, sexo */
            else if($vMinimo != "SE" && $sexo != "SE" && $tamanho == "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE preco BETWEEN $vMinimo AND $vMaximo AND $sexoSql ORDER BY $ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE preco BETWEEN $vMinimo AND $vMaximo AND $sexoSql ORDER BY $ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Valores, tamanho */
            else if($vMinimo != "SE" && $sexo == "SE" && $tamanho != "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE preco BETWEEN $vMinimo AND $vMaximo AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY $ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE preco BETWEEN $vMinimo AND $vMaximo AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY $ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Valores, sexo, tamanho */
            else if($vMinimo != "SE" && $sexo != "SE" && $tamanho != "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE preco BETWEEN $vMinimo AND $vMaximo AND $sexoSql AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY $ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE preco BETWEEN $vMinimo AND $vMaximo AND $sexoSql AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY $ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }
            /* Sexo, tamanho */
            else if($vMinimo == "SE" && $sexo != "SE" && $tamanho != "SE"){

                $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE $sexoSql AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY $ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE $sexoSql AND ($arrTamanhoFiltro[0] $arrTamanhoFiltro[1] $arrTamanhoFiltro[2] $arrTamanhoFiltro[3] $arrTamanhoFiltro[4] $arrTamanhoFiltro[5] $arrTamanhoFiltro[6] $arrTamanhoFiltro[7] $arrTamanhoFiltro[8] $arrTamanhoFiltro[9] $arrTamanhoFiltro[10]) ORDER BY $ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }else{

                $sql = mysqli_query($conn, "SELECT * FROM produtos ORDER BY $ordFiltro $tipoOrd LIMIT $somaPg, $qtdProdutosPg") or die("Erro retorna_lista_produtos");
                $sql2 = mysqli_query($conn, "SELECT * FROM produtos ORDER BY $ordFiltro $tipoOrd") or die("Erro retorna_lista_produtos");
                $qtd = mysqli_num_rows($sql);
                $qtd2 = mysqli_num_rows($sql2);

            }

        }

        while($linha = mysqli_fetch_assoc($sql)){

            $array[] = $linha;

        }

        if($qtd2 > 0){

            @$retorno = [$array, $qtd2, $qtd];

            return $retorno;

        }else{

            return false;

        }

        /* return false; */

    }

    public function verificarExisenciaProduto($tabela, $comparador){

        include 'conexao.class.php';

        $nomeSemTraco = str_replace("-", " ", $this->comparar);

        $sql = mysqli_query($conn, "SELECT * FROM $tabela WHERE $comparador='$nomeSemTraco' collate utf8_general_ci AND estado!='rascunho'") or die("Erro Verifica produto");
        $qtdSql = mysqli_num_rows($sql);

        if($qtdSql < 1){

            return false;

        }else{

            return true;

        }

    }

    public function verificarExisenciaPromocao($tabela, $comparador, $nomePromocao){

        include 'conexao.class.php';

        $nomeSemTraco = str_replace("-", " ", $nomePromocao);

        $sql = mysqli_query($conn, "SELECT * FROM $tabela WHERE $comparador='$nomeSemTraco' collate utf8_general_ci") or die("Erro");
        $qtdSql = mysqli_num_rows($sql);

        if($qtdSql < 1){

            return false;

        }else{

            return true;

        }

    }

    public function retorna_dados_promocao($nomePromocao){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM promocoes WHERE nome='$nomePromocao'") or die("erro");
        while($row = mysqli_fetch_assoc($sql)){

            $array[] = $row;

        }

        return $array;

    }

    public function retorna_produtos_promocao($id_promocao){

        include 'conexao.class.php';
        
        $sql = mysqli_query($conn, "SELECT * FROM promocoes_produtos INNER JOIN produtos ON promocoes_produtos.id_produtos=produtos.id WHERE promocoes_produtos.id_promocoes=$id_promocao") or die("Erro");
        $qtdSql = mysqli_num_rows($sql);
        while($row = mysqli_fetch_assoc($sql)){

            $array[] = $row;

        }

        if($qtdSql < 1){

            return false;

        }else{

            return $array;

        }

    }

    public function retorna_lista_promocoes(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT nome FROM promocoes") or die("Erro");
        $qtdSql = mysqli_num_rows($sql);
        while($row = mysqli_fetch_assoc($sql)){

            $array[] = $row;

        }

        if($qtdSql < 1){

            return false;

        }else{

            return $array;

        }

    }

    /* Retorna Dados do produto pelo nome */
    public function retorna_dados_pelo_nome(){

        include 'conexao.class.php';

        $nomeSemTraco = str_replace("-", " ", $this->nome);

        $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE nome='$nomeSemTraco' collate utf8_general_ci") or die("Erro retornar dados produto");
        while($linha = mysqli_fetch_assoc($sql)){
            
            $array[] = $linha;
            
        }

        return $array;

    }

    /* Retornar Imagens da galeria */
    public function retorna_img_galeria($idProduto){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM galeria INNER JOIN produtos ON galeria.id_produtos=produtos.id WHERE produtos.id=$idProduto ORDER BY galeria.caminho ASC") or die("Erro retornar galeria");
        $qtd = mysqli_num_rows($sql);
        while($linha = mysqli_fetch_assoc($sql)){
            
            $array[] = $linha;
            
        }

        if($qtd < 1){

            return false;

        }else{

            return $array;

        }

    }

    /* Retorna as opções das variações */
    public function retorna_opcoes_variacoes($idVariacao){

        include 'conexao.class.php';

        if($idVariacao == null){

            return ["texto_cliente" => 1];

        }else{

            $sql = mysqli_query($conn, "SELECT * FROM variacao_produtos WHERE id=$idVariacao") or die("Erro retorna op variações");
            while($linha = mysqli_fetch_assoc($sql)){
                
                $array[] = $linha;
                
            }

            return $array;

        }

    }

    /* Formata as opções das variações */
    public function formatar_op_variacoes($opVariacao){

        $opIndividual = explode(",", $opVariacao);

        return $opIndividual;

    }

    public function retorna_dados_produto_pelo_id(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE id=$this->id") or die("Erro retorna_dados_produto_pelo_id");
        while($linha = mysqli_fetch_assoc($sql)){

            $array[] = $linha;

        }

        return $array;

    }

    public function retorna_categorias(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM categoria ORDER BY id ASC") or die("Erro ao retornar categorias");
        while($linha = mysqli_fetch_assoc($sql)){
            
            $array[] = $linha;
            
        }

        return $array;

    }

    public function retorna_produtos_promocionais($sexo){

        include 'conexao.class.php';

        if($sexo == "masculino"){

            $sql = mysqli_query($conn, "SELECT * FROM  produtos WHERE preco_promocao!='' AND estado='publicado-disponivel' AND qtd_estoque > 0 AND sexo='masculino' ORDER BY id DESC LIMIT 16") or die("Erro ao retornar produtos promocionais");

        }else if($sexo == "feminino"){

            $sql = mysqli_query($conn, "SELECT * FROM  produtos WHERE preco_promocao!='' AND estado='publicado-disponivel' AND qtd_estoque > 0 AND sexo='feminino' ORDER BY id DESC LIMIT 16") or die("Erro ao retornar produtos promocionais");

        }

        /* $sql = mysqli_query($conn, "SELECT * FROM  produtos WHERE preco_promocao!='' AND estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY id DESC LIMIT 16") or die("Erro ao retornar produtos promocionais"); */
        while($linha = mysqli_fetch_assoc($sql)){
            
            $array[] = $linha;
            
        }

        return $array;

    }

    public function retorna_lista_produtos_home($qtd){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE estado='publicado-disponivel' AND qtd_estoque > 0 ORDER BY id DESC LIMIT $qtd") or die("Erro retornar produtos para a loja");
        while($linha = mysqli_fetch_assoc($sql)){
            
            $array[] = $linha;
            
        }

        return $array;

    }

    public function retorna_nome_categoria_produto($id_produto){

        include 'conexao.class.php';

        if($id_produto == 0){

            $sql = mysqli_query($conn, "SELECT id FROM categoria ORDER BY RAND() LIMIT 5") or die("Erro ao retornar nome categoria");

        }else{

            $sql = mysqli_query($conn, "SELECT categoria.id AS id FROM categoria INNER JOIN categoria_produto ON categoria.id=categoria_produto.id_categoria WHERE categoria_produto.id_produtos=$id_produto LIMIT 5") or die("Erro ao retornar nome categoria");

        }
        
        $linha = mysqli_fetch_assoc($sql);

        $nome = $linha["id"];

        return $nome;

    }

    public function retorna_produtos_relacionados($id_categoria, $id_produto_atual){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM produtos INNER JOIN categoria_produto ON produtos.id=categoria_produto.id_produtos WHERE categoria_produto.id_categoria=$id_categoria AND categoria_produto.id_produtos!=$id_produto_atual AND produtos.qtd_estoque > 0 AND produtos.estado='publicado-disponivel'") or die("Erro ao retornar produtos relacionados");
        while($linha = mysqli_fetch_assoc($sql)){
            
            $array[] = $linha;
            
        }

        return $array;

    }

    public function verifica_nome_produto(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT id FROM produtos WHERE nome='$this->nome' collate utf8_general_ci") or die("Erro verifica_nome_produto");
        $qtd = mysqli_num_rows($sql);

        return $qtd;

    }

    public function retorna_variacoes(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT nome FROM variacao_produtos") or die("Erro retorna_variacoes");
        while($linha = mysqli_fetch_assoc($sql)){

            $array[] = $linha;

        }

        return $array;

    }

    public function retorna_op_variacoes($nome, $propriedade){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT $propriedade FROM variacao_produtos WHERE nome='$nome'") or die("Erro retorna_variacoes");
        $linha = mysqli_fetch_assoc($sql);

        $retorno = $linha["$propriedade"];

        return $retorno;

    }

    public function cadastrar_variacao_personalizada($nomeVariacao, $opVariacao, $texto_cliente){

        include 'conexao.class.php';

        $sql1 = mysqli_query($conn, "SELECT id FROM variacao_produtos WHERE nome='$nomeVariacao'") or die("Erro verificar se existe variação personalizada");
        $qtd1 = mysqli_num_rows($sql1);
        $linha1 = mysqli_fetch_assoc($sql1);

        if($qtd1 < 1){

            $tirarEspacos = str_replace(", ", ",", $opVariacao);
            $tirarEspacos2 = str_replace(", ", ",", $tirarEspacos);

            $sql = mysqli_query($conn, "INSERT INTO variacao_produtos (nome, opcoes, texto_cliente) VALUES ('$nomeVariacao', '$tirarEspacos2', '$texto_cliente')") or die("Erro variação personalizada");

            $sql2 = mysqli_query($conn, "SELECT id FROM variacao_produtos ORDER BY id DESC") or die("Erro ao retornar ultimo ID");
            $linha2 = mysqli_fetch_array($sql2);

            return $linha2["id"];

        }else{

            return $linha1["id"];

        }

    }

    public function categoria($categoria, $ultimoIdCategoria, $ultimoIdProduto){

        include 'conexao.class.php';

        $tirarEspacos = str_replace(", ", ",", $categoria);
        $tirarEspacos2 = str_replace(", ", ",", $tirarEspacos);
        $transformarEmMinuscula = mb_strtolower($tirarEspacos2, "UTF-8");

        $categoriaIndividual = explode(",", $transformarEmMinuscula);
        $qtdCategoria = count($categoriaIndividual);

        $i = 0;

        while($i < $qtdCategoria){

            $sql = mysqli_query($conn, "SELECT id FROM categoria WHERE nome='$categoriaIndividual[$i]'") or die("Erro nome categoria");
            $qtdResultado = mysqli_num_rows($sql);

            if($qtdResultado < 1){

                $sql2 = mysqli_query($conn, "INSERT INTO categoria (id, nome) VALUES ($ultimoIdCategoria + ($i + 1), '$categoriaIndividual[$i]')") or die("Erro adicionar categoria");

                $sql3 = mysqli_query($conn, "INSERT INTO categoria_produto (id_categoria, id_produtos) VALUES ($ultimoIdCategoria + ($i + 1), $ultimoIdProduto)") or die("Erro ao relacionar produtos x categoria");

            }else{

                $linhaCategoriaSelecionada = mysqli_fetch_array($sql);
                $idCategoriaSelecionada = $linhaCategoriaSelecionada["id"];

                $sql2 = mysqli_query($conn, "INSERT INTO categoria_produto (id_categoria, id_produtos) VALUES ($idCategoriaSelecionada, $ultimoIdProduto)") or die("Erro buscar id Categoria");

            }

            $i++;

        }

    }
    
}

?>