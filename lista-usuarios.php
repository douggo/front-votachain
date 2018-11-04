<?php 
	require_once("cabecalho.php");
	require_once("banco-usuario.php");
	require_once("usuario-session.php");

	verificaAdministrador();

	if (array_key_exists("desativado", $_GET) && $_GET['desativado'] == "true") { ?>
		<script> swal("Sucesso", "Usuário desativado com sucesso!", "success"); </script>
		<p class="alert alert-success">Usuário desativado com sucesso</p> <?php
	} ?>

	<table class="table table-striped table-bordered"> 
		<tr class="text-center">
			<td><strong>Usuário</strong></td>
			<td><strong>E-mail</strong></td>
			<td><strong>Alterar</strong></td>
			<td><strong>Desativar</strong></td>
		</tr> <?php
		$usuarios = listaUsuarios($conexao); 
		foreach($usuarios as $usuario) { ?>
			<tr class="text-center">
				<td><?=$usuario['nome']?></td>
				<td><?=$usuario['email']?></td>
				<td>
					<a href="formulario-altera-usuario.php?id=<?=$usuario['id']?>" class="btn btn-primary">Alterar</a>
				</td>
				<td>
					<form action="desativa-usuario.php?id=<?=$usuario['id']?>" method="POST">
						<input type="hidden" name="id" value="<?=$usuario['id']?>">
						<button class="btn btn-danger">Desativar</button>
					</form>
				</td>
			</tr> <?php
		} ?>
	</table> <?php 

	include ("rodape.php");