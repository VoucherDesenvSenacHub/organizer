<?php
ob_start();
$acesso = 'ong';
$tituloPagina = 'Notícias | Organizer';
$cssPagina = ['ong/listagem.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$noticiaModel = new NoticiaModel();

// Pegar as noticias
$lista = $noticiaModel->listarCards($_SESSION['ong_id']);
$temnoticia = $lista;

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $lista = $noticiaModel->buscarNome($pesquisa, $_SESSION['ong_id']);
}
// Criar a Noticia
$noticia = (object) [
    'noticia_id' => '',
    'titulo' => '',
    'subtitulo' => '',
    'texto' => '',
    'subtexto' => ''
];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $texto = $_POST['texto'];
    $subtexto = $_POST['subtexto'];
    $id = $_SESSION['ong_id'];
    try {
        $criar = $noticiaModel->criar($titulo, $subtitulo, $texto, $subtexto, $id);
        header("Location: noticias.php?msg=sucesso");
        exit;
    } catch (PDOException) {
        header("Location: noticias.php?msg=erro");
        exit;
    }
}
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
                $class = 'tp-ong';
                foreach ($lista as $noticia) {
                    require '../../components/cards/card-noticia.php';
                }
            }
            if (isset($temnoticia) && !$temnoticia) {
                echo 'Você ainda não publicou nenhuma notícia :(';
            }
            ?>
        </div>
    </div>
</main>
<?php
$jsPagina = ['ong/noticias.js'];
require_once '../../components/layout/footer/footer-logado.php';
?>