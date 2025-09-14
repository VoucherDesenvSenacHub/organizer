<?php
$acesso = 'adm';
$tituloPagina = 'Painel de Ongs | Organizer'; // Definir o título da página
$cssPagina = ['adm/listagem.css']; //Colocar o arquivo .css 
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$ongModel = new OngModel();

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$tipo = '';
$valor = ['pagina' => $paginaAtual];

if ($_SERVER['REQUEST_METHOD'] = 'GET' && isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $tipo = 'pesquisa';
    $valor = ['pesquisa' => $pesquisa, 'pagina' => $paginaAtual];
}

$lista = $ongModel->listarCardsOngs($tipo, $valor);
$totalRegistros = $ongModel->paginacaoOngs($tipo, $valor);
$paginas = ceil($totalRegistros / 6);
?>

<main class="conteudo-principal">
    <section>
        <div class="container">
            <div class="top">
                <h1><i class="fa-solid fa-building-flag"></i> PAINEL DE ONGS</h1>
                <form id="form-busca" action="ongs.php" method="GET">
                    <input type="text" name="pesquisa" placeholder="Busque uma ONG">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </form>
            </div>
            <!-- Quantidade da busca -->
            <?php if (isset($_GET['pesquisa'])) {
                echo "<p class='qnt-busca'><i class='fa-solid fa-search'></i> " . $totalRegistros . " ONGS Encontrados</p>";
            } ?>

            <section id="box-ongs">
                <?php
                if (isset($lista) && empty($lista)) {
                    echo '<p>Nenhuma ONG cadastrada!</p>';
                } else {
                    foreach ($lista as $ong) {
                        require '../../components/cards/card-ong.php';
                    }
                }
                ?>
            </section>
            <?php if ($paginas > 1): ?>
                <nav class="navegacao">
                    <?php for ($i = 1; $i <= $paginas; $i++): ?>
                        <a href="?pagina=<?= $i ?><?= isset($_GET['pesquisa']) ? '&pesquisa=' . urlencode($_GET['pesquisa']) : '' ?>"
                            class="<?= $i === $paginaAtual ? 'active' : '' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </nav>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php
$jsPagina = []; //Colocar o arquivo .js (exemplo: 'ONG/cadastro.js')
require_once '../../components/layout/footer/footer-logado.php';
?>