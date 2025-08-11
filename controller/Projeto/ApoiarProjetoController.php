<?php
session_start();

if (isset($_POST['projeto-apoio-id'])) {
    $apoio = $projetoModel->apoiarProjeto($_SESSION['usuario']['id'], $_POST['projeto-apoio-id']);
    if ($apoio) {
        header("Location: ../../view/pages/ong/projeto/perfil.php?id=$id&msg=apoio");
        exit;
    }
}

if (isset($_POST['projeto-desapoiar-id'])) {
    $desapoiado = $projetoModel->desapoiarProjeto($_SESSION['usuario']['id'], $_POST['projeto-desapoiar-id']);
    if ($desapoiado) {
        header("Location: perfil.php?id=$id&msg=desapoio");
        exit;
    }
}


if (isset($_GET['id']) && $projeto) {
    require_once 'partials/popups-projeto.php';
}