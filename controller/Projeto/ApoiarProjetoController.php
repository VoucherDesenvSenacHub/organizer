<?php
session_start();
require_once __DIR__ . '/../../model/ProjetoModel.php';

$projetoModel = new Projeto();
$jaApoiou = false;

if (isset($_POST['projeto-apoio-id'])) {
    $apoio = $projetoModel->apoiarProjeto($_SESSION['usuario']['id'], $_POST['projeto-apoio-id']);
    
    if ($apoio) {
        var_dump($apoio);
        header("Location: ../../view/pages/projeto/perfil.php?id={$_POST['projeto-apoio-id']}&msg=apoio");
        exit;
    }
}

if (isset($_POST['projeto-desapoiar-id'])) {
    $desapoiado = $projetoModel->desapoiarProjeto($_SESSION['usuario']['id'], $_POST['projeto-desapoiar-id']);
    if ($desapoiado) {
        header("Location: ../../view/pages/projeto/perfil.php?id={$_POST['projeto-desapoiar-id']}&msg=desapoio");
        exit;
    }
}