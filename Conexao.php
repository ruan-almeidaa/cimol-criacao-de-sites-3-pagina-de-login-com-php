<?php

    $localhost = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "sites3";

    global $pdo;

    try{
        $pdo = new  PDO("mysql:dbname=".$banco."; host=".$localhost, $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "erro: ".$e->getMessage();
        exit;

    }
?>