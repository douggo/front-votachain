<?php
	require_once("cabecalho.php");
	require_once("banco-candidato-eleicao.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	$id_eleicao = $_POST['id_eleicao'];
	$id_candidato = $_POST['id_candidato'];

	if (removeCandidatoEleicao($conexao, $id_eleicao, $id_candidato) && atualizaCandidato($conexao, 0, $id_candidato)) {
		echo "<script>location.replace('lista-candidato-eleicao.php?id_eleicao={$id_eleicao}&removido=true'); </script>";
	} else { 
		$mgs = mysqli_error($conexao); ?>
		<script> swal("Erro", "Erro ao remover candidato!", "error"); </script>
		<p class="alert alert-danger"> <?= $msg ?> </p> <?php
	}

	die();