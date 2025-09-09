<?php
session_start();
require_once __DIR__ . '/../../autoload.php';

$ongModel = new OngModel();

// Inicializar variáveis
$lista = [];
$filtros = [];
$pesquisa = '';
$paginaAtual = isset($_POST['pagina']) ? (int)$_POST['pagina'] : 1;

// ===== Captura filtros do formulário =====
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        if ($key === 'recentes') $filtros['tempo'] = 'mais-recentes';
        if ($key === 'antigos')  $filtros['tempo'] = 'mais-antigos';
        if ($key === '1-3')       $filtros['quantidade'] = '1-3';
        if ($key === '4+')        $filtros['quantidade'] = '4+';
    }

    if (!empty($filtros)) {
        $lista = $ongModel->filtrarOngs($filtros);
    }

    if (!empty($_POST['pesquisa'])) {
        $pesquisa = trim($_POST['pesquisa']);
        $lista = $ongModel->listarCardsOngs('pesquisa', ['pesquisa' => $pesquisa]);
    }
}

// ===== Guardar dados na sessão =====
$_SESSION['controller_ongs'] = [
    'lista' => $lista,
    'filtros' => $filtros,
    'pesquisa' => $pesquisa,
    'paginaAtual' => $paginaAtual
];

// Redirecionar para a view
header('Location: ../../view/pages/ong/lista.php');
exit;
