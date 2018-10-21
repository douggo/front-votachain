<?php
    require_once("usuario-session.php"); ?>
    <html>
        <head>
            <title>Votachain</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="Votação em blockchain">
            <meta name="author" content="Douglas Felipe da Silva">
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/menu.css" rel="stylesheet">
            <link href="css/votar.css" rel="stylesheet">
            <link href="css/votachain.css" rel="stylesheet" />
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
        </head>
        <body>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="index.php">Votachain</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> <?php
                    if (usuarioEstaLogado()) {  ?>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto text-right">
                                <li class="nav-item active">
                                    <a class="nav-link" href="menu-votacao.php">Votar</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="menu-contagem.php">Contagens</a>
                                </li> <?php
                                if ($_SESSION["usuario_administrador"] == true) { ?>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="menu-eleicao.php">Eleições</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="menu-usuario.php">Usuários</a>
                                    </li> <?php
                                } ?>
                                <li class="nav-item active">
                                    <a class="nav-link" href="logout.php">Sair</a>
                                </li>
                            </ul>
                        </div> <?php
                    } ?>
                </div>
            </nav>
            <div class="container">
                <div class="principal">