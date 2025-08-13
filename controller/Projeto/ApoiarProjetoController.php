<?php
require_once __DIR__ . '/../../model/ProjetoModel.php';
session_start();

$projetoModel = new Projeto();

$usuarioId = $_SESSION['usuario']['id'];
$projetoId = $_POST['projeto-id'] ?? null;
$acao = $_POST['acao'] ?? null;

switch ($acao) {
    case 'apoiar':
        if (!isset($projetoId)) {
            echo 'parâmetro inálido!';
            exit;
        }

        $apoio = $projetoModel->apoiarProjeto($usuarioId, $projetoId);
        if ($apoio) {
            header("Location: ../../view/pages/projeto/perfil.php?id=$projetoId&msg=apoio");
            exit;
        }
        break;

    case 'desapoiar':
        if (!isset($projetoId)) {
            echo 'parâmetro inálido!';
            exit;
        }

        $desapoiado = $projetoModel->desapoiarProjeto($usuarioId, $projetoId);
        if ($desapoiado) {
            header("Location: ../../view/pages/projeto/perfil.php?id=$projetoId&msg=desapoio");
            exit;
        }
        break;

    default:
        echo 'ação inválida!';
        exit;
}
