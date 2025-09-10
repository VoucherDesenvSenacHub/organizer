<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Encontre Projetos | Organizer';
$cssPagina = ['shared/catalogo.css'];

require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';

$projetoModel = new ProjetoModel();
$categoriaModel = new CategoriaModel();
$categorias = $categoriaModel->buscarCategorias();

// Receber dados do controller ou padrão
$controllerData = $_SESSION['controller_filtro'] ?? [];
unset($_SESSION['controller_filtro']);

$lista = $controllerData['lista'] ?? [];
$totalRegistros = $controllerData['totalRegistros'] ?? 0;
$paginaAtual = $controllerData['paginaAtual'] ?? 1;
$categoriasSelecionadas = $controllerData['categoriasSelecionadas'] ?? [];
$pesquisa = $controllerData['pesquisa'] ?? '';


// Se não teve filtro ou pesquisa, carregar lista padrão
if (empty($lista)) {
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    if ($paginaAtual < 1) $paginaAtual = 1;

    $valor = ['pagina' => $paginaAtual];
    $lista = $projetoModel->listarCardsProjetos('', $valor);
    $totalRegistros = $projetoModel->paginacaoProjetos('', $valor);
}

// Marcar categorias como checked
$categoriasComChecked = [];
foreach ($categorias as $cat) {
    $categoriasComChecked[$cat['categoria_id']] = in_array($cat['categoria_id'], $categoriasSelecionadas);
}

// Calcular páginas
$paginas = ceil($totalRegistros / 8);

// Criar URLs de paginação
$urlsPaginacao = [];
for ($i = 1; $i <= $paginas; $i++) {
    $url = "../../../controller/Projeto/FiltrarProjetoController.php?pagina={$i}";
    if (!empty($pesquisa)) $url .= "&pesquisa=" . urlencode($pesquisa);
    if (!empty($categoriasSelecionadas)) {
        $url .= "&filtro=1";
        foreach ($categoriasSelecionadas as $catId) {
            $url .= "&cat_{$catId}=1";
        }
    }
    $urlsPaginacao[$i] = $url;
}

// Verificar se o doador marcou este projeto como favorito
if (isset($_SESSION['usuario']['id']) && $_SESSION['perfil_usuario'] === 'doador') {
    $projetosFavoritos = $projetoModel->listarFavoritos($_SESSION['usuario']['id']);
}
?>
<!-- Toast de Favoritar -->
<div id="toast-favorito" class="toast">
    <i class="fa-solid fa-heart"></i>
    Adicionado aos favoritos!
</div>
<div id="toast-remover-favorito" class="toast erro">
    <i class="fa-solid fa-heart-crack"></i>
    Removido dos favoritos!
</div>
<!-- 
    Ínicio da Página
-->
<main class="<?= isset($_SESSION['usuario']['id']) ? 'usuario-logado' : 'visitante' ?>">
    <div class="container" id="container-catalogo">
        <section id="top-info">
            <div id="info">
                <div>
                    <h1>ENCONTRE PROJETOS</h1>
                    <p>Explore projetos inspiradores e apoie causas e faça a diferença hoje mesmo.</p>
                    <form id="form-filtro" action="../../../controller/Projeto/FiltrarProjetoController.php" method="GET">
                        <input type="hidden" name="filtro" value="1">
                        <!-- ### -->
                        <div class="ul-group">
                            <ul class="drop" id="esc-categoria">
                                <li>
                                    <p>Categoria</p>
                                    <i class="fa-solid fa-angle-down"></i>
                                </li>

                                <?php foreach ($categorias as $categoria): ?>
                                    <li>
                                        <input type="checkbox" name="cat_<?= $categoria['categoria_id'] ?>"
                                            id="cat_<?= $categoria['categoria_id'] ?>"
                                            <?= $categoriasComChecked[$categoria['categoria_id']] ? 'checked' : '' ?>>
                                        <label for="cat_<?= $categoria['categoria_id'] ?>"><?= ucfirst($categoria['nome']) ?></label>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        </div>
                        <button class="btn">Filtrar</button>
                    </form>
                </div>
                <form id="form-busca" action="../../../controller/Projeto/FiltrarProjetoController.php" method="GET">
                    <input type="text" name="pesquisa" placeholder="Busque um projeto" value="<?= htmlspecialchars($pesquisa) ?>">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </form>
            </div>
            <div id="imagem-top">
                <img src="../../assets/images/pages/shared/criancas.png">
            </div>
        </section>
        <?php if (!empty($pesquisa) || !empty($categoriasSelecionadas)): ?>
            <p class='qnt-busca'>
                <i class='fa-solid fa-search'></i> <?= $totalRegistros ?> Projetos Encontrados
            </p>
        <?php endif; ?>

        <section id="box-ongs">
            <!-- LISTAR CARDS PROJETOS -->
            <?php foreach ($lista as $projeto) {
                require '../../components/cards/card-projeto.php';
            } ?>
        </section>
        <?php if ($paginas > 1): ?>
            <nav class="navegacao">
                <?php if ($paginas > 1): ?>
                    <nav class="navegacao">
                        <?php foreach ($urlsPaginacao as $i => $url): ?>
                            <a href="<?= $url ?>" class="<?= $i === $paginaAtual ? 'active' : '' ?>"><?= $i ?></a>
                        <?php endforeach; ?>
                    </nav>
                <?php endif; ?>
            </nav>
        <?php endif; ?>
    </div>
</main>

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