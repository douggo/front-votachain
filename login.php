<?php
    require_once("banco-usuario.php");
    require_once("usuario-session.php");

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $usuario = buscaUsuarioLogin($conexao, $email, $senha);

    if ($usuario == null) {
        echo "<script> location.replace('index.php?login=false'); </script>";
    } else {
        logaUsuario($usuario["id"], $usuario["email"], $usuario["nome"], $usuario["administrador"]);
        echo "<script> location.replace('index.php'); </script>";
    }

    die();