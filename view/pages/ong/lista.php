<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Descubra Ongs | Organizer';
$cssPagina = ['shared/catalogo.css'];
require_once '../../components/layout/base-inicio.php';
?>

<main class="<?= isset($_SESSION['usuario']['id']) ? 'usuario-logado' : 'visitante' ?>">
    <div class="container" id="container-catalogo">
        <section id="header-section">
            <form id="form-filtros" class="form-pesquisa" data-tipo="ongs">
                <div class="textos-pesquisa">
                    <h1>DESCUBRA AS ONGS</h1>
                    <p>Explore organizações que estão fazendo a diferença e saiba como você pode contribuir.</p>
                </div>
                <div class="filtro-pesquisa">
                    <ul>
                        <li>Ordem <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="radio" name="ordem" value="novas">Novas</label></li>
                        <li><label><input type="radio" name="ordem" value="antigas">Antigas</label></li>
                    </ul>
                    <ul>
                        <li>Projetos <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="radio" name="projetos" value="5">Até 5</label></li>
                        <li><label><input type="radio" name="projetos" value="10">Até 10</label></li>
                        <li><label><input type="radio" name="projetos" value="mais10">Mais de 10</label></li>
                    </ul>
                    <ul>
                        <li>Doações <i class="fa-solid fa-angle-down"></i></li>
                        <li><label><input type="radio" name="doacoes" value="10">Até 10</label></li>
                        <li><label><input type="radio" name="doacoes" value="20">Até 20</label></li>
                        <li><label><input type="radio" name="doacoes" value="mais20">Mais de 20</label></li>
                    </ul>
                </div>
                <div class="input-pesquisa">
                    <input type="text" name="pesquisa" placeholder="Busque uma ONG">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </div>
            </form>
            <div id="img-illustrativa">
                <img src="../../assets/images/pages/shared/time.png">
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