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

	if (array_key_exists("confirmacao", $_POST)) {
		$confirmacao = $_POST["confirmacao"];
	}

	if ($senha == $confirmacao) {
		if(insereUsuario($conexao, $nome, $email, $senha, $administrador)) { ?>
			<script> swal("Sucesso", "Usuário cadastrado com sucesso!", "success"); </script>
			<p class="alert alert-success">O usuário <?= $nome; ?> foi cadastrado com sucesso!</p> <?php 
		} else {
			$msg = mysqli_error($conexao); ?>
			<script> swal("Erro", "Erro ao cadastrar usuário!", "error"); </script>
			<p class="alert alert-danger">Erro ao cadastrar usuário <?= $nome; ?>: <?= $msg ?></p> <?php
		} ?>
		<a href="index.php" class="btn btn-info">Home</a> <?php
	} else { ?>
		<script> swal("Erro", "A confirmação não bate, tente novamente!", "error"); </script>
		<p class="alert alert-danger">Infelizmente a senha não bateu com a confirmação, tente novamente!</p>
		<a href="cadastro.php" class="btn btn-info">Voltar</a> <?php
	}
	
	include("rodape.php");
