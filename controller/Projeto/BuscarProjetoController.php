<?php
require_once __DIR__ . '/../../autoload.php';

function carregarListaProjetos(array $get, array $post)
{
    $projetoModel = new ProjetoModel();
    $categoriaModel = new CategoriaModel();

    $paginaAtual = isset($get['pagina']) ? (int)$get['pagina'] : 1;
    $tipo = isset($post['pesquisa']) && $post['pesquisa'] !== '' ? 'pesquisa' : '';
    $valor = ['pagina' => $paginaAtual];

    if (!empty($post['pesquisa'])) {
        $valor['pesquisa'] = $post['pesquisa'];
    }

    if (!empty($post['categorias'])) {
        $valor['categorias'] = $post['categorias'];
    }

    $categorias = $categoriaModel->buscarCategorias();
    $lista = $projetoModel->listarCardsProjetos($tipo, $valor);
    $totalRegistros = $projetoModel->paginacaoProjetos($tipo, $valor);
    $paginas = ceil($totalRegistros / 8);

    $favoritos = [];
    if (!empty($_SESSION['usuario']['id']) && $_SESSION['perfil_usuario'] === 'doador') {
        $favoritos = $projetoModel->listarFavoritos($_SESSION['usuario']['id']);
    }

    return compact('categorias', 'lista', 'paginas', 'favoritos', 'totalRegistros', 'paginaAtual');
}