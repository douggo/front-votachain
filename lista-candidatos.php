<?php 
	require_once("cabecalho.php");
	require_once("banco-candidato.php");
	require_once("usuario-session.php");

	verificaAdministrador(); 
	
	if (array_key_exists("removido", $_GET) && $_GET['removido'] == "true") { ?>
		<p class="text-success">Eleição removida com sucesso</p> <?php
	} ?>

	<table class="table table-striped table-bordered"> 
		<tr>
			<td><strong>Nome</strong></td>
			<td><strong>Número</strong></td>
			<td><strong>Foto</strong></td>
			<td><strong>Alterar</strong></td>
			<td><strong>Remover</strong></td>
		</tr> <?php
		$candidatos = listaCandidatos($conexao); 
		foreach($candidatos as $candidato) { ?>
			<tr>
				<td><?=$candidato['nome']?></td>
				<td><?=$candidato['numero']?></td>
				<td><?=$candidato['foto']?></td>
				<td>
					<a href="formulario-altera-candidato.php?id=<?=$candidato['id']?>" class="btn btn-primary">Alterar</a>
				</td>
				<td>
					<form action="remove-candidato.php?id=<?=$candidato['id']?>" method="POST">
						<input type="hidden" name="id" value="<?=$candidato['id']?>">
						<button class="btn btn-danger">remover</button>
					</form>
				</td>
			</tr> <?php
		} ?>
	</table> <?php 
	include("rodape.php");