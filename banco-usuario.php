<?php
	require_once("conecta.php");

	function insereUsuario($conexao, $nome, $email, $senha, $administrador, $ativo) {
		$query = "insert into usuarios (nome, email, senha, administrador, ativo) values ('{$nome}', '{$email}', '{$senha}', {$administrador}, {$ativo})";
		$resultado = mysqli_query($conexao, $query);
		return $resultado;
	}

	function removeUsuario($conexao, $id) {
		$query = "delete from usuarios where id = {$id}";
		return mysqli_query($conexao, $query);
	}

	function alteraUsuario($conexao, $id, $nome, $email, $senha, $administrador, $ativo) {
		$query = "update usuarios 
					set nome = '{$nome}', 
						email = '{$email}', 
						senha = '{$senha}',
						administrador = {$administrador},
						ativo = {$ativo} 
					where id = {$id} ";
		return mysqli_query($conexao, $query);
	}
	
	function buscaUsuario($conexao, $id) {
		$query = "select * from usuarios where id = {$id}";
		$resultado = mysqli_query($conexao, $query);
		$usuario = mysqli_fetch_assoc($resultado);
		return $usuario;
	}

	function buscaUsuarioLogin($conexao, $email, $senha) {
		$query = "select * from usuarios where email = '{$email}' and senha = '{$senha}'";
		$resultado = mysqli_query($conexao, $query);
		$usuario = mysqli_fetch_assoc($resultado);
		return $usuario;
	}

	function listaUsuarios($conexao) {
		$usuarios = array();
		$resultado = mysqli_query($conexao,"select * from usuarios");
		while ($usuario = mysqli_fetch_assoc($resultado)) {
			array_push($usuarios, $usuario);
		}
		return $usuarios;
	}