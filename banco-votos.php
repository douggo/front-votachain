<?php
	require_once("conecta.php");

	function retornaIDs($conexao) {
		$ids = array();
        $resultado = mysqli_query($conexao, "select id from votos");
        while($id = mysqli_fetch_assoc($resultado)){
            array_push($ids, $id);
        }
        return $ids;
	}

	function novaID($conexao) {
        $votos_id = retornaIDs($conexao);
        $integerRandom = rand(1,999);
        $existente = true;
        $achou = false;
        while($existente) {
            foreach($votos_id as $voto_id) {
                if ($voto_id["id"] == $integerRandom) {
                    $achou = true;
                    $integerRandom = rand(1,999);
                }
            }
            if(!$achou) {
                $existente = false;
            }
        }
        return $integerRandom;
    }

	function insereVoto($conexao, $id_candidato_eleicao) {
		$id = novaID($conexao);
		$query = "insert into votos (id, id_candidato_eleicao) values ({$id},{$id_candidato_eleicao})";
		$resultado = mysqli_query($conexao, $query);
		return $resultado;
	}