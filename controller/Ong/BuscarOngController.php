<?php
session_start();
require_once __DIR__ . '/../../autoload.php';

$ongModel = new OngModel();
$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

// Inicializar variáveis
$filtros = [];
$pesquisa = '';

// ===== Captura filtros do formulário =====
if (isset($_GET['filtro'])) {
    if (isset($_GET['recentes'])) $filtros['tempo'] = 'mais-recentes';
    if (isset($_GET['antigos']))  $filtros['tempo'] = 'mais-antigos';
    if (isset($_GET['1-3']))      $filtros['quantidade'] = '1-3';
    if (isset($_GET['4+']))       $filtros['quantidade'] = '4+';
}

// Verificar se é pesquisa
$pesquisa = $_GET['pesquisa'] ?? '';

// Lógica para decidir quais dados buscar
if (!empty($pesquisa)) {
    // Caso pesquisa
    $tipo = 'pesquisa';
    $valor = array_merge([
        'pagina' => $paginaAtual,
        'pesquisa' => $pesquisa,
        'limit' => 6
    ], $filtros);

    $lista = $ongModel->listarCardsOngs($tipo, $valor);
    $totalRegistros = $ongModel->paginacaoOngs($tipo, $valor);
    
} elseif (!empty($filtros)) {
    // Caso filtro
    $tipo = '';
    $valor = array_merge([
        'pagina' => $paginaAtual,
        'pesquisa' => $pesquisa,
        'limit' => 6
    ], $filtros);

    $lista = $ongModel->listarCardsOngs($tipo, $valor);
    $totalRegistros = $ongModel->paginacaoOngs($tipo, $valor);
} else {
    // Caso padrão (sem pesquisa/filtro)
    $valor = [
        'pagina' => $paginaAtual,
        'limit' => 6
    ];

    $lista = $ongModel->listarCardsOngs('', $valor);
    $totalRegistros = $ongModel->paginacaoOngs('', $valor);
}

// Guardar dados para a view
$_SESSION['controller_filtro_ongs'] = [
    'lista' => $lista,
    'totalRegistros' => $totalRegistros,
    'paginaAtual' => $paginaAtual,
    'filtros' => $filtros,
    'pesquisa' => $pesquisa
];

// Redirecionar para a view
header('Location: ../../view/pages/ONG/lista.php');
exit;
