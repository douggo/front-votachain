<?php 
    require_once("cabecalho.php"); 
    require_once("banco-usuario.php"); ?>

    <script>
        $(document).ready(function() {
            $("#cadastrar").click(function() {
                $("#cadastrar").attr("disabled", "disabled");
            });
        });
    </script>
    <h1>Formulário de cadastro de usuários</h1> <br>
    <form action="adiciona-usuario-home.php" method="POST">
        <table class="table">
            <tr>
                <td>Nome</td>
                <td><input class="form-control" type="text" name="nome" required/></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><input class="form-control" type="email" name="email" required/></td>
            </tr>
            <tr>
                <td>Senha</td>
                <td><input class="form-control" type="password" name="senha" required/></td>
            </tr>
            <tr>
                <td>Confirme sua senha</td>
                <td><input class="form-control" type="password" name="confirmacao" required/></td>
            </tr>
            <tr>
                <td><button class="btn btn-primary" id="cadastrar" type="submit">Cadastrar</button></td>
            </tr>
        </table>
    </form> <?php 
    include("rodape.php");
