<?php
require_once __DIR__ . '/../../session_config.php';
require_once __DIR__ . '/../../autoload.php';

$ongModel = new OngModel();

// Monta filtros
$filtros = [
    'pagina'   => $_POST['pagina'] ?? 1,
    'pesquisa' => $_POST['pesquisa'] ?? null,
    'ordem'    => $_POST['ordem'] ?? null,
    'projetos' => $_POST['projetos'] ?? null,
    'doacoes'  => $_POST['doacoes'] ?? null,
    'status'   => 'ATIVO'
];

// Buscar dados
$lista          = $ongModel->listarCardsOngs($filtros);
$totalRegistros = $ongModel->paginacaoOngs($filtros);
$paginas        = (int)ceil($totalRegistros / 6);

// Favoritos
$favoritas = [];
if (!empty($_SESSION['usuario']['id'])) {
    $favoritas = $ongModel->listarFavoritas($_SESSION['usuario']['id']);
}

$totalFiltros = !empty($_POST['ordem']) + !empty($_POST['projetos']) + !empty($_POST['doacoes']);

?>
<div class="contadores">
    <p><?= $totalRegistros ?> Ongs</p>
    <p><i class='fa-solid fa-filter'></i> <?= $totalFiltros ?> Filtros</p>
</div>

<div class="lista-cards">
    <?php if (empty($lista)): ?>
        <p class="sem-resultados">Nenhuma Ong encontrada</p>
    <?php else: ?>
        <?php foreach ($lista as $ong) {
            require '../../view/components/cards/card-ong.php';
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