<?php
    require_once("banco-usuario.php");
    require_once("usuario-session.php");

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $usuario = buscaUsuarioLogin($conexao, $email, $senha);

    if ($usuario == null) {
        header("Location: index.php?login=false");
    } else {
        logaUsuario($usuario["id"], $usuario["email"], $usuario["nome"], $usuario["administrador"]);
        header("Location: index.php");
    }

    die();