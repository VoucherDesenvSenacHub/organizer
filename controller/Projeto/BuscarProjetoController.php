<?php
session_start();
require_once __DIR__ . '/../../autoload.php';

$projetoModel = new ProjetoModel();
$categoriaModel = new CategoriaModel();
$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

// Buscar categorias selecionadas
$categorias = $categoriaModel->buscarCategorias();
$categoriasSelecionadas = [];
if (isset($_GET['filtro'])) {
    foreach ($categorias as $categoria) {
        if (isset($_GET["cat_{$categoria['categoria_id']}"])) {
            $categoriasSelecionadas[] = $categoria['categoria_id'];
        }
    }
}

// Verificar se é pesquisa
$pesquisa = $_GET['pesquisa'] ?? '';

// Lógica para decidir quais dados buscar
if (!empty($pesquisa)) {
    // Caso pesquisa
    $valor = [
        'pagina' => $paginaAtual,
        'pesquisa' => $pesquisa
    ];
    $lista = $projetoModel->listarCardsProjetos('pesquisa', $valor);
    $totalRegistros = $projetoModel->paginacaoProjetos('pesquisa', $valor);

} elseif (!empty($categoriasSelecionadas)) {
    // Caso filtro
    $lista = $projetoModel->filtrarPorCategorias($categoriasSelecionadas, $paginaAtual);
    $totalRegistros = $projetoModel->paginacaoFiltroCategorias($categoriasSelecionadas);

} else {
    // Caso padrão (sem pesquisa/filtro)
    $valor = ['pagina' => $paginaAtual];
    $lista = $projetoModel->listarCardsProjetos('', $valor);
    $totalRegistros = $projetoModel->paginacaoProjetos('', $valor);
}

// Guardar dados para a view
$_SESSION['controller_filtro'] = [
    'lista' => $lista,
    'totalRegistros' => $totalRegistros,
    'paginaAtual' => $paginaAtual,
    'categoriasSelecionadas' => $categoriasSelecionadas,
    'pesquisa' => $pesquisa
];

// Redirecionar para a view
header('Location: ../../view/pages/projeto/lista.php');
exit;
