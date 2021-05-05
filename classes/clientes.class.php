<?php

class clientes{

    public $emailUsuario;
    public $senhaUsuario;
    public $idUsuario;
    public $nomeUsuario;

    public function login(){

        include 'conexao.class.php';
    
        $senhaEncode = base64_encode($this->senhaUsuario);
    
        $sql = mysqli_query($conn, "SELECT * FROM cliente WHERE email='$this->emailUsuario' and senha='$senhaEncode'");
        $qtd = mysqli_num_rows($sql);
        while($linha = mysqli_fetch_array($sql)) {
        
            $nome = $linha["nome"];
            $id = $linha["id"];
            $estado = $linha["estado"];
        
        }
        
        if($qtd == 1){
    
            if($estado == "pendente"){
                
                die ("<script>window.location='../aviso-confirmar?e={$this->emailUsuario}'</script>");
                
            }else{
    
                $idEncode = base64_encode($id);
                $emailEncode = base64_encode($this->emailUsuario);
    
                setcookie("iu_mb", $idEncode, time() + 7 * (24 * 3600), "/");
                setcookie("eu_mb", $emailEncode, time() + 7 * (24 * 3600), "/");
                setcookie("su_mb", $senhaEncode, time() + 7 * (24 * 3600), "/");
                setcookie("cookies_Manula_baby", "aceitos", time() + 7 * (24 * 3600), "/");
    
            }
    
        }else{
    
            setcookie("iu_mb", null, -1, "/");
            setcookie("eu_mb", null, -1, "/");
            setcookie("su_mb", null, -1, "/");
    
        }

        return $qtd;
    
    }

    public function verificaExistenciaUsuario($idUsuario, $emailUsuario, $senhaUsuario){

        include 'conexao.class.php';
    
        $idDecode = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($idUsuario)));
        $emailDecode = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($emailUsuario)));
        $senhaDecode = str_replace(array(";", "'", "--", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($senhaUsuario));

        $sql = mysqli_query($conn, "SELECT * FROM cliente WHERE email='$emailDecode' AND senha='$senhaUsuario' AND id='$idDecode'") or die("<script>window.location='php/deslogar.php';</script>");;
        $qtd = mysqli_num_rows($sql);
    
        if($qtd < 1){

            return false;
    
        }else{
    
            return true;
    
        }
    
    }

    public function verifica_existencia_email(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT email FROM cliente WHERE email='$this->emailUsuario'") or die("Erro ao verificar e-mail cliente");
        $qtd = mysqli_num_rows($sql);

        return $qtd;

    }

    public function cadastrar($estadoUsuario){

        include 'conexao.class.php';

        $senhaEncode = base64_encode($this->senhaUsuario);

        setcookie("cookies_Manula_baby", "aceitos", time() + 7 * (24 * 3600), "/");

        $sql = mysqli_query($conn, "INSERT INTO cliente (nome, email, senha, estado) VALUES ('$this->nomeUsuario', '$this->emailUsuario', '$senhaEncode', '$estadoUsuario')") or die("Erro ao cadastrar usuario");

    }

    public function retorna_estado_cliente(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "SELECT estado FROM cliente WHERE email='$this->emailUsuario'") or die("Erro ao retornar estado do cliente");
        $linha = mysqli_fetch_assoc($sql);

        $estado = $linha["estado"];

        return $estado;

    }

    public function mudar_status_cliente(){

        include 'conexao.class.php';

        $sql = mysqli_query($conn, "UPDATE cliente SET estado='confirmado' WHERE email='$this->emailUsuario'") or die("Erro ao mudar estado do cliente");

    }

    public function deslogar(){
        
        setcookie("iu_mb", null, -1, "/");
        setcookie("eu_mb", null, -1, "/");
        setcookie("su_mb", null, -1, "/");
        
    }

}

?>