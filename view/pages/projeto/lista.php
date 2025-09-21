<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Encontre Projetos | Organizer';
$cssPagina = ['shared/catalogo.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../controller/Projeto/BuscarProjetoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['filtros_projetos'] = $_POST;
} elseif (!isset($_GET['pagina'])) {
    unset($_SESSION['filtros_projetos']);
}

$post = $_SESSION['filtros_projetos'] ?? [];
$resultado = carregarListaProjetos($_GET, $post);

$categorias = $resultado['categorias'];
$listaProjetos = $resultado['lista'];

$paginas = $resultado['paginas'];
$paginaAtual = $resultado['paginaAtual'];
$totalRegistros = $resultado['totalRegistros'] ?? 0;

$projetosFavoritos = $resultado['favoritos'] ?? [];
$statusSelecionado = $post['status'] ?? [];
$categoriasSelecionadas = $_SESSION['filtros_projetos']['categorias'] ?? [];
?>
<main class="<?= isset($_SESSION['usuario']['id']) ? 'usuario-logado' : 'visitante' ?>">
    <div class="container" id="container-catalogo">
        <section id="header-section">
            <form class="form-pesquisa" action="lista.php" method="POST">
                <div class="textos-pesquisa">
                    <h1>ENCONTRE PROJETOS</h1>
                    <p>Explore projetos inspiradores e apoie causas e faça a diferença hoje mesmo.</p>
                </div>
                <div class="filtro-pesquisa">
                    <ul>
                        <li>Ordem <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="radio" name="ordem" value="novos" <?= ($post['ordem'] ?? '') === 'novos' ? 'checked' : '' ?>>Novos</label></li>
                        <li><label><input type="radio" name="ordem" value="antigos" <?= ($post['ordem'] ?? '') === 'antigos' ? 'checked' : '' ?>>Antigos</label></li>
                    </ul>
                    <ul>
                        <li>Status <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="checkbox" name="status[]" value="ATIVO" <?= in_array('ATIVO', $statusSelecionado) ? 'checked' : '' ?>>Ativos</label></li>
                        <li><label><input type="checkbox" name="status[]" value="FINALIZADO" <?= in_array('FINALIZADO', $statusSelecionado) ? 'checked' : '' ?>>Finalizados</label></li>
                    </ul>
                    <ul>
                        <li>Categoria <i class="fa-solid fa-angle-down"></i></li>
                        <?php foreach ($categorias as $categoria): ?>
                            <li>
                                <?php $checked = in_array($categoria['categoria_id'], $categoriasSelecionadas) ? 'checked' : ''; ?>
                                <label> <input type="checkbox" name="categorias[]" value="<?= $categoria['categoria_id'] ?>" <?= $checked ?>> <?= $categoria['nome'] ?> </label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <button class="btn">Filtrar</button>
                </div>
                <div class="input-pesquisa">
                    <input type="text" name="pesquisa" placeholder="Busque um projeto" value="<?= isset($_SESSION['filtros_projetos']) ? $_SESSION['filtros_projetos']['pesquisa'] : '' ?>">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </div>
            </form>
            <div id="img-illustrativa">
                <img src="../../assets/images/pages/shared/criancas.png">
            </div>
        </section>
        <?php if (isset($totalRegistros)): ?>
            <div class="resultado-busca">
                <p><?= $totalRegistros ?> Projetos</p>
                <p><i class='fa-solid fa-filter'></i> <?= count($categoriasSelecionadas) + count($statusSelecionado) ?> Filtros</p>
            </div>
        <?php endif; ?>

        <section id="box-ongs">
            <!-- LISTAR CARDS PROJETOS -->
            <?php foreach ($listaProjetos as $projeto) {
                require '../../components/cards/card-projeto.php';
            } ?>
        </section>
        <?php if ($paginas > 1): ?>
            <nav class="paginacao">
                <?php for ($i = 1; $i <= $paginas; $i++): ?>
                    <a href="?pagina=<?= $i ?>" class="<?= $i == $paginaAtual ? 'active' : '' ?>"> <?= $i ?> </a>
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