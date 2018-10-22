<?php
	require_once("cabecalho.php");
	require_once("banco-candidato-eleicao.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	$id_eleicao = $_POST['id_eleicao'];
	$id_candidato = $_POST['id_candidato'];

	removeUsuario($conexao, $id_eleicao, $id_candidato);
	header("Location: lista-candidato-eleicao.php?id_eleicao=<?=$id_eleicao?>&removido=true");
	die();