<?php

class Usuario{
    private $pdo;
    public $msgErro = "";
    
    public function conectar($nome,$host,$usuario,$senha){
        global $pdo;
        global $msgErro;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrar($nome,$telefone,$email,$senha,$ad){
        global $pdo;
        global $msgErro;
        // Verificar se já existe cadastro
        $sql = $pdo->prepare("SELECT id FROM usuario WHERE email = {$email}");
        // $sql->bindValue(":e",$email);
        $sql->execute();
        if ($sql->rowCount()>0) {
            return false; # Já esta cadastrado
        }
        else{
            // caso não, Cadastrar
            
            $sql = $pdo->prepare
            ("INSERT INTO usuario (nome,telefone,email,senha,ad) VALUES ('$nome','$telefone','$email','$senha','$admin')");
            // $sql->bindValue(":n",$nome);
            // $sql->bindValue(":t",$telefone);
            // $sql->bindValue(":e",$email);
            // $sql->bindValue(":s",$senha);
            $sql->execute();
            
            // $sql = "INSERT INTO usuarios (nome,telefone,email,senha) VALUES";
            // $sql .= "('$nome', '$telefone', '$email', '$senha')";
            // mysqli_query($pdo,$sql);
            return true;
        }
        
    }

    public function logar($email,$senha){
        global $pdo;
        global $msgErro;
        // Verificar se o email e senha estão cadastrados,se sim
        $sql = $pdo->prepare("SELECT id FROM usuario WHERE email like '$email' AND senha like '$senha';");
        // $sql->bindValue(":e",$email);
        // $sql->bindValue(":s",$senha);
        $sql->execute();
        if($sql->rowCount()>0){
            // Entrar no sistema (sessão)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id'] = $dado['id'];
            return true; #Logado com sucesso
        }
        else{
            return false;
        }
    }


    public function Carrinho($id_prod){
        global $pdo;
        global $msgErro;
        // Verificar se o email e senha estão cadastrados,se sim
        $sql = $pdo->prepare("SELECT id_produto FROM produtos WHERE id_produto like '$id_prod';");
        // $sql->bindValue(":e",$email);
        // $sql->bindValue(":s",$senha);
        $sql->execute();
        if($sql->rowCount()>0){
            // Entrar no sistema (sessão)
            $dado = $sql->fetch();
            $_SESSION['id_for_carrinho'] = $dado['id_produto'];
            return true; #Logado com sucesso
        }
        else{
            return false;
        }
    }
}



?>