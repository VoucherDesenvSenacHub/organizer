<?php
require_once __DIR__ . '/../../autoload.php';

function carregarListaOngs(array $get, array $post)
{
    $ongModel = new OngModel(); 
    $paginaAtual = (int)($get['pagina'] ?? 1);

    // Monta filtros
    $filtros = [
        'pagina'  => $paginaAtual,
        'pesquisa'=> $post['pesquisa'] ?? null,
        'ordem'   => $post['ordem'] ?? null,
        'projetos'=> $post['projetos'] ?? null,
        'doacoes' => $post['doacoes'] ?? null,
    ];

    // Busca lista e paginação
    $lista          = $ongModel->listarCardsOngs($filtros);
    $totalRegistros = $ongModel->paginacaoOngs($filtros);
    $paginas        = (int)ceil($totalRegistros / 6);

    // Ongs favoritas do usuário
    $favoritas = [];
    if (!empty($_SESSION['usuario']['id'])) {
        $favoritas = $ongModel->listarFavoritas($_SESSION['usuario']['id']);
    }

    return compact('lista', 'paginas', 'paginaAtual', 'totalRegistros', 'favoritas');
}