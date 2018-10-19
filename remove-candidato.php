<?php
	require_once("cabecalho.php");
	require_once("banco-candidato.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	$id = $_POST['id'];

	removeCandidato($conexao, $id);
	header("Location: lista-candidatos.php?removido=true");
	die();