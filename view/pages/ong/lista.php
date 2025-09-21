<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Descubra Ongs | Organizer';
$cssPagina = ['shared/catalogo.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$ongModel = new OngModel();

// Paginação
$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$tipo = '';
$valor = ['pagina' => $paginaAtual];

if (isset($_GET['pesquisa'])) {
    $tipo = 'pesquisa';
    $valor['pesquisa'] = $_GET['pesquisa'];
}

$lista = $ongModel->listarCardsOngs($tipo, $valor);
$totalRegistros = $ongModel->paginacaoOngs($tipo, $valor);
$paginas = (int)ceil($totalRegistros / 6);

// Buscar os favoritos
if (isset($_SESSION['usuario']['id'])) {
    $ongsFavoritas = $ongModel->listarFavoritas($_SESSION['usuario']['id']);
}
?>
<main class="<?= isset($_SESSION['usuario']['id']) ? 'usuario-logado' : 'visitante' ?>">
    <div class="container" id="container-catalogo">
        <section id="header-section">
            <form class="form-pesquisa" action="lista.php" method="GET">
                <div class="textos-pesquisa">
                    <h1>DESCUBRA AS ONGS</h1>
                    <p>Explore organizações que estão fazendo a diferença e saiba como você pode contribuir.</p>
                </div>
                <div class="filtro-pesquisa">
                    <ul>
                        <li>Ordem <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="radio" name="ordem">Novas</label></li>
                        <li><label><input type="radio" name="ordem">Antigas</label></li>
                    </ul>
                    <ul>
                        <li>Projetos <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="radio" name="projetos">Até 5</label></li>
                        <li><label><input type="radio" name="projetos">Até 10</label></li>
                        <li><label><input type="radio" name="projetos">Mais de 10</label></li>
                    </ul>
                    <ul>
                        <li>Doações <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="radio" name="doacoes">Até 10</label></li>
                        <li><label><input type="radio" name="doacoes">Até 20</label></li>
                        <li><label><input type="radio" name="doacoes">Mais de 20</label></li>
                    </ul>
                    <button class="btn">Filtrar</button>
                </div>
                <div class="input-pesquisa">
                    <input type="text" name="pesquisa" placeholder="Busque uma ONG">
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
            </div>
        <?php endif; ?>
        <section id="box-ongs">
            <?php foreach ($lista as $ong) {
                $jaFavoritada = isset($_SESSION['usuario']['id']) && in_array($ong['ong_id'], $ongsFavoritas);
                require '../../components/cards/card-ong.php';
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
</main>

<!-- Toasts -->
<div id="toast-favorito" class="toast">
    <i class="fa-solid fa-heart"></i>
    Adicionado aos favoritos!
</div>
<div id="toast-remover-favorito" class="toast erro">
    <i class="fa-solid fa-heart-crack"></i>
    Removido dos favoritos!
</div>

<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
// Ativar os toast
if (isset($_SESSION['favorito'])) {
    if ($_SESSION['favorito']) {
        echo "<script>mostrar_toast('toast-favorito')</script>";
    } else {
        echo "<script>mostrar_toast('toast-remover-favorito')</script>";
    }
    unset($_SESSION['favorito']);
}
?>