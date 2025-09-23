<?php
ob_start();
$acesso = 'ong';
$tituloPagina = 'Notícias | Organizer';
$cssPagina = ['ong/listagem.css'];
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';

$noticiaModel = new NoticiaModel();
$IdOng = $_SESSION['ong_id'];
$paginaAtual = (int) ($_GET['pagina'] ?? 1);

// Monta filtros
$filtros = array_filter([
    'pagina'   => $paginaAtual,
    'ong_id'   => $IdOng,
    'pesquisa' => $_GET['pesquisa'] ?? null,
    'status'   => $_GET['status'] ?? null
]);

// Busca lista e paginação
$lista = $noticiaModel->listarCardsNoticias($filtros);
$totalRegistros = $noticiaModel->paginacaoNoticias($filtros);
$paginas = (int) ceil($totalRegistros / 6);

// Notícia padrão para formulário
$PerfilNoticia = (object) [
    'noticia_id' => null,
    'titulo'     => null,
    'subtitulo'  => null,
    'texto'      => null,
    'subtexto'   => null,
];

require_once '../../components/popup/formulario-noticia.php';
ob_end_flush();
?>
<main class="conteudo-principal">
    <section>
        <div class="container">
            <div class="topo">
                <h1><i class="fa-solid fa-newspaper"></i> MINHAS NOTÍCIAS</h1>
                <form id="form-busca" action="noticias.php" method="GET">
                    <input type="text" name="pesquisa" placeholder="Busque uma notícia" value="<?= $_GET['pesquisa'] ?? '' ?>">
                    <input type="hidden" name="status" value="<?= $_GET['status'] ?? '' ?>">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </form>
                <button class="btn btn-novo" onclick="abrir_popup('editar-noticia-popup')">NOVA NOTÍCIA +</button>
            </div>
            <form id="form-filtro" action="noticias.php" method="GET">
                <div class="ul-group">
                    <div class="drop" id="esc-status" aria-haspopup="true" aria-expanded="false">
                        <div class="drop-title" tabindex="0">
                            <p id="status-label">
                                <?= isset($_GET['status']) && $_GET['status'] !== ''
                                    ? ucfirst(strtolower($_GET['status']))
                                    : 'Status' ?>
                            </p>
                            <i class="fa-solid fa-angle-down"></i>
                        </div>

                        <div class="drop-menu" role="menu" aria-labelledby="status-label">
                            <button type="button" class="item" data-value="">Todas</button>
                            <button type="button" class="item" data-value="ATIVO">Ativo</button>
                            <button type="button" class="item" data-value="INATIVO">Inativo</button>
                        </div>

                        <input type="hidden" name="status" id="status-hidden" value="<?= $_GET['status'] ?? '' ?>">
                    </div>
                </div>
            </form>
            <?php if (isset($_GET['pesquisa'])) {
                echo "<p id='qnt-busca'><i class='fa-solid fa-search'></i> " . $totalRegistros . " Notícias Encontradas</p>";
            } ?>
            <div class="area-cards">
                <?php
                if ($lista) {
                    foreach ($lista as $noticia) {
                        require '../../components/cards/card-noticia.php';
                    }
                } else {
                    $status = $_GET['status'] ?? '';
                    if ($status === 'ATIVO') {
                        echo 'Você não tem notícias ativas no momento.';
                    } elseif ($status === 'INATIVO') {
                        echo 'Você não tem notícias inativas no momento.';
                    } else {
                        echo 'Você ainda não publicou nenhuma notícia :(';
                    }
                }
                ?>
            </div>
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

<!-- Toasts -->
<div id="toast-noticia" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    Notícia criada com sucesso!
</div>
<div id="toast-noticia-erro" class="toast erro">
    <i class="fa-solid fa-triangle-exclamation"></i>
    Falha ao criar Notícia!
</div>

<?php
$jsPagina = ['ong/listagem.js'];
require_once '../../components/layout/footer/footer-logado.php';
// Ativar os toast
if (isset($_SESSION['criar-noticia'])) {
    if ($_SESSION['criar-noticia']) {
        echo "<script>mostrar_toast('toast-noticia')</script>";
    } else {
        echo "<script>mostrar_toast('toast-noticia-erro')</script>";
    }
    unset($_SESSION['criar-noticia']);
}
?>