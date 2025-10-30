<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Encontre Projetos | Organizer';
$cssPagina = ['shared/catalogo.css'];
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';

$categoriaModel = new CategoriaModel();
$categorias = $categoriaModel->buscarCategorias();
?>

<main class="<?= isset($_SESSION['usuario']['id']) ? 'usuario-logado' : 'visitante' ?>">
    <div class="container" id="container-catalogo">
        <section id="header-section">
            <form id="form-filtros" class="form-pesquisa" data-tipo="projetos">
                <div class="textos-pesquisa">
                    <h1>ENCONTRE PROJETOS</h1>
                    <p>Explore projetos inspiradores e apoie causas e faça a diferença hoje mesmo.</p>
                </div>
                <div class="filtro-pesquisa">
                    <ul>
                        <li>Ordem <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="radio" name="ordem" value="novos">Novos</label></li>
                        <li><label><input type="radio" name="ordem" value="antigos">Antigos</label></li>
                    </ul>
                    <ul>
                        <li>Status <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="radio" name="status[]" value="ATIVO">Ativos</label></li>
                        <li><label><input type="radio" name="status[]" value="FINALIZADO">Finalizados</label></li>
                    </ul>
                    <ul>
                        <li>Categoria <i class="fa-solid fa-angle-down"></i></li>
                        <?php foreach ($categorias as $categoria): ?>
                            <li>
                                <label><input type="radio" name="categorias[]" value="<?= $categoria['categoria_id'] ?>"> <?= $categoria['nome'] ?></label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="input-pesquisa">
                    <input type="text" name="pesquisa" placeholder="Busque um projeto">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                    <button class="limpar-filtro" onclick="limparFiltros()">Limpar filtros</button>

                </div>
            </form>
            <div id="img-illustrativa">
                <img src="../../assets/images/pages/shared/criancas.png">
            </div>
        </section>

        <section id="resultado-filtros">
            <!-- Conteúdo dinâmico via AJAX -->
            <div id="spinner" class="spinner" style="display: none;">
                <div class="loader"></div>
            </div>
        </section>
    </div>
</main>

<?php
$jsPagina = ["ong/limpar-filtro.js"];
require_once '../../components/layout/footer/footer-logado.php';
?>