<?php 
	require_once("cabecalho.php");
	require_once("banco-usuario-eleicao.php");
	require_once("banco-votos.php");
	require_once("usuario-session.php");

	verificaUsuario();

	$id_usuario = $_POST["id_usuario"];
	$id_eleicao = $_POST["id_eleicao"];
	$id_candidato_eleicao = $_POST["id_candidato_eleicao"];

	if(insereUsuarioEleicao($conexao, $id_usuario, $id_eleicao) && insereVoto($conexao, $id_candidato_eleicao)) { ?>
		<script>
			$(document).ready(function() {
				var dadoJson = '{ "dado": "' + <?=$id_candidato_eleicao?> + '" }';
				console.log(dadoJson);

				/*$.ajax({
					method: "POST",
					url: "https://whispering-refuge-53254.herokuapp.com/mine",
					data: dadoJson,
					dataType: "json"
				}).done(function(msg) {
					alert("Data Saved: " + msg);
				});*/

			});
		</script>
		<p class="alert alert-success">Voto foi cadastrado com sucesso!</p> <?php 
    } else {
    	$msg = mysqli_error($conexao); ?>
    	<p class="alert alert-danger">Erro ao cadastrar voto: <?= $msg ?></p> <?php
	} ?>

	<a href="index.php" class="btn btn-info">Home</a> <?php
	
	include("rodape.php");
