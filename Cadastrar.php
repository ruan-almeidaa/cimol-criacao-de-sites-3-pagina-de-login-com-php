<?php

if(
isset($_POST['nome']) && !empty($_POST['nome']) && 
isset($_POST['email']) && !empty($_POST['email']) && 
isset($_POST['senha']) && !empty($_POST['senha']) && 
isset($_POST['confirmaSenha']) && !empty($_POST['confirmaSenha'])
){

    require 'Conexao.php';
    require 'Usuario.php';

    $u = new Usuario();
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes(md5($_POST['senha']));
    $confirmaSenha = addslashes(md5($_POST['confirmaSenha']));

    if($senha===$confirmaSenha){

        try{
            $u->cadastrar($nome, $email, $senha);
            $u->logar($email, $senha);
            header("location: paginaDeUsuario.html");

        }catch(Exception $e){
            header("location: index.html");
        }
        
    }else{ ?>
        <script>
                window.alert("As senha devem ser iguais!");
                window.location.href = "cadastro.html";
        </script>
    <?php
    }

}else{
    ?>
        <script>
            window.alert("Todos os campos devem ser preenchidos");
            window.location.href = "index.html";
        </script>
    <?php
}

?>