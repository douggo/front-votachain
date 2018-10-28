<?php
	require_once("conecta.php");
	
	function insereCandidato($conexao, $nome, $numero, $arquivo) {
		$query = "insert into candidatos (nome, numero, foto) values ('{$nome}', {$numero}, '{$arquivo}')";
		$resultado = mysqli_query($conexao, $query);
		return $resultado;
	}

	function desativaCandidato($conexao, $id) {
		$query = "update candidatos set ativo = 0 where id = {$id}";
		return mysqli_query($conexao, $query);
	}

	function alteraCandidato($conexao, $id, $nome, $numero, $foto) {
		$query = "update candidatos 
					set nome = '{$nome}', 
						numero = {$numero}, 
						foto = '{$foto}'
					where id = {$id} ";
		return mysqli_query($conexao, $query);
	}
	
	function buscaCandidato($conexao, $id) {
		$query = "select * from candidatos where id = {$id}";
		$resultado = mysqli_query($conexao, $query);
		return mysqli_fetch_assoc($resultado);
	}

	function listaCandidatos($conexao) {
		$candidatos = array();
		$resultado = mysqli_query($conexao,"select * from candidatos where ativo = 1 and usado = 0");
		while ($candidato = mysqli_fetch_assoc($resultado)) {
			array_push($candidatos, $candidato);
		}
		return $candidatos;
	}