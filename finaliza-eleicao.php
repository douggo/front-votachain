<?php
	require_once("cabecalho.php");
	require_once("banco-eleicao.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	$id = $_POST['id'];

	finalizaEleicao($conexao,$id);
	header("Location: lista-eleicoes.php?finalizada=true");
	die();