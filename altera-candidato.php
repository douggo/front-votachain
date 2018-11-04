<?php 
	require_once("cabecalho.php");
	require_once("banco-candidato.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	$id = $_POST["id"];
	$nome = $_POST["nome"];
	$numero = $_POST["numero"];
	$foto = $_POST["foto"];

	$mensagens = array();
	$diretorio = "uploads/";
	$arquivo = $diretorio . basename($_FILES["foto"]["name"]);
	$uploadOK = 1;
	$extensaoImagem = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));

	if ($foto != $diretorio) {
		if(file_exists($foto)) {
			unlink($foto);
		}
	}

	if ($arquivo != "uploads/") {
		if (isset($_POST["submit"])) {
			$check = getimagesize($_FILES["foto"]["tmp_name"]);
			if ($check !== false) {
				$uploadOK = 1;
				array_push($mensagens, "Arquivo é uma imagem: " . $check["mime"] . ".");
			} else {
				$uploadOK = 0;
				array_push($mensagens, "Arquivo não é uma imagem.");
			}
		}
		
		if (file_exists($arquivo)) {
			$uploadOK = 0;
			array_push($mensagens, "Infelizmente o arquivo já existe.");
		}
	
		if ($_FILES["foto"]["size"] > 1000000) {
			$uploadOK = 0;
			array_push($mensagens, "Infelizmente o arquivo de imagem é maior que 1MB.");
		}
		
		if ($extensaoImagem != "jpg" && $extensaoImagem != "jpeg") {
			$uploadOK = 0;
			array_push($mensagens, "Aceitamos apenas imagens JPG ou JPEG.");
		}
	
		if ($uploadOK = 0) {
			array_push($mensagens, "Diversos erros aconteceram, dessa forma não pudemos realizar o upload da imagem.");
		} else {
			if (move_uploaded_file($_FILES["foto"]["tmp_name"], $arquivo)) {
				array_push($mensagens, "O upload do arquivo " . basename( $_FILES["foto"]["name"]) . " foi realizado com sucesso.");
			} else {
				array_push($mensagens, "Houve um problema ao realizar o upload da imagem.");
			}
		}
	} else {
		$arquivo = $foto;
	}

	if(alteraCandidato($conexao, $id, $nome, $numero, $arquivo)) { ?>
		<script> swal("Sucesso", "As informações do candidato foram alteradas com sucesso!", "success"); </script>
    	<p class="alert alert-success">O candidato <?= $nome; ?> foi alterado com sucesso!</p> <?php 
    } else {
    	$msg = mysqli_error($conexao); ?>
		<script> swal("Erro", "Erro ao alterar as informações do candidato!", "error"); </script>
    	<p class="alert alert-success">O candidato <?= $nome; ?> não foi alterado: <?= $msg ?></p> <?php
	} ?>

	<a href="lista-candidatos.php" class="btn btn-info">Verificar candidatos cadastrados</a> <?php
	
	include("rodape.php");
