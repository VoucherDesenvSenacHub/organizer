<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Acompanhe Notícias | Organizer';
$cssPagina = ['shared/catalogo.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$noticiaModel = new NoticiaModel();

// Paginação
$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$tipo = '';
$valor = ['pagina' => $paginaAtual];

if (isset($_GET['pesquisa'])) {
    $tipo = 'pesquisa';
    $valor['pesquisa'] = $_GET['pesquisa'];
}

$lista = $noticiaModel->listarCardsNoticias($tipo, $valor);
$totalRegistros = $noticiaModel->paginacaoNoticias($tipo, $valor);
$paginas = (int)ceil($totalRegistros / 6);

?>

<main class="<?= isset($_SESSION['usuario']['id']) ? 'usuario-logado' : 'visitante' ?>">
    <div class="container" id="container-catalogo">
        <section id="header-section">
            <form class="form-pesquisa" action="lista.php" method="GET">
                <div class="textos-pesquisa">
                    <h1>NOTÍCIAS</h1>
                    <p>Acompanhe as novidades e os impactos das ONGs e saiba como elas estão transformando vidas.</p>
                </div>
                <div class="filtro-pesquisa">
                    <ul>
                        <li>Ordem <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="checkbox">Novas</label></li>
                        <li><label><input type="checkbox">Antigas</label></li>
                    </ul>
                    <button class="btn">Filtrar</button>
                </div>
                <div class="input-pesquisa">
                    <input type="text" name="pesquisa" placeholder="Busque uma Notícia">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </div>
            </form>
            <div id="img-illustrativa">
                <img src="../../assets/images/pages/shared/mundo.png">
            </div>
        </section>
        <?php if (isset($totalRegistros)): ?>
            <div class="resultado-busca">
                <p><?= $totalRegistros ?> Notícias</p>
            </div>
        <?php endif; ?>

        <section id="box-ongs">
            <!-- LISTAR CARDS -->
            <?php foreach ($lista as $noticia) {
                require '../../components/cards/card-noticia.php';
            } ?>
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
</main>
<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
?>