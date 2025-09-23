<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Acompanhe Notícias | Organizer';
$cssPagina = ['shared/catalogo.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../controller/Noticia/BuscarNoticiaController.php';

// Persistência de filtros
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['filtros_noticias'] = $_POST;
} elseif (!isset($_GET['pagina'])) {
    unset($_SESSION['filtros_noticias']);
}

// Recuperar filtros
$post = $_SESSION['filtros_noticias'] ?? [];
$resultado = carregarListaNoticias($_GET, $post);

// Dados retornados
$listaNoticias = $resultado['lista'];
$paginas = $resultado['paginas'];
$paginaAtual = $resultado['paginaAtual'];
$totalRegistros = $resultado['totalRegistros'] ?? 0;

// Filtros selecionados
$ordemSelecionada = $post['ordem'] ?? '';
?>

<main class="<?= isset($_SESSION['usuario']['id']) ? 'usuario-logado' : 'visitante' ?>">
    <div class="container" id="container-catalogo">
        <section id="header-section">
            <form class="form-pesquisa" action="lista.php" method="POST">
                <div class="textos-pesquisa">
                    <h1>NOTÍCIAS</h1>
                    <p>Acompanhe as novidades e os impactos das ONGs e saiba como elas estão transformando vidas.</p>
                </div>
                <div class="filtro-pesquisa">
                    <ul>
                        <li>Ordem <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="radio" name="ordem" value="novas" <?= $ordemSelecionada === 'novas' ? 'checked' : '' ?>>Novas</label></li>
                        <li><label><input type="radio" name="ordem" value="antigas" <?= $ordemSelecionada === 'antigas' ? 'checked' : '' ?>>Antigas</label></li>
                    </ul>
                    <button class="btn">Filtrar</button>
                </div>
                <div class="input-pesquisa">
                    <input type="text" name="pesquisa" placeholder="Busque uma Notícia" value="<?= $post['pesquisa'] ?? '' ?>">
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
            <?php foreach ($listaNoticias as $noticia) {
                require '../../components/cards/card-noticia.php';
            } ?>
        </section>
        <?php if ($paginas > 1): ?>
            <nav class="paginacao">
                <?php for ($i = 1; $i <= $paginas; $i++): ?>
                    <a href="?pagina=<?= $i ?>" class="<?= $i == $paginaAtual ? 'active' : '' ?>"> <?= $i ?> </a>
                <?php endfor; ?>
            </nav>
        <?php endif; ?>
    </div>
</main>
<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
?>