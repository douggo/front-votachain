<?php 
	require_once("cabecalho.php");
	require_once("banco-votos.php");
	require_once("usuario-session.php");

	header("Access-Control-Allow-Origin: *");

	verificaUsuario();

    $id_eleicao = $_GET["id_eleicao"];
    $ids_candidatos_eleicoes = array();
    
    $api_url = 'http://localhost:8000/blocks';
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $api_url);

    $result = curl_exec($ch);
    curl_close($ch);

    $blockchain = (object) json_decode($result);
    
    $i = 0;
    foreach($blockchain as $block) {
        array_push($ids_candidatos_eleicoes, $blockchain->{$i}->{"id_eleicao"});
        $i = $i + 1;
    }

	include("rodape.php");