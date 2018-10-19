<?php
	require_once("conecta.php");

	function insereVoto($conexao, $id_candidato_eleicao) {
		$query = "insert into votos (id_candidato_eleicao) values ({$id_candidato_eleicao})";
		$resultado = mysqli_query($conexao, $query);
		return $resultado;
	}