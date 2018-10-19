<?php
	require_once("conecta.php");

	function insereEleicao($conexao, $descricao, $periodo, $ativa) {
		$query = "insert into eleicoes (descricao, periodo, ativa) values ('{$descricao}', '{$periodo}', {$ativa})";
		$resultado = mysqli_query($conexao, $query);
		return $resultado;
	}

	function removeEleicao($conexao, $id) {
		$query = "delete from eleicoes where id = {$id}";
		return mysqli_query($conexao, $query);
	}

	function alteraEleicoes($conexao, $id, $periodo, $ativa) {
		$query = "update produtos 
					set periodo = '{$periodo}', 
						ativa = {$ativa},  
				  where id = {$id} ";
		return mysqli_query($conexao, $query);
	}
	
	function buscaEleicao($conexao, $id) {
		$query = "select * from eleicoes where id = {$id}";
		$resultado = mysqli_query($conexao, $query);
		return mysqli_fetch_assoc($resultado);
	}

	function listaEleicoes($conexao) {
		$eleicoes = array();
		$resultado = mysqli_query($conexao,"select * from eleicoes");
		while ($eleicao = mysqli_fetch_assoc($resultado)) {
			array_push($eleicoes, $eleicao);
		}
		return $eleicoes;
	}

	function listaEleicoesAtivas($conexao) {
		$eleicoes = array();
		$resultado = mysqli_query($conexao,"select * from eleicoes where ativa = 1");
		while ($eleicao = mysqli_fetch_assoc($resultado)) {
			array_push($eleicoes, $eleicao);
		}
		return $eleicoes;
	}