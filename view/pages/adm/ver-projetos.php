<?php
$tituloPagina = 'Ver Projetos ADM'; // Definir o título da página
$cssPagina = ['adm/ver-projetos.css']; //Colocar o arquivo .css 
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . "\..\..\..\model\ProjetoModel.php";
$projetoModel = new Projeto();
$lista = $projetoModel->listar();

if ($_SERVER['REQUEST_METHOD'] = 'GET' && isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $lista = $projetoModel->buscarNome($pesquisa);
}
?>

<!-- Início DIV principal -->
<main>
    <div id="principal">
        <div class="top">
            <h1 class="top-text">TODOS OS PROJETOS</h1>
            <form id="form-busca" action="ver-projetos.php" method="GET">
                <input type="text" name="pesquisa" placeholder="Busque um projeto">
                <button class="btn"><i class="fa-solid fa-search"></i></button>
            </form>
        </div>
        <?php if (isset($_GET['pesquisa'])) {
            echo "<p class='qnt-busca'><i class='fa-solid fa-search'></i> " . count($lista) . " Projetos Encontrados</p>";
        } ?>

        <section id="box-ongs">
            <!-- LISTAR CARDS PROJETOS -->
            <?php
             foreach ($lista as $projeto) {
                $class = 'tp-ong';
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
$jsPagina = []; //Colocar o arquivo .js
require_once '../../components/footer.php';
?>