<?php
    require 'Conexao.php';
    class Usuario{
        public $id;
        public $nome;
        public $email;
        public $senha;

        public function logar($email, $senha){
            global $pdo;

            $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
            $sql = $pdo->prepare($sql);
            $sql -> bindValue("email", $email);
            $sql -> bindValue("senha", $senha);
            $sql -> execute();

            if($sql->rowCount() >0){
                $dado = $sql->fetch();
                unset($dado['senha']);
                $_SESSION['usuario'] = $dado;
                return true;
            }
            else{

            }
        }

        public function cadastrar($nome, $email, $senha){

            global $pdo;
            
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
            $sql = $pdo->prepare($sql);
            $sql -> bindValue("nome", $nome);
            $sql -> bindValue("email", $email);
            $sql -> bindValue("senha", $senha);
            $sql -> execute();    
        }
    }
?>
