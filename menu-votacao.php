<?php 
    require_once("cabecalho.php");
    require_once("banco-eleicao.php");
    require_once("banco-usuario-eleicao.php");
    require_once("usuario-session.php");

    verificaUsuario();

    $eleicoes = listaEleicoesAtivas($conexao); 
    $eleicoesVotadas = eleicoesVotadas($conexao, $_SESSION["usuario_id"]);
    
    foreach($eleicoes as $eleicao) {
        foreach($eleicoesVotadas as $eleicaoVotada) {
            if ($eleicaoVotada["id_eleicao"] == $eleicao["id"]) {
                array_shift($eleicoes);
            }
        }
    }

    if ($eleicoes != null) { ?>
        <h1>Eleições que você ainda pode votar:</h1> <br>
        <div class="row text-center text-lg-left">
            <table class="table table-striped table-bordered"> <?php
                foreach($eleicoes as $eleicao) { ?>
                    <tr>
                        <td><p class="text-center"><?=$eleicao['descricao']?> (<?=$eleicao['periodo']?>)</p></td>
                        <td>
                            <a href="votar.php?id_eleicao=<?=$eleicao['id']?>" class="btn btn-primary btn-block">Votar</a>
                        </td>
                    </tr> <?php
                }  ?>
            </table>
        </div> <?php
    } else { ?>
        <h1 class="alert alert-info">Não há eleições disponíveis, tente novamente mais tarde.</h1> <?php
    }

    include("rodape.php");