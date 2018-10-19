<?php 
	require_once("cabecalho.php");
	require_once("banco-usuario.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	$id = $_POST["id"];
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];

	if (array_key_exists("administrador", $_POST)) {
		$administrador = "true";
	} else {
		$administrador = "false";
	}

	if (array_key_exists("ativo", $_POST)) {
		$ativo = "true";
	} else {
		$ativo = "false";
	}

	if(alteraUsuario($conexao, $id, $nome, $email, $senha, $administrador, $ativo)) { ?>
    	<p class="text-success">O usuário <?= $nome; ?> foi alterado com sucesso!</p> <?php 
    } else {
    	$msg = mysqli_error($conexao); ?>
    	<p class="text-danger">O usuário <?= $nome; ?> não foi alterado: <?= $msg ?></p> <?php
	} ?>

	<a href="lista-usuarios.php" class="btn btn-info">Verificar usuários cadastrados</a>
	<a href="formulario-usuario.php" class="btn btn-info">Cadastrar mais usuários</a> <?php
	
	include("rodape.php");
?>
