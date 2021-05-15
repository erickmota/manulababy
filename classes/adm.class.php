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

}

?>