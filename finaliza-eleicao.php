<?php
	require_once("cabecalho.php");
	require_once("banco-eleicao.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	$id = $_POST['id'];

	finalizaEleicao($conexao,$id);
	echo "<script> location.replace('lista-eleicoes.php?finalizada=true'); </script>";
	die();