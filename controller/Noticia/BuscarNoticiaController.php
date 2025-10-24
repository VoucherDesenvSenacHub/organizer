<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../autoload.php';

$noticiaModel = new NoticiaModel();

// Monta filtros
$filtros = [
    'pagina'   => $_POST['pagina'] ?? 1,
    'pesquisa' => $_POST['pesquisa'] ?? null,
    'ordem'    => $_POST['ordem'] ?? null,
    'status'   => 'ATIVO'
];

// Buscar dados
$lista          = $noticiaModel->listarCardsNoticias($filtros);
$totalRegistros = $noticiaModel->paginacaoNoticias($filtros);
$paginas        = (int) ceil($totalRegistros / 6);
?>
<div class="contadores">
    <p><?= $totalRegistros ?> Notícias</p>
</div>

<div class="lista-cards">
    <?php if (empty($lista)): ?>
        <p class="sem-resultados">Nenhuma notícia encontrada</p>
    <?php else: ?>
        <?php foreach ($lista as $noticia) {
            require '../../view/components/cards/card-noticia.php';
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