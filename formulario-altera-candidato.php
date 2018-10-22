<?php 
    require_once("cabecalho.php"); 
    require_once("banco-candidato.php");
    require_once("usuario-session.php");

    verificaAdministrador();

    $id = $_GET['id'];
    $candidato = buscaCandidato($conexao, $id);
?>

<h1>Alterando candidato</h1>
<form action="altera-candidato.php" method="POST">
    <input type="hidden" name="id" value="<?=$candidato['id']?>" />
    <table class="table">
        <tr>
            <td>Nome</td>
            <td><input class="form-control" type="text" name="nome" value="<?=$candidato['nome']?>" /></td>
        </tr>
        <tr>
            <td>Número</td>
            <td><input class="form-control" type="number" name="numero" value="<?=$candidato['numero']?>" /></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td><input class="form-control" type="file" name="foto" accept=".jpg" value="<?=$candidato['foto']?>" /></td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit">Alterar</button></td>
        </tr>
    </table>
</form>

<?php
    include("rodape.php");
