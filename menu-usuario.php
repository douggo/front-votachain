<?php 
    require_once("cabecalho.php"); 
    require_once("usuario-session.php");

    verificaAdministrador();
?>

<div class="row text-center text-lg-left">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <a href="formulario-usuario.php" class="d-block mb-4 btn btn-dark">Cadastrar usuário</a>
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12">
        <a href="lista-usuarios.php" class="d-block mb-4 btn btn-dark">Listar usuários</a>
    </div>
</div>

<?php include("rodape.php") ?>