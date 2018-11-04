<?php 
    require_once("cabecalho.php"); 
    require_once("banco-usuario.php");
    require_once("usuario-session.php");

    verificaAdministrador();
?>

<h1>Formulário de cadastro de usuários</h1> <br>
<form action="adiciona-usuario.php" method="POST">
    <table class="table">
        <tr>
            <td>Nome</td>
            <td><input class="form-control" type="text" name="nome"/></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input class="form-control" type="email" name="email"/></td>
        </tr>
        <tr>
            <td>Senha</td>
            <td><input class="form-control" type="password" name="senha"/></td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="administrador" value="true"> Administrador
            </td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>
