<?php 
    require_once("cabecalho.php"); 
    require_once("banco-eleicao.php");
    require_once("usuario-session.php");

    verificaAdministrador();
?>

<h1>Formulário de cadastro de eleições</h1>
<form action="adiciona-eleicao.php" method="POST">
    <table class="table">
        <tr>
            <td>Descrição</td> <br>
            <td><input class="form-control" type="text" name="descricao" /></td>
        </tr>
        <tr>
            <td>Período</td>
            <td><input class="form-control" type="text" name="periodo" /></td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="ativa" value="true"> Ativa
            </td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
        </tr>
    </table>
</form>

<?php 
    include("rodape.php");
