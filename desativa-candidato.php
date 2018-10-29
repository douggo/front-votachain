<?php
	require_once("cabecalho.php");
	require_once("banco-candidato.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	$id = $_POST['id'];

	desativaCandidato($conexao, $id);
	echo "<script> location.replace('lista-candidatos.php?desativado=true'); </script>";
	die();