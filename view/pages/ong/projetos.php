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
    'pesquisa' => $_GET['pesquisa'] ?? null
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
                <form id="form-busca" action="#" method="GET">
                    <input type="text" name="pesquisa" placeholder="Busque um Projeto">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </form>
                <button class="btn btn-novo" onclick="abrir_popup('editar-projeto-popup')">NOVO PROJETO +</button>
            </div>
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
                    echo 'Você ainda não tem nenhum projeto :(';
                }
                ?>
            </div>
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
    </section>
</main>

<!-- Toasts -->
<div id="toast-projeto" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    Projeto criado com sucesso!
</div>
<div id="toast-projeto-erro" class="toast erro">
    <i class="fa-solid fa-triangle-exclamation"></i>
    Falha ao criar Projeto!
</div>

<?php
$jsPagina = ['ong/projetos.js'];
require_once '../../components/layout/footer/footer-logado.php';

if (isset($_SESSION['criar-projeto'])) {
    if ($_SESSION['criar-projeto']) {
        echo "<script>mostrar_toast('toast-projeto')</script>";
    } else {
        echo "<script>mostrar_toast('toast-projeto-erro')</script>";
    }
    unset($_SESSION['criar-projeto']);
}
?>