<?php 
    require_once("cabecalho.php"); 
    require_once("banco-eleicao.php");
    require_once("usuario-session.php");

    verificaAdministrador();

    $id = $_GET['id'];
    $eleicao = buscaEleicao($conexao, $id);

    if ($eleicao["ativa"]) {
        $ativa = "checked='checked'";
    } else {
        $ativa = "";
    }
?>

<h1>Alterando eleição</h1>
<form action="altera-eleicao.php" method="POST">
    <input type="hidden" name="id" value="<?=$eleicao['id']?>" />
    <table class="table">
        <tr>
            <td>Descricao</td>
            <td><input class="form-control" type="text" name="descricao" value="<?=$eleicao['descricao']?>" /></td>
        </tr>
        <tr>
            <td>Período</td>
            <td><input class="form-control" type="text" name="periodo" value="<?=$eleicao['periodo']?>" /></td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="ativa" <?=$ativa?> value="true"> Ativa
            </td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit">Alterar</button></td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>
