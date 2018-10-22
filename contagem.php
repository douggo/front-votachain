<?php 
	require_once("cabecalho.php");
    require_once("banco-votos.php");
    require_once("banco-candidato-eleicao.php");
	require_once("usuario-session.php");
	header("Access-Control-Allow-Origin: *");

	verificaUsuario();

    $i = 0;
    $total = 0; 
    $id_eleicao = $_GET["id_eleicao"];
    $ids_candidatos_eleicoes = array();
    $votos = array();
    
    $api_url = 'http://localhost:8000/blocks';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $api_url);
    $result = curl_exec($ch);
    curl_close($ch);

    $blockchain = (object) json_decode($result);

    /*
    echo("<pre>");
    print_r($blockchain);
    echo("</pre>");
    */

    foreach($blockchain as $block) {
        if ($blockchain->{$i}->{"id_eleicao"} == $id_eleicao) {
            $id = $blockchain->{$i}->{"id_candidato"};
            if (!in_array($id, $votos)) {
                ${"candidato" . $id} = 0;
                array_push($votos, $id);
            }
            ${"candidato" . $id}++;
        }
        $i++;
    }

    /*
    echo("<pre>");
    print_r($votos);
    echo("</pre>");
    */

    /*
    echo("<pre>");
    print_r("Bolsonaro: " . $candidato2 . " votos");
    echo("<br>");
    print_r("Haddad: " . $candidato3 . " votos");
    echo("</pre>");
    */

    $candidatos = listaCandidatosEleicao($conexao, $id_eleicao);
    foreach($candidatos as $candidato) {
        $total = $total + ${"candidato" . $candidato["id_candidato"]};
    }

    echo("Total: " . $total . " votos cadastrados.");
    echo("<br>");
    foreach($candidatos as $candidato) {
        echo($candidato["nome"] . ": " . ${"candidato" . $candidato["id_candidato"]} . " votos.");
        echo("<br>");
    }

	include("rodape.php");