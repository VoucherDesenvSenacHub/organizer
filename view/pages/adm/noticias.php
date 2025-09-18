<?php
$acesso = 'adm';
$tituloPagina = 'Painel de Projetos | Organizer'; // Definir o título da página
$cssPagina = ['adm/listagem.css']; //Colocar o arquivo .css 
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$noticiaModel = new NoticiaModel();

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$tipo = '';
$valor = ['pagina' => $paginaAtual];

if (isset($_GET['pesquisa'])) {
    $tipo = 'pesquisa';
    $valor['pesquisa'] = $_GET['pesquisa'];
}

$lista = $noticiaModel->listarCardsNoticias($tipo, $valor);
$totalRegistros = $noticiaModel->paginacaoNoticias($tipo, $valor);
$paginas = ceil($totalRegistros / 6);
?>

<main class="conteudo-principal">
    <section>
        <div class="container">
            <div class="top">
                <h1><i class="fa-solid fa-newspaper"></i> PAINEL DE NOTÍCIAS</h1>
                <form id="form-busca" action="noticias.php" method="GET">
                    <input type="text" name="pesquisa" placeholder="Busque uma notícia">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </form>
            </div>
            <!-- Quantidade da busca -->
            <?php if (isset($_GET['pesquisa'])) {
                echo "<p class='qnt-busca'><i class='fa-solid fa-search'></i> " . $totalRegistros . " Notícias Encontrados</p>";
            } ?>

            <section id="box-ongs">
                <!-- LISTAR CARDS NOTÍCIAS -->
                <?php
                if ($lista) {
                    foreach ($lista as $noticia) {
                        require '../../components/cards/card-noticia.php';
                    }
                } else {
                    echo '<p>Nenhuma Notícia cadastrada!</p>';
                }
                ?>
            </section>
            <?php if ($paginas > 1): ?>
                <nav class="paginacao">
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
$jsPagina = []; //Colocar o arquivo .js
require_once '../../components/layout/footer/footer-logado.php';
?>