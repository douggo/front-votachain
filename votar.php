<?php 
    require_once("cabecalho.php");
    require_once("banco-eleicao.php");
    require_once("banco-candidato-eleicao.php");
    require_once("banco-usuario-eleicao.php");
    require_once("usuario-session.php");

    verificaUsuario();
    
    $id_eleicao = $_GET["id_eleicao"];
    $votou = jaVotou($conexao, $_SESSION["usuario_id"], $id_eleicao);

    var_dump($votou);

    if ($votou == 0) {
        $eleicao = buscaEleicao($conexao, $id_eleicao);
        $candidatos = listaCandidatosEleicao($conexao, $id_eleicao); ?>

        <div class="container">
            <h1 class="my-4"><?=$eleicao["descricao"]?>
                <small><?=$eleicao["periodo"]?></small>
            </h1> <hr> <?php
            foreach($candidatos as $candidato) { ?>
                <div class="row">
                    <div class="col-md-7"><img class="img-fluid rounded mb-3 mb-md-0" src="<?=$candidato["foto"]?>" alt="imagem do candidato <?=$candidato["nome"]?>"></div>
                        <div class="col-md-5 text-center" style="padding-top: 130px;">
                            <h3><?=$candidato["nome"]?></h3>
                            <p><?=$candidato["numero"]?></p>
                            <form action="adiciona-voto.php" method="POST">
                                <input type="hidden" name="id_usuario" value="<?=$_SESSION["usuario_id"]?>">
                                <input type="hidden" name="id_eleicao" value="<?=$id_eleicao?>">
                                <input type="hidden" name="id_candidato_eleicao" value="<?=$candidato['id']?>">
                                <button class="btn btn-success">Votar</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                </div> <?php
            } ?>
        </div> <?php
    } else {
        echo "<script> location.replace('index.php'); </script>";
        die();
    } 
     
    include("rodape.php");

