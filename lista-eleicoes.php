<?php 
	require_once("cabecalho.php");
	require_once("banco-eleicao.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	if (array_key_exists("finalizada", $_GET) && $_GET['finalizada'] == "true") { ?>
		<script> swal("Eleição", "Eleição finalizada com sucesso!", "success"); </script>
		<p class="alert alert-success">Eleição finalizada com sucesso</p> <?php
	} ?>

	<table class="table table-striped table-bordered"> 
		<tr class="text-center">
			<td><strong>Descrição</strong></td>
			<td><strong>Período</strong></td>
			<td><strong>Candidatos</strong></td>
			<td><strong>Alterar</strong></td>
			<td><strong>Finalizar</strong></td>
		</tr> <?php
		$eleicoes = listaEleicoes($conexao);
		foreach($eleicoes as $eleicao) { ?>
			<tr class="text-center">
				<td><?=$eleicao['descricao']?></td>
				<td><?=$eleicao['periodo']?></td>
				<td>
					<a href="lista-candidato-eleicao.php?id_eleicao=<?=$eleicao['id']?>" class="btn btn-primary">Verificar</a>
				</td>
				<td>
					<a href="formulario-altera-eleicao.php?id=<?=$eleicao['id']?>" class="btn btn-primary">Alterar</a>
				</td>
				<td> <?php
					if (!$eleicao["finalizada"]) { ?>
						<form action="finaliza-eleicao.php?id=<?=$eleicao['id']?>" method="POST">
							<input type="hidden" name="id" value="<?=$eleicao['id']?>">
							<button class="btn btn-danger">Finalizar</button>
						</form> <?php
					} else { ?>
						<button class="btn btn-danger" disabled>Finalizada</button> <?php
					} ?>
				</td>
			</tr> <?php
		} ?>
	</table> <?php 

	include("rodape.php");