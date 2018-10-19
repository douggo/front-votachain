<?php 
	require_once("cabecalho.php");
	require_once("banco-eleicao.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	$descricao = $_POST["descricao"];
	$periodo = $_POST["periodo"];

	if (array_key_exists("ativa", $_POST)) {
		$ativa = "true";
	} else {
		$ativa = "false";
	}

	if(insereEleicao($conexao, $descricao, $periodo, $ativa)) { ?>
    	<p class="alert alert-success">A eleição <?= $descricao; ?> foi cadastrada com sucesso!</p> <?php 
    } else {
    	$msg = mysqli_error($conexao); ?>
    	<p class="alert alert-danger">A eleição <?= $descricao; ?> não foi cadastrada: <?= $msg ?></p> <?php
	} ?>

	<a href="formulario-eleicao.php" class="btn btn-info">Cadastrar mais eleições?</a>
	<a href="lista-eleicoes.php" class="btn btn-info">Verificar eleições cadastradas</a> <?php
	
	include("rodape.php");
