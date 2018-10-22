<?php 
	require_once("cabecalho.php");
	require_once("banco-usuario.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	if (array_key_exists("removido", $_GET) && $_GET['removido'] == "true") { ?>
		<p class="text-success">Produto removido com sucesso</p> <?php
	} ?>

	<table class="table table-striped table-bordered"> 
		<tr>
			<td><strong>Usuário</strong></td>
			<td><strong>E-mail</strong></td>
			<td><strong>Alterar</strong></td>
			<td><strong>Remover</strong></td>
		</tr> <?php
		$usuarios = listaUsuarios($conexao); 
		foreach($usuarios as $usuario) { ?>
			<tr>
				<td><?=$usuario['nome']?></td>
				<td><?=$usuario['email']?></td>
				<td>
					<a href="formulario-altera-usuario.php?id=<?=$usuario['id']?>" class="btn btn-primary">Alterar</a>
				</td>
				<td>
					<form action="remove-usuario.php?id=<?=$usuario['id']?>" method="POST">
						<input type="hidden" name="id" value="<?=$usuario['id']?>">
						<button class="btn btn-danger">remover</button>
					</form>
				</td>
			</tr> <?php
		} ?>
	</table> <?php 

	include ("rodape.php");