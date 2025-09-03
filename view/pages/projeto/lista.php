<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Encontre Projetos | Organizer';
$cssPagina = ['shared/catalogo.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$projetoModel = new ProjetoModel();

$mapaCategorias = [
    'educacao'   => 1,
    'saude'      => 2,
    'esporte'    => 3,
    'cultura'    => 4,
    'tecnologia' => 5,
    'ambiente'   => 6
];

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

// Definir modo
$modo = 'padrao';
if (isset($_GET['pesquisa'])) {
    $modo = 'pesquisa';
} elseif (isset($_GET['filtro'])) {
    $modo = 'filtro';
}

// Listar projetos conforme o modo
switch ($modo) {
    case 'pesquisa':
        $valor = [
            'pagina'   => $paginaAtual,
            'pesquisa' => $_GET['pesquisa']
        ];
        $lista = $projetoModel->listarCardsProjetos('pesquisa', $valor);
        $totalRegistros = $projetoModel->paginacaoProjetos('pesquisa', $valor);
        break;

    case 'filtro':
        $categoriasSelecionadas = [];
        foreach ($mapaCategorias as $nome => $id) {
            if (isset($_GET[$nome])) {
                $categoriasSelecionadas[] = $id;
            }
        }

        $lista = $projetoModel->filtrarPorCategorias($categoriasSelecionadas, $paginaAtual);
        $totalRegistros = $projetoModel->paginacaoFiltroCategorias($categoriasSelecionadas);
        break;

    default: // padrão, sem filtro ou busca
        $valor = ['pagina' => $paginaAtual];
        $lista = $projetoModel->listarCardsProjetos('', $valor);
        $totalRegistros = $projetoModel->paginacaoProjetos('', $valor);
        break;
}

// Calcular páginas
$paginas = ceil($totalRegistros / 8);

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
                    <form id="form-filtro" action="lista.php" method="GET">
                        <input type="hidden" name="filtro" value="1">
                        <!-- ### -->
                        <div class="ul-group">
                            <ul class="drop" id="esc-categoria">
                                <li>
                                    <p>Categoria</p>
                                    <i class="fa-solid fa-angle-down"></i>
                                </li>

                                <?php foreach ($mapaCategorias as $nome => $id): ?>
                                    <li>
                                        <input type="checkbox" name="<?= $nome ?>" id="<?= $nome ?>"
                                            <?= isset($_GET[$nome]) ? 'checked' : '' ?>>
                                        <label for="<?= $nome ?>"><?= ucfirst($nome) ?></label>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        </div>
                        <button class="btn">Filtrar</button>
                    </form>
                </div>
                <form id="form-busca" action="lista.php" method="GET">
                    <input type="text" name="pesquisa" placeholder="Busque um projeto">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </form>
            </div>
            <div id="imagem-top">
                <img src="../../assets/images/pages/shared/criancas.png">
            </div>
        </section>
        <?php if (isset($_GET['pesquisa']) || isset($_GET['filtro'])) {
            echo "<p class='qnt-busca'><i class='fa-solid fa-search'></i> " . $totalRegistros . " Projetos Encontrados</p>";
        } ?>

        <section id="box-ongs">
            <!-- LISTAR CARDS PROJETOS -->
            <?php foreach ($lista as $projeto) {
                require '../../components/cards/card-projeto.php';
            } ?>
        </section>
        <?php if ($paginas > 1): ?>
            <nav class="navegacao">
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