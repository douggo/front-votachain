<?php
	require_once("cabecalho.php");
	require_once("banco-eleicao.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	$id = $_POST['id'];

	removeEleicao($conexao,$id);
	header("Location: lista-eleicoes.php?removido=true");
	die();