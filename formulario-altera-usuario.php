<?php 
    require_once("cabecalho.php"); 
    require_once("banco-usuario.php");
    require_once("usuario-session.php");

    verificaAdministrador();
    
    $id = $_GET['id'];
    $usuario = buscaUsuario($conexao, $id);

    if ($usuario["ativo"]) {
        $ativo = "checked='checked'";
    } else {
        $ativo = "";
    }

    if ($usuario["administrador"]) {
        $administrador = "checked='checked'";
    } else {
        $administrador = "";
    }
?>

<h1>Alterando usuário</h1>
<form action="altera-usuario.php" method="POST">
    <input type="hidden" name="id" value="<?=$usuario['id']?>" />
    <table class="table">
        <tr>
            <td>Nome</td>
            <td><input class="form-control" type="text" name="nome" value="<?=$usuario['nome']?>" /></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input class="form-control" type="email" name="email" value="<?=$usuario['email']?>" /></td>
        </tr>

        <tr>
            <td>Senha</td>
            <td><input class="form-control" type="password" name="senha" value="<?=$usuario['senha']?>"></td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="administrador" <?=$administrador?> value="true"> Administrador <br>
                <input type="checkbox" name="ativo" <?=$ativo?> value="true"> Ativo
            </td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit">Alterar</button></td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>
