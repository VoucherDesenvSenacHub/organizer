<?php
require_once __DIR__ . '/../../autoload.php';
require_once __DIR__ . '/BuscarProjetoController.php';

$post = $_POST;
$get = $_GET;

$dados = carregarListaProjetos($get, $post);

$lista = $dados['lista'];
$favoritos = $dados['favoritos'];
$paginas = $dados['paginas'];
$totalRegistros = $dados['totalRegistros'];
$paginaAtual = $dados['paginaAtual'];
$statusSelecionado = $post['status'] ?? [];
$categoriasSelecionadas = $post['categorias'] ?? [];

ob_start();
?>
<div class="resultado-busca">
    <p><?= $totalRegistros ?> Projetos</p>
    <p><i class='fa-solid fa-filter'></i> <?= count($categoriasSelecionadas) + count($statusSelecionado) ?> Filtros</p>
</div>

<div class="lista-cards">
    <?php foreach ($lista as $projeto) {
        $projetosFavoritos = $favoritos;
        require '../../view/components/cards/card-projeto.php';
    } ?>
</div>

<?php if ($paginas > 1): ?>
    <nav class="paginacao">
        <?php for ($i = 1; $i <= $paginas; $i++): ?>
            <a href="?pagina=<?= $i ?>" class="<?= $i == $paginaAtual ? 'active' : '' ?>"> <?= $i ?> </a>
        <?php endfor; ?>
    </nav>
<?php endif; ?> 
<?php
echo ob_get_clean();
