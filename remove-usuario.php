<?php
	require_once("cabecalho.php");
	require_once("banco-usuario.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	$id = $_POST['id'];

	removeUsuario($conexao, $id);
	header("Location: lista-usuario.php?removido=true");
	die();