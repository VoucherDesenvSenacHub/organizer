<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Encontre Projetos | Organizer';
$cssPagina = ['shared/catalogo.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$projetoModel = new Projeto();
$lista = $projetoModel->listarCardsProjetos();

if (isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $lista = $projetoModel->buscarNome($pesquisa);
}

//Verificar se o doador marcou este projeto como favorito
if (isset($_SESSION['usuario']['id']) && $_SESSION['perfil_usuario'] === 'doador') {
    $projetosFavoritos = $projetoModel->listarFavoritos($_SESSION['usuario']['id']);
}

$perfil = $_SESSION['perfil_usuario'] ?? null;

?>
<!-- 
    Toast de Favoritar
-->
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
<main <?php if ($perfil == 'doador') echo 'class="usuario-logado"'; ?>>
    <div class="container" id="container-catalogo">
        <section id="top-info">
            <div id="info">
                <div>
                    <h1>ENCONTRE PROJETOS</h1>
                    <p>Explore projetos inspiradores e apoie causas e faça a diferença hoje mesmo.</p>
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
                    <input type="text" name="pesquisa" placeholder="Busque um projeto">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </form>
            </div>
            <div id="imagem-top">
                <img src="../../assets/images/pages/shared/criancas.png">
            </div>
        </section>
        <?php if (isset($_GET['pesquisa'])) {
            echo "<p class='qnt-busca'><i class='fa-solid fa-search'></i> " . count($lista) . " Projetos Encontrados</p>";
        } ?>

        <section id="box-ongs">
            <!-- LISTAR CARDS PROJETOS -->
            <?php foreach ($lista as $projeto) {
                require '../../components/cards/card-projeto.php';
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