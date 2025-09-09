<?php
ob_start();
//CONFIGURAÇÕES DA PÁGINA
$acesso = 'ong';
$tituloPagina = 'Projetos | Organizer';
$cssPagina = ['ong/listagem.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';

//CARREGA CARDS DE PROJETOS
$projetoModel = new ProjetoModel();
$IdOng = $_SESSION['ong_id'];
$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$tipo = 'ong';
$valor = ['ong_id' => $IdOng, 'pagina' => $paginaAtual];
$status = $_GET['status'] ?? null;
if ($status) {
    $valor['status'] = $status;
}
if (isset($_GET['pesquisa'])) {
    $tipo = 'pesquisa';
    $valor['pesquisa'] = $_GET['pesquisa'];
}
$lista = $projetoModel->listarCardsProjetos($tipo, $valor);
$totalRegistros = $projetoModel->paginacaoProjetos($tipo, $valor);
$paginas = ceil($totalRegistros / 8);

// Buscar as categorias
$categoriaModel = new CategoriaModel();
$Categorias = $categoriaModel->buscarCategorias();

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
                <form id="form-filtro" action="projetos.php" method="GET">
                    <select name="status" onchange="this.form.submit()">
                        <option value="">Todos os Status</option>
                        <option value="ATIVO" <?= (isset($_GET['status']) && $_GET['status'] == 'ATIVO') ? 'selected' : '' ?>>Ativo</option>
                        <option value="INATIVO" <?= (isset($_GET['status']) && $_GET['status'] == 'INATIVO') ? 'selected' : '' ?>>Inativo</option>
                        <option value="FINALIZADO" <?= (isset($_GET['status']) && $_GET['status'] == 'FINALIZADO') ? 'selected' : '' ?>>Finalizado</option>
                    </select>
                </form>
                <form id="form-busca" action="projetos.php" method="GET">
                    <input type="text" name="pesquisa" placeholder="Busque um Projeto" value="<?= $_GET['pesquisa'] ?? '' ?>">
                    <input type="hidden" name="status" value="<?= $_GET['status'] ?? '' ?>">
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
                <nav class="navegacao">
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