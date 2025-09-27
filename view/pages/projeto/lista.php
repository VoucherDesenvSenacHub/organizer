<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Encontre Projetos | Organizer';
$cssPagina = ['shared/catalogo.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../controller/Projeto/BuscarProjetoController.php';

$post = $_POST ?? [];
$resultado = carregarListaProjetos($_GET, $post);

$categorias = $resultado['categorias'];
$listaProjetos = $resultado['lista'];
$paginas = $resultado['paginas'];
$paginaAtual = $resultado['paginaAtual'];
$totalRegistros = $resultado['totalRegistros'] ?? 0;
$projetosFavoritos = $resultado['favoritos'] ?? [];

$statusSelecionado = $post['status'] ?? [];
$categoriasSelecionadas = $post['categorias'] ?? [];
$pesquisa = $post['pesquisa'] ?? '';
?>
<main class="<?= isset($_SESSION['usuario']['id']) ? 'usuario-logado' : 'visitante' ?>">
    <div class="container" id="container-catalogo">
        <section id="header-section">
            <form id="form-filtros" class="form-pesquisa" action="lista.php" method="POST">
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
                </div>
                <div class="input-pesquisa">
                    <input type="text" name="pesquisa" placeholder="Busque um projeto" value="<?= htmlspecialchars($pesquisa) ?>">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </div>
            </form>
            <div id="img-illustrativa">
                <img src="../../assets/images/pages/shared/criancas.png">
            </div>
        </section>

        <section id="resultado-filtros">
            <div class="resultado-busca">
                <p><?= $totalRegistros ?> Projetos</p>
                <p><i class='fa-solid fa-filter'></i> <?= count($categoriasSelecionadas) + count($statusSelecionado) ?> Filtros</p>
            </div>

            <div class="lista-cards">
                <?php foreach ($listaProjetos as $projeto) {
                    require '../../components/cards/card-projeto.php';
                } ?>
            </div>
            <?php if ($paginas > 1): ?>
                <nav class="paginacao">
                    <?php for ($i = 1; $i <= $paginas; $i++): ?>
                        <a href="?pagina=<?= $i ?>" class="<?= $i == $paginaAtual ? 'active' : '' ?>"> <?= $i ?> </a>
                    <?php endfor; ?>
                </nav>
            <?php endif; ?>
        </section>
    </div>
</main>
<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
?>