<?php 
	require_once("cabecalho.php");
	require_once("banco-eleicao.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	if (array_key_exists("removido", $_GET) && $_GET['removido'] == "true") { ?>
		<p class="text-success">Eleição removida com sucesso</p> <?php
	} ?>

	<table class="table table-striped table-bordered"> 
		<tr>
			<td><strong>Descrição</strong></td>
			<td><strong>Período</strong></td>
			<td><strong>Candidatos</strong></td>
			<td><strong>Alterar</strong></td>
			<td><strong>Remover</strong></td>
		</tr> <?php
		$eleicoes = listaEleicoes($conexao); 
		foreach($eleicoes as $eleicao) { ?>
			<tr>
				<td><?=$eleicao['descricao']?></td>
				<td><?=$eleicao['periodo']?></td>
				<td>
					<a href="lista-candidato-eleicao.php?id_eleicao=<?=$eleicao['id']?>" class="btn btn-primary">Verificar</a>
				</td>
				<td>
					<a href="formulario-altera-eleicao.php?id=<?=$eleicao['id']?>" class="btn btn-primary">Alterar</a>
				</td>
				<td>
					<form action="remove-eleicao.php?id=<?=$eleicao['id']?>" method="POST">
						<input type="hidden" name="id" value="<?=$eleicao['id']?>">
						<button class="btn btn-danger">remover</button>
					</form>
				</td>
			</tr> <?php
		} ?>
	</table> <?php 

	include("rodape.php");