<?php
	require_once("cabecalho.php");
	require_once("banco-usuario.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	$id = $_POST['id'];

	desativaUsuario($conexao, $id);
	echo "<script> location.replace('lista-usuarios.php?desativado=true'); </script>";
	die();