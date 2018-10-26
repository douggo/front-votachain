<?php 
	require_once("cabecalho.php");
	require_once("banco-eleicao.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	$id = $_POST["id"];
	$descricao = $_POST["descricao"];
	$periodo = $_POST["periodo"];

	if (array_key_exists("ativa", $_POST)) {
		$ativa = "true";
	} else {
		$ativa = "false";
	}

	if(alteraEleicao($conexao, $id, $descricao, $periodo, $ativa)) { ?>
    	<p class="alert alert-success">A eleição <?= $descricao; ?> foi alterada com sucesso!</p> <?php 
    } else {
    	$msg = mysqli_error($conexao); ?>
    	<p class="alert alert-danger">A eleição <?= $descricao; ?> não foi alterada: <?= $msg ?></p> <?php
	} ?>

	<a href="lista-eleicoes.php" class="btn btn-info">Verificar eleições cadastradas</a> <?php
	
	include("rodape.php");
