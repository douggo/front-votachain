<?php
	require_once("conecta.php");

	function insereUsuarioEleicao($conexao, $id_usuario, $id_eleicao) {
		$query = "insert into usuario_eleicao (id_usuario, id_eleicao) values ({$id_usuario}, {$id_eleicao})";
		$resultado = mysqli_query($conexao, $query);
		return $resultado;
	}

	function eleicoesVotadas($conexao, $id_usuario) {
		$eleicoesVotadas = array();
		$query = "select * from usuario_eleicao where id_usuario = {$id_usuario}";
		$resultado = mysqli_query($conexao, $query);
		while($eleicaoVotada = mysqli_fetch_assoc($resultado)) {
			array_push($eleicoesVotadas, $eleicaoVotada);
		}
		return $eleicoesVotadas;
	}

	function jaVotou($conexao, $id_usuario, $id_eleicao) {
		$query = "select * from usuario_eleicao 
					 where id_usuario = {$id_usuario} and 
					       id_eleicao = {$id_eleicao}";
		$resultado = mysqli_query($conexao, $query);
		return $resultado;
	}