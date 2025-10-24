<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Acompanhe Notícias | Organizer';
$cssPagina = ['shared/catalogo.css'];
require_once '../../components/layout/base-inicio.php';
?>

<main class="<?= isset($_SESSION['usuario']['id']) ? 'usuario-logado' : 'visitante' ?>">
    <div class="container" id="container-catalogo">
        <section id="header-section">
            <form id="form-filtros" class="form-pesquisa" data-tipo="noticias">
                <div class="textos-pesquisa">
                    <h1>NOTÍCIAS</h1>
                    <p>Acompanhe as novidades e os impactos das ONGs e saiba como elas estão transformando vidas.</p>
                </div>
                <div class="filtro-pesquisa">
                    <ul>
                        <li>Ordem <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="radio" name="ordem" value="novas">Novas</label></li>
                        <li><label><input type="radio" name="ordem" value="antigas">Antigas</label></li>
                    </ul>
                </div>
                <div class="input-pesquisa">
                    <input type="text" name="pesquisa" placeholder="Busque uma Notícia">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </div>
            </form>
            <div id="img-illustrativa">
                <img src="../../assets/images/pages/shared/mundo.png">
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
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
?>