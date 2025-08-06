<?php
require_once __DIR__ . '/../model/ProjetoModel.php';

session_start();

$acao = $_GET['acao'] ?? $_POST['acao'] ?? null;

$projetoModel = new ProjetoModel();

switch ($acao) {
    case 'favoritar':
        $usuario_id = $_SESSION['usuario']['id'];
        $projeto_id = $_POST['projeto-id-favorito'] ?? null;
        if ($projeto_id) {
            $favorito = $projetoModel->favoritarProjeto($usuario_id, $projeto_id);
            if ($favorito) {
                $_SESSION['favorito'] = true;
            } else {
                $_SESSION['favorito'] = false;
            }

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            echo "ID do projeto não fornecido.";
        }
        break;

    case 'cadastro':
        // Lógica para cadastrar
        break;

    default:
        header('Location: ../view/login.php');
        exit;
}
