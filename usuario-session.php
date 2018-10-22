<?php
    session_start();

    function usuarioEstaLogado() {
        return isset($_SESSION["usuario_logado"]);
    }

    function verificaUsuario() {
        if (!usuarioLogado()) {
            header("Location: index.php");
            die();
        }
    }

    function verificaAdministrador() {
        if (!usuarioAdministradorLogado()) {
            header("Location: index.php");
            die();
        }
    }

    function usuarioLogado() {
        return $_SESSION["usuario_nome"];
    }

    function usuarioAdministradorLogado() {
        return $_SESSION["usuario_administrador"];
    }

    function logaUsuario($id, $email, $nome, $administrador) {
        $_SESSION["usuario_id"] = $id;
        $_SESSION["usuario_logado"] = $email;
        $_SESSION["usuario_nome"] = $nome;
        $_SESSION["usuario_administrador"] = $administrador;
    }

    function logout() {
        session_destroy();
        session_start();
    }

