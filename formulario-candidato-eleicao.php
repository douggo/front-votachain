<?php 
    require_once("cabecalho.php"); 
    require_once("banco-candidato-eleicao.php");
    require_once("banco-eleicao.php");
    require_once("banco-candidato.php");
    require_once("usuario-session.php");

    verificaAdministrador();

    $id_eleicao = $_GET["id_eleicao"];
    $eleicao = buscaEleicao($conexao, $id_eleicao);
    $candidatos = listaCandidatos($conexao);
?>

<h1>Eleição: <?=$eleicao["descricao"]?> | <?=$eleicao["periodo"]?> </h1> <br>
<form action="adiciona-candidato-eleicao.php" method="POST">
    <table class="table">
        <tr class="d-none">
            <td><input type="hidden" name="id_eleicao" value="<?=$id_eleicao?>"><td>
        </tr>
        <tr>
            <td>Candidatos</td>
            <td>
                <select name="id_candidato" class="form-control"> <?php
                    foreach($candidatos as $candidato) { ?>
                        <option value="<?=$candidato['id']?>">
                            <?=$candidato['nome']?>
                        </option> <?php
                    } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
        </tr>
    </table>
</form>

<?php 
    include("rodape.php");
