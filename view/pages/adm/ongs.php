<?php
$acesso = 'adm';
$tituloPagina = 'Painel de Ongs | Organizer'; // Definir o título da página
$cssPagina = ['adm/listagem.css']; //Colocar o arquivo .css 
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$ongModel = new Ong();
$lista = $ongModel->listarCards();
$temong = $lista;

if ($_SERVER['REQUEST_METHOD'] = 'GET' && isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $lista = $ongModel->buscarNome($pesquisa);
}
?>

<main>
    <div class="container">
        <div class="top">
            <h1><i class="fa-solid fa-house-flag"></i> PAINEL DE ONGS</h1>
            <form id="form-busca" action="ongs.php" method="GET">
                <input type="text" name="pesquisa" placeholder="Busque uma ONG">
                <button class="btn"><i class="fa-solid fa-search"></i></button>
            </form>
        </div>
        <!-- Quantidade da busca -->
        <?php if (isset($_GET['pesquisa'])) {
            echo "<p class='qnt-busca'><i class='fa-solid fa-search'></i> " . count($lista) . " ONGS Encontrados</p>";
        } ?>

        <section id="box-ongs">
            <?php
            if ($lista) {
                foreach ($lista as $ong) {
                    require '../../components/cards/card-ong.php';
                }
            } 
            if (isset($temong) && !$temong) {
                echo '<p>Nenhuma ONG cadastrada!</p>';
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
$jsPagina = []; //Colocar o arquivo .js (exemplo: 'ONG/cadastro.js')
require_once '../../components/layout/footer/footer-logado.php';
?>