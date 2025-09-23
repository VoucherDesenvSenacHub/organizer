<?php
require_once __DIR__ . '/../../autoload.php';

function carregarListaProjetos(array $get, array $post)
{
    $projetoModel = new ProjetoModel();
    $categoriaModel = new CategoriaModel();

    $paginaAtual = (int)($get['pagina'] ?? 1);

    // Monta filtros
    $filtros = [
        'pagina'     => $paginaAtual,
        'pesquisa'   => $post['pesquisa'] ?? null,
        'ordem'      => $post['ordem'] ?? null,
        'status'     => $post['status'] ?? ['ATIVO', 'FINALIZADO'],
        'categorias' => $post['categorias'] ?? null,
    ];

    // Buscar categorias, lista de projetos e paginação
    $categorias     = $categoriaModel->buscarCategorias();
    $lista          = $projetoModel->listarCardsProjetos($filtros);
    $totalRegistros = $projetoModel->paginacaoProjetos($filtros);
    $paginas        = (int) ceil($totalRegistros / 8);

    // Projetos favoritos do usuário
    $favoritos = [];
    if (!empty($_SESSION['usuario']['id']) && $_SESSION['perfil_usuario'] === 'doador') {
        $favoritos = $projetoModel->listarFavoritos($_SESSION['usuario']['id']);
    }

    return compact('categorias', 'lista', 'paginas', 'favoritos', 'totalRegistros', 'paginaAtual');
}