<?php
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Notícias | Organizer';
$cssPagina = ['shared/catalogo.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . "\..\..\..\model\NoticiaModel.php";
$noticiaModel = new NoticiaModel();
$lista = $noticiaModel->listarCards();

if ($_SERVER['REQUEST_METHOD'] = 'GET' && isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $lista = $noticiaModel->buscarNome($pesquisa);
}
$perfil = $_SESSION['perfil_usuario'] ?? '';
?>

<main <?php if ($perfil == 'doador') echo 'class="usuario-logado"'; ?>>
    <div class="container" id="container-catalogo">
        <section id="top-info">
            <div id="info">
                <div>
                    <h1>NOTÍCIAS</h1>
                    <p>Acompanhe as novidades e os impactos das ONGs e saiba como elas estão transformando vidas.</p>
                    <form id="form-filtro" action="lista.php" method="GET">
                        <!-- ### -->
                        <div class="ul-group">
                            <ul class="drop" id="esc-status">
                                <li>
                                    <p>Status</p>
                                    <i class="fa-solid fa-angle-down"></i>
                                </li>
                                <li>
                                    <input type="checkbox" name="em-andamento" id="em-andamento">
                                    <label for="em-andamento">Em andamento</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="concluido" id="concluido">
                                    <label for="concluido">Concluído</label>
                                </li>
                            </ul>
                            <ul class="drop" id="esc-categoria">
                                <li>
                                    <p>Categoria</p>
                                    <i class="fa-solid fa-angle-down"></i>
                                </li>
                                <li>
                                    <input type="checkbox" name="educacao" id="educacao">
                                    <label for="educacao">Educação</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="saude" id="saude">
                                    <label for="saude">Saúde</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="esporte" id="esporte">
                                    <label for="esporte">Esporte</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="cultura" id="cultura">
                                    <label for="cultura">Cultura</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="tecnologia" id="tecnologia">
                                    <label for="tecnologia">Tecnologia</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="ambiente" id="ambiente">
                                    <label for="ambiente">Meio Ambiente</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="animal" id="animal">
                                    <label for="animal">Proteção Animal</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="direitos" id="direitos">
                                    <label for="direitos">Direitos Humanos</label>
                                </li>
                            </ul>
                            <ul class="drop" id="esc-regiao">
                                <li>
                                    <p>Região</p>
                                    <i class="fa-solid fa-angle-down"></i>
                                </li>
                                <li>
                                    <input type="checkbox" name="centro-oeste" id="centro-oeste">
                                    <label for="centro-oeste">Centro-Oeste</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="norte" id="norte">
                                    <label for="norte">Norte</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="nordeste" id="nordeste">
                                    <label for="nordeste">Nordeste</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="sudeste" id="sudeste">
                                    <label for="sudeste">Sudeste</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="sul" id="sul">
                                    <label for="sul">Sul</label>
                                </li>
                            </ul>
                        </div>
                        <button class="btn">Filtrar</button>
                    </form>
                </div>
                <form id="form-busca" action="lista.php" method="GET">
                    <input type="text" name="pesquisa" placeholder="Busque uma notícia">
                    <button class="btn"><i class="fa-solid fa-search"></i></button>
                </form>
            </div>
            <div id="imagem-top">
                <img src="../../assets/images/pages/tela-noticia-world.png" alt="">
            </div>
        </section>
        <?php if (isset($_GET['pesquisa'])) {
            echo "<p class='qnt-busca'><i class='fa-solid fa-search'></i> " . count($lista) . " Notícias Encontradas</p>";
        } ?>

        <section id="box-ongs">
            <!-- LISTAR CARDS -->
            <?php foreach ($lista as $noticia) {
                require '../../components/cards/card-noticia.php';
            } ?>
        </section>
        <nav id="navegacao">
            <a class="active" href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">></a>
        </nav>
    </div>
</main>

<?php
$jsPagina = [];
require_once '../../components/footer.php';
?>