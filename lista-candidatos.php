<?php 
	require_once("cabecalho.php");
	require_once("banco-candidato.php");
	require_once("usuario-session.php");

	verificaAdministrador(); 
	
	if (array_key_exists("desativado", $_GET) && $_GET['desativado'] == "true") { ?>
		<script> swal("Candidato", "Candidato desativado com sucesso!", "success"); </script>
		<p class="alert alert-success">Candidatos desativado com sucesso</p> <?php
	} 
	
	$candidatos = listaTodosCandidatos($conexao); 
	
	if ($candidatos == null) { ?>
		<h1 class="alert alert-info">Não há candidatos ativos disponíveis, cadastre-os!</h1> <?php
	} else { ?>
		<table class="table table-striped table-bordered"> 
			<tr class="text-center">
				<td><strong>Nome</strong></td>
				<td><strong>Número</strong></td>
				<td><strong>Foto</strong></td>
				<td><strong>Alterar</strong></td>
				<td><strong>Desativar</strong></td>
			</tr> <?php
			foreach($candidatos as $candidato) { ?>
				<tr class="text-center">
					<td><?=$candidato['nome']?></td>
					<td><?=$candidato['numero']?></td>
					<td><?=$candidato['foto']?></td>
					<td>
						<a href="formulario-altera-candidato.php?id=<?=$candidato['id']?>" class="btn btn-primary">Alterar</a>
					</td>
					<td>
						<form action="desativa-candidato.php?id=<?=$candidato['id']?>" method="POST">
							<input type="hidden" name="id" value="<?=$candidato['id']?>">
							<button class="btn btn-danger">Desativar</button>
						</form>
					</td>
				</tr> <?php
			} ?>
		</table> <?php
	}
	
	include("rodape.php");