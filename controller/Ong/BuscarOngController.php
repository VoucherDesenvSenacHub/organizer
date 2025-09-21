<?php
require_once __DIR__ . '/../../autoload.php';

function carregarListaOngs(array $get, array $post)
{
    $ongModel = new OngModel();

    $paginaAtual = isset($get['pagina']) ? (int)$get['pagina'] : 1;
    $tipo = isset($post['pesquisa']) && $post['pesquisa'] !== '' ? 'pesquisa' : '';
    $valor = ['pagina' => $paginaAtual];

    if (!empty($post['pesquisa'])) {
        $valor['pesquisa'] = $post['pesquisa'];
    }

    if (!empty($post['ordem'])) {
        $valor['ordem'] = $post['ordem'];
    }

    if (!empty($post['projetos'])) {
        $valor['projetos'] = $post['projetos'];
    }

    if (!empty($post['doacoes'])) {
        $valor['doacoes'] = $post['doacoes'];
    }

    $lista = $ongModel->listarCardsOngs($tipo, $valor);
    $totalRegistros = $ongModel->paginacaoOngs($tipo, $valor);
    $paginas = (int)ceil($totalRegistros / 6);

    $favoritas = [];
    if (!empty($_SESSION['usuario']['id'])) {
        $favoritas = $ongModel->listarFavoritas($_SESSION['usuario']['id']);
    }

    return compact('lista', 'paginas', 'paginaAtual', 'totalRegistros', 'favoritas');
}