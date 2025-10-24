<?php
$acesso = 'adm';
$tituloPagina = 'Painel de Notícias | Organizer';
$cssPagina = ['adm/listagem.css'];
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';

$noticiaModel = new NoticiaModel();
$paginaAtual = (int)($_GET['pagina'] ?? 1);

// Monta filtros
$filtros = [
    'pagina'   => $paginaAtual,
    'pesquisa' => $_GET['pesquisa'] ?? null
];

// Busca lista e paginação
$lista          = $noticiaModel->listarCardsNoticias($filtros);
$totalRegistros = $noticiaModel->paginacaoNoticias($filtros);
$paginas        = (int) ceil($totalRegistros / 6);
?>

<main class="conteudo-principal">
    <section>
        <div class="container">
            <div class="top">
                <h1><i class="fa-solid fa-newspaper"></i> PAINEL DE NOTÍCIAS</h1>
                <form id="form-busca" action="noticias.php" method="GET">
                    <input type="text" name="pesquisa" placeholder="Busque uma notícia">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </form>
            </div>
            <!-- Quantidade da busca -->
            <?php if (isset($_GET['pesquisa'])) {
                echo "<p class='qnt-busca'><i class='fa-solid fa-search'></i> " . $totalRegistros . " Notícias Encontrados</p>";
            } ?>

            <section id="box-ongs">
                <!-- LISTAR CARDS NOTÍCIAS -->
                <?php
                if ($lista) {
                    foreach ($lista as $noticia) {
                        require '../../components/cards/card-noticia.php';
                    }
                } else {
                    echo '<p>Nenhuma Notícia cadastrada!</p>';
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
$jsPagina = []; //Colocar o arquivo .js
require_once '../../components/layout/footer/footer-logado.php';
?>