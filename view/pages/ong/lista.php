<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Descubra Ongs | Organizer';
$cssPagina = ['shared/catalogo.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$ongModel = new OngModel();

// Receber dados do controller
$controllerData = $_SESSION['controller_ongs'] ?? [];
$lista = $controllerData['lista'] ?? [];
$filtros = $controllerData['filtros'] ?? [];
$pesquisa = $controllerData['pesquisa'] ?? '';
$paginaAtual = $controllerData['paginaAtual'] ?? 1;
unset($_SESSION['controller_ongs']);

// Se lista estiver vazia (nenhum filtro ou pesquisa), carregar padrão
if (empty($lista)) {
    $lista = $ongModel->listarCardsOngs();
}

// Buscar os favoritos
if (isset($_SESSION['usuario']['id'])) {
    $ongsFavoritas = $ongModel->listarFavoritas($_SESSION['usuario']['id']);
}
?>
<main class="<?= isset($_SESSION['usuario']['id']) ? 'usuario-logado' : 'visitante' ?>">
    <div class="container" id="container-catalogo">
        <section id="top-info">
            <div id="info">
                <div>
                    <h1>DESCUBRA AS ONGS</h1>
                    <p>Explore organizações que estão fazendo a diferença e saiba como você pode contribuir.</p>
                    <form id="form-filtro" action="../../../controller/Ong/BuscarOngController.php" method="POST">
                        <input type="hidden" name="filtro" value="1">
                        <!-- ### -->
                        <div class="ul-group">
                            <ul class="drop" id="esc-status">
                                <li>
                                    <p>Ordem</p>
                                    <i class="fa-solid fa-angle-down"></i>
                                </li>
                                <li>
                                    <input type="checkbox" name="recentes" id="recentes" <?= ($filtros['tempo'] ?? '') === 'mais-recentes' ? 'checked' : '' ?>>
                                    <label for="recentes">Mais recentes</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="antigos" id="antigos" <?= ($filtros['tempo'] ?? '') === 'mais-antigos' ? 'checked' : '' ?>>
                                    <label for="antigos">Mais antigos</label>
                                </li>
                            </ul>
                            <ul class="drop" id="esc-q-projetos">
                                <li>
                                    <p>Quantidade</p>
                                    <i class="fa-solid fa-angle-down"></i>
                                </li>
                                <li>
                                    <input type="checkbox" name="1-3" id="1-3" <?= ($filtros['quantidade'] ?? '') === '1-3' ? 'checked' : '' ?>>
                                    <label for="1-3">1 à 3 projetos</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="4+" id="4+" <?= ($filtros['quantidade'] ?? '') === '4+' ? 'checked' : '' ?>>
                                    <label for="4+">4+</label>
                                </li>
                            </ul>

                        </div>
                        <button class="btn">Filtrar</button>
                    </form>
                </div>
                <form id="form-busca" action="../../../controller/Ong/BuscarOngController.php" method="POST">
                    <input type="text" name="pesquisa" placeholder="Busque uma ONG">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </form>
            </div>
            <div id="imagem-top">
                <img src="../../assets/images/pages/shared/time.png">
            </div>
        </section>
        <?php if (isset($_GET['pesquisa'])) {
            echo "<p class='qnt-busca'><i class='fa-solid fa-search'></i> " . count($lista) . " ONGS Encontradas</p>";
        } ?>
        <section id="box-ongs">
            <?php foreach ($lista as $ong) {
                $jaFavoritada = isset($_SESSION['usuario']['id']) && in_array($ong['ong_id'], $ongsFavoritas);
                require '../../components/cards/card-ong.php';
            }
            ?>
        </section>
        <nav id="navegacao">
            <a class="active" href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">></a>
        </nav>
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
$jsPagina = ['ong/lista-cards.js'];
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