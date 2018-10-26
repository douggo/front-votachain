<?php
    require_once("cabecalho.php"); 
    
    if (usuarioEstaLogado()) {  ?>
        <h1 class="mt-5">Bem-vindo ao Votachain, <h3 class="text-primary"><?=usuarioLogado()?></h3></h1>  <?php
    } else { 
        if (array_key_exists("login", $_GET) && $_GET['login'] == "false") { ?>
            <p class="alert-danger">Usuário ou senha inválidos, tente novamente!</p> <?php
        } ?>
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div class="login-box col-md-12">
                            <form id="login-form" class="form" action="login.php" method="POST">
                                <h3 class="text-center text-info">Login</h3> <br>
                                <div class="form-group">
                                    <label for="email" class="text-info">E-mail:</label><br>
                                    <input type="email" class="form-control" name="email" >
                                </div>
                                <div class="form-group">
                                    <label for="senha" class="text-info">Senha:</label><br>
                                    <input type="password" class="form-control" name="senha">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info btn-md">Entrar</button>
                                </div> <br>
                                <p id="registrar">Novo na Votachain? Clique <a href="cadastro.php">aqui</a> para se cadastrar</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <?php
    }
    
    include("rodape.php");
