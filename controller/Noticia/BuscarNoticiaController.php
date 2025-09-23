<?php
require_once __DIR__ . '/../../autoload.php';

function carregarListaNoticias(array $get, array $post)
{
    $noticiaModel = new NoticiaModel();
    $paginaAtual = (int)($get['pagina'] ?? 1);

    // Monta filtros
    $filtros = [
        'pagina'   => $paginaAtual,
        'pesquisa' => $post['pesquisa'] ?? null,
        'ordem'    => $post['ordem'] ?? null,
        'status'   => 'ATIVO'
    ];

    // Busca lista e paginação
    $lista          = $noticiaModel->listarCardsNoticias($filtros);
    $totalRegistros = $noticiaModel->paginacaoNoticias($filtros);
    $paginas        = (int) ceil($totalRegistros / 6);

    return compact('lista', 'paginas', 'paginaAtual', 'totalRegistros');
}