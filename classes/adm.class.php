<?php

class adm{

    public $id;
    public $nome;
    public $email;
    public $senha;

    public function verifica_existencia_adm($idUsuario, $emailUsuario, $senhaUsuario){

        include 'conexao.class.php';
        
        $idDecode = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($idUsuario)));
        $emailDecode = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($emailUsuario)));
        $senhaDecode = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($senhaUsuario)));
    
        $sql = mysqli_query($conn, "SELECT * FROM adm WHERE email='$emailDecode' AND senha='$senhaDecode' AND id=$idDecode") or die("<script>window.location='php/adm_deslogar.php';</script>");;
        $qtd = mysqli_num_rows($sql);
    
        if($qtd < 1){

            return false;
    
        }else{
    
            return true;
    
        }
    
    }

    public function retorna_slide_link(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM configuracao") or die("Erro retorna_slide_lin");
        while($linha = mysqli_fetch_assoc($sql)){

            $array[] = $linha;

        }

        return $array;

    }

    public function deslogar(){
        
        setcookie("aiu_mb", null, -1, "/");
        setcookie("aeu_mb", null, -1, "/");
        setcookie("asu_mb", null, -1, "/");
        
    }

    public function login(){

        include 'conexao.class.php';
    
        $senhaEncode = base64_encode($this->senha);
    
        $sql = mysqli_query($conn, "SELECT * FROM adm WHERE email='$this->email' and senha='$this->senha'");
        $qtd = mysqli_num_rows($sql);
        while($linha = mysqli_fetch_array($sql)) {
        
            $nome = $linha["nome"];
            $id = $linha["id"];
        
        }
        
        if($qtd == 1){
    
            $idEncode = base64_encode($id);
            $emailEncode = base64_encode($this->email);

            setcookie("aiu_mb", $idEncode, time() + 7 * (24 * 3600), "/");
            setcookie("aeu_mb", $emailEncode, time() + 7 * (24 * 3600), "/");
            setcookie("asu_mb", $senhaEncode, time() + 7 * (24 * 3600), "/");
    
        }else{
    
            setcookie("aiu_mb", null, -1, "/");
            setcookie("aeu_mb", null, -1, "/");
            setcookie("asu_mb", null, -1, "/");
    
        }

        return $qtd;

    }

    public function retorna_dados_adm_id(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM adm WHERE id=$this->id") or die("Erro retorna_dados_adm_id");
        $linha = mysqli_fetch_array($sql);

        $nome = $linha["nome"];

        return $nome;

    }

    public function sitemap($file){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE estado != 'rascunho' ORDER BY id ASC") or die("Erro sitemap");

        $arquivo = fopen($file, 'w');

        $texto = '<?xml version="1.0" encoding="UTF-8"?>'."\n"
        .'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n"
            ."\t<url>\n"
                ."\t\t<loc>https://oscarjoias.com</loc>\n"
                ."\t\t<changefreq>weekly</changefreq>\n"
                ."\t\t<priority>0.8</priority>\n"
            ."\t</url>\n"
            ."\t<url>\n"
                ."\t\t<loc>https://oscarjoias.com/loja?pg=1</loc>\n"
                ."\t\t<changefreq>weekly</changefreq>\n"
                ."\t\t<priority>0.5</priority>\n"
            ."\t</url>\n"
            ."\t<url>\n"
                ."\t\t<loc>https://oscarjoias.com/quem-somos</loc>\n"
                ."\t\t<changefreq>weekly</changefreq>\n"
                ."\t\t<priority>0.5</priority>\n"
            ."\t</url>\n"
            ."\t<url>\n"
                ."\t\t<loc>https://oscarjoias.com/contato</loc>\n"
                ."\t\t<changefreq>weekly</changefreq>\n"
                ."\t\t<priority>0.5</priority>\n"
            ."\t</url>\n";

        while($linha = mysqli_fetch_assoc($sql)){

            $nome = $linha["nome"];

            $nomeComTraco = str_replace(" ", "-", $nome);
            $transformarEmMinuscula = mb_strtolower($nomeComTraco, "UTF-8");
            $str1 = preg_replace('/[áàãâä]/ui', 'a', $transformarEmMinuscula);
            $str2 = preg_replace('/[éèêë]/ui', 'e', $str1);
            $str3 = preg_replace('/[íìîï]/ui', 'i', $str2);
            $str4 = preg_replace('/[óòõôö]/ui', 'o', $str3);
            $str5 = preg_replace('/[úùûü]/ui', 'u', $str4);
            $str6 = preg_replace('/[ç]/ui', 'c', $str5);

            $texto .= "\t<url>\n"
                        ."\t\t<loc>https://oscarjoias.com/produto/{$str6}</loc>\n"
                        ."\t\t<changefreq>weekly</changefreq>\n"
                        ."\t\t<priority>0.9</priority>\n"
                    ."\t</url>\n";

        }

        $texto .= "</urlset> ";

        fwrite($arquivo, $texto);

        fclose($arquivo);

    }

    public function atualizar_link_slide($posicao, $link){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "UPDATE configuracao SET link_slide_{$posicao}='$link'") or die("atualizar_link_slide");

    }

    public function trocar_slide($posicao, $img){

        include 'conexao.class.php';

        $tipoImg =  $img["type"];

        if($tipoImg != "image/jpeg"){

            return false;

        }else{

            $sql = mysqli_query($conn, "SELECT * FROM configuracao WHERE id=1") or die("Erro trocar_slide");
            $linha = mysqli_fetch_array($sql);

            $foto = $linha["img_slide_{$posicao}"];

            unlink("../img/slides/$foto");


            $dataHoraAtual = date("dmYHis");

            $novoCaminho = "../img/slides/{$posicao}-$dataHoraAtual.jpg";

            $novoNome = "{$posicao}-$dataHoraAtual.jpg";

            $arquivo_tmp = $img['tmp_name'];

            move_uploaded_file($arquivo_tmp, $novoCaminho);

            $sql2 = mysqli_query($conn, "UPDATE configuracao SET img_slide_{$posicao}='$novoNome'") or die("Erro upload img slide");

            return true;

        }

    }

}

?>