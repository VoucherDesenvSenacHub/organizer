<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Encontre Projetos | Organizer';
$cssPagina = ['shared/catalogo.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$projetoModel = new ProjetoModel();
$categoriaModel = new CategoriaModel();

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$tipo = '';
$valor = ['pagina' => $paginaAtual];

if (isset($_GET['pesquisa'])) {
    $tipo = 'pesquisa';
    $valor['pesquisa'] = $_GET['pesquisa'];
}

if (isset($_GET['categorias'])) {
    $valor['categorias'] = $_GET['categorias'];
}

$categorias = $categoriaModel->buscarCategorias();
$lista = $projetoModel->listarCardsProjetos($tipo, $valor);
$totalRegistros = $projetoModel->paginacaoProjetos($tipo, $valor);
$paginas = ceil($totalRegistros / 8);

//Verificar se o doador marcou este projeto como favorito
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
        <section id="header-section">
            <form class="form-pesquisa" action="lista.php" method="GET">
                <div class="textos-pesquisa">
                    <h1>ENCONTRE PROJETOS</h1>
                    <p>Explore projetos inspiradores e apoie causas e faça a diferença hoje mesmo.</p>
                </div>
                <div class="filtro-pesquisa">
                    <ul>
                        <li>Categoria <i class="fa-solid fa-angle-down"></i></li>
                        <?php foreach ($categorias as $categoria): ?>
                            <li><label><input type="checkbox" name="categorias[]" value="<?= $categoria['categoria_id'] ?>"><?= $categoria['nome'] ?></label></li>
                        <?php endforeach; ?>
                    </ul>
                    <ul>
                        <li>Status <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="checkbox">Ativos</label></li>
                        <li><label><input type="checkbox">Finalizados</label></li>
                    </ul>
                    <button class="btn">Filtrar</button>
                </div>
                <div class="input-pesquisa">
                    <input type="text" name="pesquisa" placeholder="Busque um projeto"
                        value="<?= isset($_GET['pesquisa']) ? htmlspecialchars($_GET['pesquisa']) : (isset($pesquisaController) ? htmlspecialchars($pesquisaController) : '') ?>">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </div>
            </form>
            <div id="img-illustrativa">
                <img src="../../assets/images/pages/shared/criancas.png">
            </div>
        </section>
        <?php if (isset($_GET['pesquisa'])) {
            echo "<p class='qnt-busca'><i class='fa-solid fa-search'></i> " . $totalRegistros . " Projetos Encontrados</p>";
        } ?>

        <section id="box-ongs">
            <!-- LISTAR CARDS PROJETOS -->
            <?php foreach ($lista as $projeto) {
                require '../../components/cards/card-projeto.php';
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