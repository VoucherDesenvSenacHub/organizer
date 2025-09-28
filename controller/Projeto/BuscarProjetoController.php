<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../autoload.php';

$projetoModel = new ProjetoModel();
$categoriaModel = new CategoriaModel();

// Monta filtros
$filtros = [
    'pagina'     => $_POST['pagina'] ?? 1,
    'pesquisa'   => $_POST['pesquisa'] ?? null,
    'ordem'      => $_POST['ordem'] ?? null,
    'status'     => $_POST['status'] ?? ['ATIVO', 'FINALIZADO'],
    'categorias' => $_POST['categorias'] ?? null,
];

// Buscar dados
$lista          = $projetoModel->listarCardsProjetos($filtros);
$totalRegistros = $projetoModel->paginacaoProjetos($filtros);
$paginas        = (int) ceil($totalRegistros / 8);

// Favoritos
$favoritos = [];
if (!empty($_SESSION['usuario']['id']) && $_SESSION['perfil_usuario'] === 'doador') {
    $favoritos = $projetoModel->listarFavoritos($_SESSION['usuario']['id']);
}

$totalFiltros = count($_POST['status'] ?? []) + count($_POST['categorias'] ?? []);
?>
<div class="contadores">
    <p><?= $totalRegistros ?> Projetos</p>
    <p><i class='fa-solid fa-filter'></i> <?= $totalFiltros ?> Filtros</p>
</div>

<div class="lista-cards">
    <?php if (empty($lista)): ?>
        <p class="sem-resultados">Nenhum projeto encontrado</p>
    <?php else: ?>
        <?php foreach ($lista as $projeto) {
            require '../../view/components/cards/card-projeto.php';
        } ?>
    <?php endif; ?>
</div>

<?php if ($paginas > 1): ?>
    <nav class="paginacao">
        <?php for ($i = 1; $i <= $paginas; $i++): ?>
            <a href="#" data-pagina="<?= $i ?>" class="<?= $i == $_POST['pagina'] ? 'active' : '' ?>"> <?= $i ?> </a>
        <?php endfor; ?>
    </nav>
<?php endif; ?>