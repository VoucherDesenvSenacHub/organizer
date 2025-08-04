<?php
require_once __DIR__ . '/../../../autoload.php';
require_once __DIR__ . '/Projeto/FavoritarProjetoController.php';
require_once __DIR__ . '/Projeto/CadastrarProjetoController.php';
session_start();

$acao = $_POST['acao'] ?? null;

switch ($acao) {
    case 'favoritar':
        favoritarProjeto();
        break;

    case 'cadastro':
        cadastrarProjeto();
        break;

    default:
        header('Location: ../view/login.php');
        exit;
}
