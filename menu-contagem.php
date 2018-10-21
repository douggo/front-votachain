<?php 
    require_once("cabecalho.php");
    require_once("banco-eleicao.php");
    require_once("usuario-session.php");

    verificaUsuario();
    $eleicoesFinalizadas = listaEleicoesFinalizadas($conexao);

    if ($eleicoesFinalizadas != null) { ?>
        <h1>Eleições que já foram finalizadas:</h1> <br>
        <div class="row text-center text-lg-left">
            <table class="table table-striped table-bordered"> <?php
                foreach($eleicoesFinalizadas as $eleicaoFinalizada) { ?>
                    <tr>
                        <td><p class="text-center"><?=$eleicaoFinalizada['descricao']?> (<?=$eleicaoFinalizada['periodo']?>)</p></td>
                        <td>
                            <a href="contagem.php?id_eleicao=<?=$eleicaoFinalizada['id']?>" class="btn btn-primary btn-block">Contagem</a>
                        </td>
                    </tr> <?php
                }  ?>
            </table>
        </div> <?php
    } else { ?>
        <h1 class="alert alert-info">Não há eleições ativas ou disponíveis, tente novamente mais tarde.</h1> <?php
    }

    include("rodape.php");