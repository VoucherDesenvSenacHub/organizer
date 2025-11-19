<?php
$acesso = 'adm';
$tituloPagina = 'Painel de Ongs | Organizer';
$cssPagina = ['adm/listagem.css'];
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';

$ongModel = new OngModel();
$paginaAtual = (int) ($_GET['pagina'] ?? 1);

// Monta filtros
$filtros = [
    'pagina' => $paginaAtual,
    'pesquisa' => $_GET['pesquisa'] ?? '',
    'status' => ($_GET['status'] ?? '') !== '' ? $_GET['status'] : null
];

// QueryString (mantém filtros ao paginar)
$queryString = '';
if (!empty($_GET['pesquisa'])) {
    $queryString .= '&pesquisa=' . urlencode($_GET['pesquisa']);
}
if (isset($_GET['status']) && $_GET['status'] !== '') {
    $queryString .= '&status=' . urlencode($_GET['status']);
}

// Busca lista e paginação
$lista = $ongModel->listarCardsOngs($filtros);
$totalRegistros = $ongModel->paginacaoOngs($filtros);
$paginas = (int) ceil($totalRegistros / 6);
?>

<main class="conteudo-principal">
    <section>
        <div class="container">
            <div class="top">
                <h1><i class="fa-solid fa-building-flag"></i> PAINEL DE ONGS</h1>

                <!-- BUSCA -->
                <form id="form-busca" action="ongs.php" method="GET">
                    <input type="text" name="pesquisa" placeholder="Busque uma ONG"
                           value="<?= $_GET['pesquisa'] ?? '' ?>">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </form>

                <!-- FILTRO -->
                <form id="form-filtro" action="ongs.php" method="GET">
                    <input type="hidden" name="pesquisa" value="<?= $_GET['pesquisa'] ?? '' ?>">

                    <div class="ul-group">
                        <div class="drop" id="esc-status">
                            <div class="drop-title" tabindex="0">
                                <p id="status-label">
                                    <?= isset($_GET['status']) && $_GET['status'] !== '' 
                                        ? ucfirst(strtolower($_GET['status'])) 
                                        : 'Status' ?>
                                </p>
                                <i class="fa-solid fa-angle-down"></i>
                            </div>

                            <div class="drop-menu">
                                <button type="button" class="item" data-value="ATIVO">Ativo</button>
                                <button type="button" class="item" data-value="INATIVO">Inativo</button>
                            </div>

                            <input type="hidden" name="status" id="status-hidden" 
                                   value="<?= $_GET['status'] ?? '' ?>">
                        </div>
                    </div>
                </form>

            </div>

            <!-- Quantidade -->
            <?php if (isset($_GET['pesquisa'])): ?>
                <p class="qnt-busca">
                    <i class="fa-solid fa-search"></i> <?= $totalRegistros ?> ONGs encontradas
                </p>
            <?php endif; ?>

            <!-- LISTA -->
            <div class="area-cards">
                <?php
                if ($lista) {
                    foreach ($lista as $ong) {
                        require '../../components/cards/card-ong.php';
                    }
                } else {
                    $status = $_GET['status'] ?? '';

                    if ($status === 'ATIVO') {
                        echo 'Nenhuma ONG ativa encontrada.';
                    } elseif ($status === 'INATIVO') {
                        echo 'Nenhuma ONG inativa encontrada.';
                    } else {
                        echo 'Nenhuma ONG encontrada.';
                    }
                }
                ?>
            </div>

            <!-- PAGINAÇÃO (corrigida) -->
            <?php if ($paginas > 1): ?>
                <nav class="paginacao">
                    <?php for ($i = 1; $i <= $paginas; $i++): ?>
                        <a href="?pagina=<?= $i . $queryString ?>"
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
$jsPagina = ['adm/listagem.js'];
require_once '../../components/layout/footer/footer-logado.php';
?>
