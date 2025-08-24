<?php
ob_start();
$acesso = 'ong';
$tituloPagina = 'Notícias | Organizer';
$cssPagina = ['ong/listagem.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$noticiaModel = new NoticiaModel();

// Pegar as noticias
$IdOng = $_SESSION['ong_id'];
$lista = $noticiaModel->listarCardsNoticias('ong', $IdOng);

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $lista = $noticiaModel->listarCardsNoticias('pesquisa', ['ong_id' => $IdOng, 'pesquisa' => $pesquisa]);
}
// Criar a Noticia
$PerfilNoticia = (object) [
    'noticia_id' => null,
    'titulo' => null,
    'subtitulo' => null,
    'texto' => null,
    'subtexto' => null
];

require_once '../../components/popup/formulario-noticia.php';
ob_end_flush();
?>
<!-- Toasts -->
<div id="toast-noticia" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    Notícia criada com sucesso!
</div>
<div id="toast-noticia-erro" class="toast erro">
    <i class="fa-solid fa-triangle-exclamation"></i>
    Falha ao criar Notícia!
</div>

<main>
    <div class="container">
        <div class="topo">
            <h1><i class="fa-solid fa-newspaper"></i> MINHAS NOTÍCIAS</h1>
            <form id="form-busca" action="noticias.php" method="GET">
                <input type="text" name="pesquisa" placeholder="Busque uma notícia">
                <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
            </form>
            <button class="btn btn-novo" onclick="abrir_popup('editar-noticia-popup')">NOVA NOTÍCIA +</button>
        </div>
        <?php if (isset($_GET['pesquisa'])) {
            echo "<p id='qnt-busca'><i class='fa-solid fa-search'></i> " . count($lista) . " Notícias Encontradas</p>";
        } ?>
        <div class="area-cards">
            <?php
            if ($lista) {
                foreach ($lista as $noticia) {
                    require '../../components/cards/card-noticia.php';
                }
            } else {
                echo 'Você ainda não publicou nenhuma notícia :(';
            }
            ?>
        </div>
    </div>
</main>
<?php
$jsPagina = ['ong/noticias.js'];
require_once '../../components/layout/footer/footer-logado.php';
// Ativar os toast
if (isset($_SESSION['criar-noticia'])) {
    if ($_SESSION['criar-noticia']) {
        echo "<script>mostrar_toast('toast-noticia')</script>";
    } else {
        echo "<script>mostrar_toast('toast-noticia-erro')</script>";
    }
    unset($_SESSION['criar-noticia']);
}
?>