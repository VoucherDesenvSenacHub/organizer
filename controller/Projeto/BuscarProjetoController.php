<?php
require_once __DIR__ . '/../../autoload.php';

function carregarListaProjetos(array $get, array $post)
{
    $projetoModel = new ProjetoModel();
    $categoriaModel = new CategoriaModel();

    $paginaAtual = (int)($_GET['pagina'] ?? 1);
    $filtros = ['pagina' => $paginaAtual];

    if (!empty($post['pesquisa'])) {
        $filtros['pesquisa'] = $post['pesquisa'];
    }

    if (!empty($post['ordem'])) {
        $filtros['ordem'] = $post['ordem'];
    }

    if (!empty($post['status'])) {
        $filtros['status'] = $post['status'];
    }

    if (!empty($post['categorias'])) {
        $filtros['categorias'] = $post['categorias'];
    }

    $categorias = $categoriaModel->buscarCategorias();
    $lista = $projetoModel->listarCardsProjetos($filtros);
    $totalRegistros = $projetoModel->paginacaoProjetos($filtros);
    $paginas = ceil($totalRegistros / 8);

    $favoritos = [];
    if (!empty($_SESSION['usuario']['id']) && $_SESSION['perfil_usuario'] === 'doador') {
        $favoritos = $projetoModel->listarFavoritos($_SESSION['usuario']['id']);
    }

    return compact('categorias', 'lista', 'paginas', 'favoritos', 'totalRegistros', 'paginaAtual');
}