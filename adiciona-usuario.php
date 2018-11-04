<?php 
	require_once("cabecalho.php");
	require_once("banco-usuario.php");
	require_once("usuario-session.php");

	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];

	if (array_key_exists("administrador", $_POST)) {
		$administrador = "true";
	} else {
		$administrador = "false";
	}

	if(insereUsuario($conexao, $nome, $email, $senha, $administrador)) { ?>
		<script> swal("Sucesso", "Usuário cadastrado com sucesso!", "success"); </script>
		<p class="alert alert-success">O usuário <?= $nome; ?> foi cadastrado com sucesso!</p> <?php 
	} else {
		$msg = mysqli_error($conexao); ?>
		<script> swal("Erro", "Erro ao cadastrar usuário!", "error"); </script>
		<p class="alert alert-danger">Erro ao cadastrar usuário <?= $nome; ?>: <?= $msg ?></p> <?php
	} ?>

	<a href="formulario-usuario.php" class="btn btn-info">Adicionar mais usuários</a>
	<a href="lista-usuarios.php" class="btn btn-info">Verificar usuários</a> <?php
	
	include("rodape.php");
