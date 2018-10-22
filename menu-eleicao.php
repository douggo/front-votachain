<?php 
    require_once("cabecalho.php");
    require_once("usuario-session.php");

    verificaAdministrador();
?>

<div class="row text-center text-lg-left">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <a href="formulario-eleicao.php" class="d-block mb-4 btn btn-dark">Cadastrar eleição</a>
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12">
        <a href="lista-eleicoes.php" class="d-block mb-4 btn btn-dark">Listar eleições</a>
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12">
        <a href="formulario-candidato.php" class="d-block mb-4 btn btn-dark">Cadastrar candidato</a>
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12">
        <a href="lista-candidatos.php" class="d-block mb-4 btn btn-dark">Listar candidatos</a>
    </div>
</div>

<?php 
    include("rodape.php");