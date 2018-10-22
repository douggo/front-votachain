<?php 
    require_once("cabecalho.php");
    require_once("banco-eleicao.php");
    require_once("banco-candidato-eleicao.php");
    require_once("usuario-session.php");

    verificaAdministrador();

    if (array_key_exists("removido", $_GET) && $_GET['removido'] == "true") { ?>
		<p class="text-success">Candidato removido com sucesso</p> <?php
    } 

    $id_eleicao = $_GET["id_eleicao"];
    $eleicao = buscaEleicao($conexao, $id_eleicao);
    $candidatos = listaCandidatosEleicao($conexao, $id_eleicao);

    if ($candidatos == null) {
        header("Location: formulario-candidato-eleicao.php?id_eleicao=$id_eleicao");
        die();
    } else { ?>
        <h1>Eleição: <?=$eleicao["descricao"]?> | <?=$eleicao["periodo"]?></h1>
        <table class="table table-striped table-bordered"> 
            <tr>
                <td><strong>Nome</strong></td>
                <td><strong>Número</strong></td>
                <td><strong>Remover</strong></td>
            </tr> <?php
            foreach($candidatos as $candidato) { ?>
                <tr>
                    <td><?=$candidato['nome']?></td>
                    <td><?=$candidato['numero']?></td>
                    <td>
                        <form action="remove-candidato-eleicao.php" method="POST">
                            <input type="hidden" name="id_eleicao" value="<?=$candidato['id_eleicao']?>">
                            <input type="hidden" name="id_candidato" value="<?=$candidato['id']?>">
                            <button class="btn btn-danger">remover</button>
                        </form>
                    </td>
                </tr> <?php
            } ?>
	    </table>
        <a href="formulario-candidato-eleicao.php?id_eleicao=<?=$id_eleicao?>" class="btn btn-info">Cadastrar mais candidatos?</a> <?php
    }    

    include("rodape.php");