<?php 
	require_once("cabecalho.php");
    require_once("banco-votos.php");
    require_once("banco-eleicao.php");
    require_once("banco-candidato-eleicao.php");
	require_once("usuario-session.php");

    verificaUsuario();

    $id_eleicao = $_GET["id_eleicao"];
    $eleicaoAtiva = eleicaoAtiva($conexao, $id_eleicao);

    if ($eleicaoAtiva != 0) {
        $total = 0; 
        $ids_candidatos_eleicoes = array();
        $votos = array();
        
        $api_url = 'http://localhost:3001/blocks';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $api_url);
        $result = curl_exec($ch);
        curl_close($ch);

        $blockchain = (object) json_decode($result);

        foreach($blockchain as $block) {
            if ($block->{"id_eleicao"} == $id_eleicao) {
                $id = $block->{"id_candidato"};
                if (!in_array($id, $votos)) {
                    ${"candidato" . $id} = 0;
                    array_push($votos, $id);
                }
                ${"candidato" . $id}++;
            }
        }

        $eleicao = buscaEleicao($conexao, $id_eleicao);
        $candidatos = listaCandidatosEleicao($conexao, $id_eleicao);
        
        foreach($candidatos as $candidato) {
            $total = $total + ${"candidato" . $candidato["id_candidato"]};
        } ?>

        <div class="container">
            <h1 class="my-4"><?=$eleicao["descricao"]?>
                <small><?=$eleicao["periodo"]?> | <?=$total?> votos</small>
            </h1> <hr> <?php
            foreach($candidatos as $candidato) { ?>
                <div class="row">
                    <div class="col-md-7"><img class="img-fluid rounded mb-3 mb-md-0" src="<?=$candidato["foto"]?>" alt="imagem do candidato <?=$candidato["nome"]?>"></div>
                        <div class="col-md-5 text-center" style="padding-top: 130px;">
                            <h3><?=$candidato["nome"]?></h3>
                            <p><?=$candidato["numero"]?></p>
                            <p><?= ${"candidato" . $candidato["id_candidato"]} ?> 
                                votos (<?= number_format((${"candidato" . $candidato["id_candidato"]}/$total) * 100, 2) ?>%)
                            </p>
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