<?php 
	require_once("cabecalho.php");
	require_once("banco-candidato-eleicao.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	$id_eleicao = $_POST["id_eleicao"];
	$id_candidato = $_POST["id_candidato"];

	if (insereCandidatoEleicao($conexao, $id_eleicao, $id_candidato) && atualizaCandidato($conexao, 1, $id_candidato)) { ?>
    	<script> swal("Sucesso", "Candidato cadastrado com sucesso", "success"); </script>
		<p class="alert alert-success">Candidato cadastrado com sucesso!</p> <?php 
    } else {
    	$msg = mysqli_error($conexao); ?>
		<script> swal("Erro", "Erro ao cadastrar candidato!", "error"); </script>
    	<p class="alert alert-danger">Candidato não foi cadastrado: <?= $msg ?></p> <?php
	} ?>

	<a href="formulario-candidato-eleicao.php?id_eleicao=<?=$id_eleicao?>" class="btn btn-info">Cadastrar mais candidatos</a>
	<a href="lista-candidato-eleicao.php?id_eleicao=<?=$id_eleicao?>" class="btn btn-info">Verificar candidatos já cadastrados</a> <?php
	
	include("rodape.php");
