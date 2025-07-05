<?php
$acesso = 'adm';
$tituloPagina = 'Painel de Projetos | Organizer'; // Definir o título da página
$cssPagina = ['adm/listagem.css']; //Colocar o arquivo .css 
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$projetoModel = new Projeto();
$lista = $projetoModel->listar();

if ($_SERVER['REQUEST_METHOD'] = 'GET' && isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $lista = $projetoModel->buscarNome($pesquisa);
}
?>

<main>
    <div class="container">
        <div class="top">
            <h1><i class="fa-solid fa-diagram-project"></i> PAINEL DE PROJETOS</h1>
            <form id="form-busca" action="projetos.php" method="GET">
                <input type="text" name="pesquisa" placeholder="Busque um projeto">
                <button class="btn"><i class="fa-solid fa-search"></i></button>
            </form>
        </div>
        <!-- Quantidade da busca -->
        <?php if (isset($_GET['pesquisa'])) {
            echo "<p class='qnt-busca'><i class='fa-solid fa-search'></i> " . count($lista) . " Projetos Encontrados</p>";
        } ?>

        <section id="box-ongs">
            <!-- LISTAR CARDS PROJETOS -->
            <?php
            if ($lista) {
                foreach ($lista as $projeto) {
                    $class = 'tp-ong';
                    $valor_projeto = $projetoModel->buscarValor($projeto->projeto_id);
                    $barra = round(($valor_projeto / $projeto->meta) * 100);
                    require '../../components/cards/card-projeto.php';
                }
            } else {
                echo '<p>Nenhum Projeto cadastrado!</p>';
            }
            ?>
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
require_once '../../components/layout/footer/footer-logado.php';
?>