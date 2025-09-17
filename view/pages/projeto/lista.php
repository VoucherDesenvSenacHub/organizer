<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Encontre Projetos | Organizer';
$cssPagina = ['shared/catalogo.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$projetoModel = new ProjetoModel();
$CategoriaModel = new CategoriaModel();

$categorias = $CategoriaModel->buscarCategorias();

// Dados vindos do controller (quando o form envia para o controller)
$dadosController = $_SESSION['controller_filtro'] ?? null;

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$categoriasSelecionadas = [];
unset($valor, $tipo);

if ($dadosController) {
    $lista = $dadosController['lista'];
    $totalRegistros = $dadosController['totalRegistros'];
    $paginaAtual = $dadosController['paginaAtual'];
    $categoriasSelecionadas = $dadosController['categoriasSelecionadas'] ?? [];
    $pesquisaController = $dadosController['pesquisa'] ?? '';
    unset($_SESSION['controller_filtro']);
} else {
    if (isset($_GET['filtro']) && !empty($_GET['filtro'])) {
        foreach ($categorias as $categoria) {
            if (isset($_GET["cat_{$categoria['categoria_id']}"])) {
                $categoriasSelecionadas[] = $categoria['categoria_id'];
            }
        }
        $valor['categorias'] = $categoriasSelecionadas;
    }

    $tipo = '';
    $valor = ['pagina' => $paginaAtual];

    if (isset($_GET['pesquisa'])) {
        $tipo = 'pesquisa';
        $valor['pesquisa'] = $_GET['pesquisa'];
    }

    if (isset($_GET['filtro']) && !empty($categoriasSelecionadas)) {
        $tipo = '';
        $valor['categorias'] = $categoriasSelecionadas;
    }

    $lista = $projetoModel->listarCardsProjetos($tipo, $valor);
    $totalRegistros = $projetoModel->paginacaoProjetos($tipo, $valor);
}

$paginas = ceil($totalRegistros / 8);


// Marcar categorias como checked
$categoriasComChecked = [];
foreach ($categorias as $cat) {
    $categoriasComChecked[$cat['categoria_id']] = in_array($cat['categoria_id'], $categoriasSelecionadas);
}

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
        <section id="top-info">
            <div id="info">
                <div>
                    <h1>ENCONTRE PROJETOS</h1>
                    <p>Explore projetos inspiradores e apoie causas e faça a diferença hoje mesmo.</p>
                    <form id="form-filtro" action="../../../controller/Projeto/BuscarProjetoController.php" method="GET">
                        <!-- ### -->
                        <input type="hidden" name="busca" value="1">
                        <input type="hidden" name="filtro" value="1">
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

                        <div id="form-busca">
                            <input type="text" name="pesquisa" placeholder="Busque um projeto" 
                                   value="<?= isset($_GET['pesquisa']) ? htmlspecialchars($_GET['pesquisa']) : (isset($pesquisaController) ? htmlspecialchars($pesquisaController) : '') ?>">
                            <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="imagem-top">
                <img src="../../assets/images/pages/shared/criancas.png">
            </div>
        </section>
        
        <!-- Mostrar contagem de resultados -->
        <?php 
        $temPesquisa = isset($_GET['pesquisa']) && !empty($_GET['pesquisa']);
        $temFiltro = isset($_GET['filtro']) && !empty($categoriasSelecionadas);
        $temPesquisaController = isset($pesquisaController) && !empty($pesquisaController);
        
        // Só mostrar contagem quando há filtro ou pesquisa ativos
        if ($temPesquisa || $temPesquisaController || $temFiltro || $dadosController) {
            $textoContagem = '';
            
            // Definir texto baseado na quantidade
            if ($totalRegistros == 0) {
                $texto = "Projeto não encontrado";
            } elseif ($totalRegistros == 1) {
                $texto = "1 Projeto encontrado";
            } else {
                $texto = $totalRegistros . " Projetos encontrados";
            }
            
            if ($temPesquisa || $temPesquisaController) {
                $textoContagem = "<i class='fa-solid fa-search'></i> " . $texto;
            } elseif ($temFiltro || (!empty($categoriasSelecionadas) && $dadosController)) {
                $textoContagem = "<i class='fa-solid fa-filter'></i> " . $texto;
            } else {
                $textoContagem = "<i class='fa-solid fa-list'></i> " . $texto;
            }
            echo "<p class='qnt-busca'>" . $textoContagem . "</p>";
        }
        ?>

        <section id="box-ongs">
            <!-- LISTAR CARDS PROJETOS -->
        <?php foreach ($lista as $projeto) {
            require '../../components/cards/card-projeto.php';
        } ?>
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
                if (!empty($categoriasSelecionadas)) {
                    foreach ($categoriasSelecionadas as $catId) {
                        $paramsPaginacao .= '&cat_' . $catId . '=1';
                    }
                    $paramsPaginacao .= '&filtro=1';
                }
            ?>
            <nav class="paginacao">
                <?php for ($i = 1; $i <= $paginas; $i++): ?>
                    <a href="../../../controller/Projeto/BuscarProjetoController.php?pagina=<?= $i ?><?= $paramsPaginacao ?>"
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