<?php

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){

    require 'Conexao.php';
    require 'Usuario.php';

    $u = new Usuario();
    $email = addslashes($_POST['email']);
    $senha = addslashes(md5($_POST['senha']));

    if($u->logar($email, $senha) == true){

        if(isset($_SESSION['usuario'])){
            session_start();
            header("location: paginaDeUsuario.html");
        }
        else{ 
            
            ?>
                <script>
                    window.alert("Desculpe, houve um erro ao iniciar sua sessão, por favor tente novamente");
                    window.location.href = "index.html";
                </script>
            <?php
        }

    }else{
        ?>
            <script>
                window.alert("Desculpe, houve um erro ao efetuar seu login, confirme os dados e tente novamente");
                window.location.href = "index.html";
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