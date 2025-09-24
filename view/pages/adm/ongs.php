<?php
$acesso = 'adm';
$tituloPagina = 'Painel de Ongs | Organizer';
$cssPagina = ['adm/listagem.css'];
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';

$ongModel = new OngModel();
$paginaAtual = (int)($_GET['pagina'] ?? 1);

// Monta filtros
$filtros = [
    'pagina'   => $paginaAtual,
    'pesquisa' => $_GET['pesquisa'] ?? null
];

// Busca lista e paginação
$lista          = $ongModel->listarCardsOngs($filtros);
$totalRegistros = $ongModel->paginacaoOngs($filtros);
$paginas        = (int)ceil($totalRegistros / 6);
?>

<main class="conteudo-principal">
    <section>
        <div class="container">
            <div class="top">
                <h1><i class="fa-solid fa-building-flag"></i> PAINEL DE ONGS</h1>
                <form id="form-busca" action="ongs.php" method="GET">
                    <input type="text" name="pesquisa" placeholder="Busque uma ONG">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </form>
            </div>
            <!-- Quantidade da busca -->
            <?php if (isset($_GET['pesquisa'])) {
                echo "<p class='qnt-busca'><i class='fa-solid fa-search'></i> " . $totalRegistros . " ONGS Encontrados</p>";
            } ?>

            <section id="box-ongs">
                <?php
                if (isset($lista) && empty($lista)) {
                    echo '<p>Nenhuma ONG cadastrada!</p>';
                } else {
                    foreach ($lista as $ong) {
                        require '../../components/cards/card-ong.php';
                    }
                }
                ?>
            </section>
            <?php if ($paginas > 1): ?>
                <nav class="paginacao">
                    <?php for ($i = 1; $i <= $paginas; $i++): ?>
                        <a href="?pagina=<?= $i ?><?= isset($_GET['pesquisa']) ? '&pesquisa=' . urlencode($_GET['pesquisa']) : '' ?>"
                            class="<?= $i === $paginaAtual ? 'active' : '' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </nav>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
?>