<?php 
	require_once("cabecalho.php");
	require_once("banco-usuario-eleicao.php");
	require_once("banco-votos.php");
	require_once("usuario-session.php");

	header("Access-Control-Allow-Origin: *");

	verificaUsuario();

	$id_usuario = $_POST["id_usuario"];
	$id_eleicao = $_POST["id_eleicao"];
	$id_candidato_eleicao = $_POST["id_candidato_eleicao"];

	if(insereUsuarioEleicao($conexao, $id_usuario, $id_eleicao) && insereVoto($conexao, $id_candidato_eleicao)) { 
		$api_url = 'http://localhost:8000/mine';
		$ch = curl_init($api_url);
		
		$json = array(
			'dado' => "{$id_candidato_eleicao}"
		);
		
		$jsonEncodado = json_encode($json);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonEncodado);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); ?>
		<p class="alert alert-success">Voto foi cadastrado com sucesso!</p>
		<p class="d-none"><?=curl_exec($ch);?></p> <?php 
    } else {
    	$msg = mysqli_error($conexao); ?>
    	<p class="alert alert-danger">Erro ao cadastrar voto: <?= $msg ?></p> <?php
	} ?>

	<a href="index.php" class="btn btn-info">Home</a> <?php
	
	include("rodape.php");
