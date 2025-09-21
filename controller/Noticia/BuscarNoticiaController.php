<?php
require_once __DIR__ . '/../../autoload.php';

function carregarListaNoticias(array $get, array $post)
{
    $noticiaModel = new NoticiaModel();

    $paginaAtual = isset($get['pagina']) ? (int)$get['pagina'] : 1;
    $tipo = isset($post['pesquisa']) && $post['pesquisa'] !== '' ? 'pesquisa' : '';
    $valor = ['pagina' => $paginaAtual];

    if (!empty($post['pesquisa'])) {
        $valor['pesquisa'] = $post['pesquisa'];
    }

    if (!empty($post['ordem'])) {
        $valor['ordem'] = $post['ordem'];
    }

    $lista = $noticiaModel->listarCardsNoticias($tipo, $valor);
    $totalRegistros = $noticiaModel->paginacaoNoticias($tipo, $valor);
    $paginas = (int)ceil($totalRegistros / 6);

    return compact('lista', 'paginas', 'paginaAtual', 'totalRegistros');
}
