<?php
ob_start();
$acesso       = 'ong';
$tituloPagina = 'Projetos | Organizer';
$cssPagina    = ['ong/listagem.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$projetoModel = new ProjetoModel();
$paginaAtual  = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

$ongId = $_SESSION['ong_id'];

// Monta os filtros
$filtros = [
    'pagina'   => $paginaAtual,
    'ong_id'   => $ongId,
    'pesquisa' => $_GET['pesquisa'] ?? null,
    'status'   => array_filter((array)($_GET['status'] ?? []))
];

// Busca lista e paginação
$lista          = $projetoModel->listarCardsProjetos($filtros);
$totalRegistros = $projetoModel->paginacaoProjetos($filtros);
$paginas        = ceil($totalRegistros / 8);

// Buscar as categorias
$categoriaModel = new CategoriaModel();
$Categorias     = $categoriaModel->buscarCategorias();

//FORMULÁRIO DE CRIAÇÃO DE PROJETO (popup)
$PerfilProjeto = [
    'projeto_id' => null,
    'nome' => null,
    'descricao' => null,
    'meta' => null,
    'categoria_id' => null,
    'valor_arrecadado' => null
];
require_once __DIR__ . '/../../components/popup/formulario-projeto.php';
ob_end_flush();

?>
<main class="conteudo-principal">
    <section>
        <div class="container">
            <div class="topo">
                <h1><i class="fa-solid fa-diagram-project"></i> MEUS PROJETOS</h1>
                <form id="form-busca" action="projetos.php" method="GET">
                    <input type="text" name="pesquisa" placeholder="Busque um Projeto" value="<?= $_GET['pesquisa'] ?? '' ?>">
                    <input type="hidden" name="status" value="<?= $_GET['status'] ?? '' ?>">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                    <button class="limpar-filtro" onclick="limparFiltros()">Limpar filtros</button>
                </form>
                <button class="btn btn-novo" onclick="abrir_popup('editar-projeto-popup')">NOVO PROJETO +</button>
            </div>
            <form id="form-filtro" action="projetos.php" method="GET">
                <div class="ul-group">
                    <div class="drop" id="esc-status" aria-haspopup="true" aria-expanded="false">
                        <div class="drop-title" tabindex="0">
                            <p id="status-label"><?= isset($_GET['status']) ? ucfirst(strtolower($_GET['status'])) : 'Status' ?></p>
                            <i class="fa-solid fa-angle-down"></i>
                        </div>

                        <div class="drop-menu" role="menu" aria-labelledby="status-label">
                            <button type="button" class="item" data-value="ATIVO">Ativo</button>
                            <button type="button" class="item" data-value="INATIVO">Inativo</button>
                            <button type="button" class="item" data-value="FINALIZADO">Finalizado</button>
                        </div>
                        <input type="hidden" name="status" id="status-hidden" value="<?= $_GET['status'] ?? '' ?>">
                    </div>
                </div>
            </form>
            <?php if (isset($_GET['pesquisa'])) {
                echo "<p id='qnt-busca'><i class='fa-solid fa-search'></i> " . $totalRegistros . " Projetos Encontrados</p>";
            } ?>
            <!-- CARDS DE PROJETOS -->
            <div class="area-cards">
                <?php
                if ($lista) {
                    foreach ($lista as $projeto) {
                        require '../../components/cards/card-projeto.php';
                    }
                } else {
                    $status = $_GET['status'] ?? '';
                    if ($status === 'ATIVO') {
                        echo 'Você não tem projetos ativos no momento.';
                    } elseif ($status === 'INATIVO') {
                        echo 'Você não tem projetos inativos no momento.';
                    } elseif ($status === 'FINALIZADO') {
                        echo 'Você não tem projetos finalizados no momento.';
                    } else {
                        echo 'Você ainda não tem nenhum projeto :(';
                    }
                }
                ?>
            </div>
            <?php if ($paginas > 1): ?>
                <nav class="paginacao">
                    <?php for ($i = 1; $i <= $paginas; $i++): ?>
                        <?php
                        $url = "?pagina=$i";
                        if (isset($_GET['pesquisa'])) {
                            $url .= '&pesquisa=' . urlencode($_GET['pesquisa']);
                        }
                        if (isset($_GET['status'])) {
                            $url .= '&status=' . urlencode($_GET['status']);
                        }
                        ?>
                        <a href="<?= $url ?>" class="<?= $i === $paginaAtual ? 'active' : '' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </nav>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php
$jsPagina = ['ong/limpar-filtro.js'];
require_once '../../components/layout/footer/footer-logado.php';
?>