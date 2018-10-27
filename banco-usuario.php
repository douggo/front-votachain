<?php
	require_once("conecta.php");

	function insereUsuario($conexao, $nome, $email, $senha, $administrador) {
		if ($nome == '' || $email == '' || $senha == '') {
			return false;
		}
		else {
			$senhacripto = md5($senha);
			$query = "insert into usuarios (nome, email, senha, administrador) 
								    values ('{$nome}', '{$email}', '{$senhacripto}', {$administrador})";
			$resultado = mysqli_query($conexao, $query);
			return $resultado;
		}
	}

	function desativaUsuario($conexao, $id) {
		$query = "update usuarios set ativo = 0 where id = {$id}";
		return mysqli_query($conexao, $query);
	}

	function alteraUsuario($conexao, $id, $nome, $email, $senha, $administrador, $ativo) {
		$senhacripto = md5($senha);
		$query = "update usuarios 
					set nome = '{$nome}', 
						email = '{$email}', 
						senha = '{$senhacripto}',
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
		$senhacripto = md5($senha);
		$query = "select * from usuarios 
				   where email = '{$email}' and 
						 senha = '{$senhacripto}' and 
						 ativo = 1";
		$resultado = mysqli_query($conexao, $query);
		$usuario = mysqli_fetch_assoc($resultado);
		return $usuario;
	}

	function listaUsuarios($conexao) {
		$usuarios = array();
		$resultado = mysqli_query($conexao,"select * from usuarios where ativo = 1");
		while ($usuario = mysqli_fetch_assoc($resultado)) {
			array_push($usuarios, $usuario);
		}
		return $usuarios;
	}