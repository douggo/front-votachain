<?php
	require_once("conecta.php");

	function insereCandidatoEleicao($conexao, $id_eleicao, $id_candidato) {
		$query = "insert into candidato_eleicao (id_eleicao, id_candidato) values ({$id_eleicao}, {$id_candidato})";
		$resultado = mysqli_query($conexao, $query);
		return $resultado;
	}

	function atualizaCandidato($conexao, $usado, $id_candidato) {
		$query = "update candidatos set usado = {$usado} where id = {$id_candidato}";
		$resultado = mysqli_query($conexao, $query);
		return $resultado;
	}

	function removeCandidatoEleicao($conexao, $id_eleicao, $id_candidato) {
		$query = "delete from candidato_eleicao 
				  where id_eleicao = {$id_eleicao} and
						id_candidato = {$id_candidato}";
		return mysqli_query($conexao, $query);
	}

	function listaCandidatosEleicao($conexao, $id_eleicao) {
		$candidatos = array();
		$resultado = mysqli_query($conexao,"select ce.id, ce.id_eleicao, c.id as id_candidato, c.nome, c.numero, c.foto 
										      from candidato_eleicao ce
											  join candidatos c
												on ce.id_candidato = c.id
											where ce.id_eleicao = {$id_eleicao}");
		while ($candidato = mysqli_fetch_assoc($resultado)) {
			array_push($candidatos, $candidato);
		}
		return $candidatos;
	}

	function retornaCandidato($conexao, $id_candidato_eleicao) {
		$query = "select * from candidato_eleicao where id = {$id_candidato_eleicao}";
		$resultado = mysqli_query($conexao, $query);
		$candidato = mysqli_fetch_assoc($resultado);
		return $candidato;
	}