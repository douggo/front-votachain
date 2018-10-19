<?php 
    require_once("cabecalho.php"); 
    require_once("banco-candidato.php");
    require_once("usuario-session.php");

    verificaAdministrador();
?>

<h1>Formulário de cadastro de candidatos</h1> <br>
<form action="adiciona-candidato.php" method="POST" enctype="multipart/form-data">
    <table class="table">
        <tr>
            <td>Nome</td>
            <td><input class="form-control" type="text" name="nome" /></td>
        </tr>
        <tr>
            <td>Número</td>
            <td><input class="form-control" type="number" name="numero" /></td>
        </tr>
        <tr>
            <td>Foto de Perfil</td>
            <td><input class="form-control" type="file" name="foto" accept=".jpg" /></td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>
