<?php
	require_once("conecta.php");

	function insereEleicao($conexao, $descricao, $periodo) {
		$query = "insert into eleicoes (descricao, periodo) 
				  values ('{$descricao}', '{$periodo}')";
		$resultado = mysqli_query($conexao, $query);
		return $resultado;
	}

	function finalizaEleicao($conexao, $id) {
		$query = "update eleicoes set finalizada = 1 where id = {$id}";
		return mysqli_query($conexao, $query);
	}

	function alteraEleicao($conexao, $id, $descricao, $periodo, $ativa) {
		$query = "update eleicoes
				     set descricao = '{$descricao}', 
						 periodo = '{$periodo}',
						 ativa = {$ativa}  
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
		$resultado = mysqli_query($conexao,"select * from eleicoes where ativa = 1");
		while ($eleicao = mysqli_fetch_assoc($resultado)) {
			array_push($eleicoes, $eleicao);
		}
		return $eleicoes;
	}

	function listaEleicoesAtivas($conexao) {
		$eleicoes = array();
		$resultado = mysqli_query($conexao, "select * from eleicoes where ativa = 1 and finalizada = 0");
		while ($eleicao = mysqli_fetch_assoc($resultado)) {
			array_push($eleicoes, $eleicao);
		}
		return $eleicoes;
	}

	function listaEleicoesFinalizadas($conexao) {
		$eleicoesFinalizadas = array();
		$resultado = mysqli_query($conexao, "select * from eleicoes where ativa = 1 and finalizada = 1");
		while($eleicaoFinalizada = mysqli_fetch_assoc($resultado)) {
			array_push($eleicoesFinalizadas, $eleicaoFinalizada);
		}
		return $eleicoesFinalizadas;
	}

	function eleicaoAtiva($conexao, $id_eleicao) {
		$query = "select * from eleicoes where id = {$id_eleicao} and ativa = 1 and finalizada = 1";
		$resultado = mysqli_query($conexao, $query);
		$qtdLinhas = mysqli_num_rows($resultado);
		return $qtdLinhas;
	}