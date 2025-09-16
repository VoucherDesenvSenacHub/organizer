<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Descubra Ongs | Organizer';
$cssPagina = ['shared/catalogo.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$ongModel = new OngModel();

// Dados vindos do controller (quando o form envia para o controller)
$dadosController = $_SESSION['controller_filtro_ongs'] ?? null;

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$filtros = [];
unset($valor, $tipo);

$totalRegistros = 0;
if ($dadosController) {
    $lista = $dadosController['lista'];
    $totalRegistros = $dadosController['totalRegistros'];
    $paginaAtual = $dadosController['paginaAtual'];
    $filtros = $dadosController['filtros'] ?? [];
    $pesquisaController = $dadosController['pesquisa'] ?? '';
    unset($_SESSION['controller_filtro_ongs']);
} else {
    $valor = ['pagina' => $paginaAtual];
    $tipo = '';
    $lista = $ongModel->listarCardsOngs($tipo, $valor);
    $totalRegistros = $ongModel->paginacaoOngs($tipo, $valor);
}

$paginas = (int)ceil($totalRegistros / 6);

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
                    <form id="form-filtro" action="../../../controller/Ong/BuscarOngController.php" method="GET">
                        <input type="hidden" name="busca" value="1">
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
                        <div id="form-busca">
                            <input type="text" name="pesquisa" placeholder="Busque uma ONG"
                                value="<?= isset($_GET['pesquisa']) ? htmlspecialchars($_GET['pesquisa']) : (isset($pesquisaController) ? htmlspecialchars($pesquisaController) : '') ?>">
                            <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div id="imagem-top">
                    <img src="../../assets/images/pages/shared/time.png">
                </div>
        </section>

        <!-- Mostrar contagem de resultados -->
        <?php
        $temPesquisa = isset($_GET['pesquisa']) && !empty($_GET['pesquisa']);
        $temFiltro = isset($_GET['filtro']) && !empty($filtros);
        $temPesquisaController = isset($pesquisaController) && !empty($pesquisaController);

        // Só mostrar contagem quando há filtro ou pesquisa ativos
        if ($temPesquisa || $temPesquisaController || $temFiltro) {
            $textoContagem = '';

            // Definir texto baseado na quantidade
            if ($totalRegistros == 0) {
                $texto = "ONG não encontrada";
            } elseif ($totalRegistros == 1) {
                $texto = "1 ONG encontrada";
            } else {
                $texto = $totalRegistros . " ONGs encontradas";
            }

            if ($temPesquisa || $temPesquisaController) {
                $textoContagem = "<i class='fa-solid fa-search'></i> " . $texto;
            } elseif ($temFiltro) {
                $textoContagem = "<i class='fa-solid fa-filter'></i> " . $texto;
            }
            echo "<p class='qnt-busca'>" . $textoContagem . "</p>";
        }
        ?>

        <section id="box-ongs">
            <?php if (empty($lista)): ?>
                <div class="sem-resultados">
                    <i class="fa-solid fa-search"></i>
                    <p>Nenhuma ONG encontrada</p>
                </div>
            <?php else: ?>
                <?php foreach ($lista as $ong) {
                    $jaFavoritada = isset($_SESSION['usuario']['id']) && in_array($ong['ong_id'], $ongsFavoritas);
                    require '../../components/cards/card-ong.php';
                }
                ?>
            <?php endif; ?>
        </section>
        <?php if ($paginas > 1): ?>
            <?php
            // Monta parâmetros para manter filtro/pesquisa na paginação via controller
            $paramsPaginacao = '';
            if (isset($_GET['pesquisa']) && $_GET['pesquisa'] !== '') {
                $paramsPaginacao .= '&pesquisa=' . urlencode($_GET['pesquisa']);
            } elseif (isset($pesquisaController) && $pesquisaController !== '') {
                $paramsPaginacao .= '&pesquisa=' . urlencode($pesquisaController);
            }
            if (!empty($filtros)) {
                if (isset($filtros['tempo'])) {
                    $paramsPaginacao .= '&' . ($filtros['tempo'] === 'mais-recentes' ? 'recentes' : 'antigos') . '=1';
                }
                if (isset($filtros['quantidade'])) {
                    $paramsPaginacao .= '&' . $filtros['quantidade'] . '=1';
                }
                $paramsPaginacao .= '&filtro=1';
            }
            ?>
            <nav class="navegacao">
                <?php for ($i = 1; $i <= $paginas; $i++): ?>
                    <a href="../../../controller/Ong/BuscarOngController.php?pagina=<?= $i ?><?= $paramsPaginacao ?>"
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