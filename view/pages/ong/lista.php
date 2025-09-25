<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Descubra Ongs | Organizer';
$cssPagina = ['shared/catalogo.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../controller/Ong/BuscarOngController.php';

// Persistência de filtros
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['filtros_ongs'] = $_POST;
} elseif (!isset($_GET['pagina'])) {
    unset($_SESSION['filtros_ongs']);
}

// Recuperar filtros
$post = $_SESSION['filtros_ongs'] ?? [];
$resultado = carregarListaOngs($_GET, $post);

// Dados retornados
$listaOngs = $resultado['lista'];
$paginas = $resultado['paginas'];
$paginaAtual = $resultado['paginaAtual'];
$totalRegistros = $resultado['totalRegistros'] ?? 0;
$ongsFavoritas = $resultado['favoritas'] ?? [];

// Filtros selecionados
$ordemSelecionada = $post['ordem'] ?? '';
$projetosSelecionado = $post['projetos'] ?? '';
$doacoesSelecionado = $post['doacoes'] ?? '';
$totalFiltros = !empty($ordemSelecionada) + !empty($projetosSelecionado) + !empty($doacoesSelecionado);
?>

<main class="<?= isset($_SESSION['usuario']['id']) ? 'usuario-logado' : 'visitante' ?>">
    <div class="container" id="container-catalogo">
        <section id="header-section">
            <form class="form-pesquisa" action="lista.php" method="POST">
                <div class="textos-pesquisa">
                    <h1>DESCUBRA AS ONGS</h1>
                    <p>Explore organizações que estão fazendo a diferença e saiba como você pode contribuir.</p>
                </div>
                <div class="filtro-pesquisa">
                    <ul>
                        <li>Ordem <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="radio" name="ordem" value="novas" <?= $ordemSelecionada === 'novas' ? 'checked' : '' ?>>Novas</label></li>
                        <li><label><input type="radio" name="ordem" value="antigas" <?= $ordemSelecionada === 'antigas' ? 'checked' : '' ?>>Antigas</label></li>
                    </ul>
                    <ul>
                        <li>Projetos <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="radio" name="projetos" value="5" <?= $projetosSelecionado === '5' ? 'checked' : '' ?>>Até 5</label></li>
                        <li><label><input type="radio" name="projetos" value="10" <?= $projetosSelecionado === '10' ? 'checked' : '' ?>>Até 10</label></li>
                        <li><label><input type="radio" name="projetos" value="mais10" <?= $projetosSelecionado === 'mais10' ? 'checked' : '' ?>>Mais de 10</label></li>
                    </ul>
                    <ul>
                        <li>Doações <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="radio" name="doacoes" value="10" <?= $doacoesSelecionado === '10' ? 'checked' : '' ?>>Até 10</label></li>
                        <li><label><input type="radio" name="doacoes" value="20" <?= $doacoesSelecionado === '20' ? 'checked' : '' ?>>Até 20</label></li>
                        <li><label><input type="radio" name="doacoes" value="mais20" <?= $doacoesSelecionado === 'mais20' ? 'checked' : '' ?>>Mais de 20</label></li>
                    </ul>
                    <button class="btn">Filtrar</button>
                </div>
                <div class="input-pesquisa">
                    <input type="text" name="pesquisa" placeholder="Busque uma ONG" value="<?= $post['pesquisa'] ?? '' ?>">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </div>
            </form>
            <div id="img-illustrativa">
                <img src="../../assets/images/pages/shared/time.png">
            </div>
        </section>
        <?php if (isset($totalRegistros)): ?>
            <div class="resultado-busca">
                <p><?= $totalRegistros ?> Ongs</p>
                <p><i class='fa-solid fa-filter'></i> <?= $totalFiltros ?> Filtros</p>
            </div>
        <?php endif; ?>
        <section id="box-ongs">
            <?php foreach ($listaOngs as $ong) {
                $jaFavoritada = isset($_SESSION['usuario']['id']) && in_array($ong['ong_id'], $ongsFavoritas);
                require '../../components/cards/card-ong.php';
            }
            ?>
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