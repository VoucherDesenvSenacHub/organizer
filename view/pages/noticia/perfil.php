<?php
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Leia Mais | Organizer';
$cssPagina = ['noticia/perfil.css'];
require_once '../../components/layout/base-inicio.php';

require_once '../../../model/NoticiaModel.php';
$noticiaModel = new NoticiaModel();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $noticia = $noticiaModel->buscarId($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $texto = $_POST['texto'];
    $subtexto = $_POST['subtexto'];
    try {
        $update = $noticiaModel->editar($id, $titulo, $subtitulo, $texto, $subtexto);
        if ($update > 0) {
            header("Location: perfil.php?id=$id&upd=sucesso");
            exit;
        } else {
            header("Location: perfil.php?id=aaaa");
            exit;
        }
    } catch (PDOException $e) {
        header("Location: perfil.php?id=$id&upd=erro");
        exit;
    }
}

$perfil = $_SESSION['perfil_usuario'] ?? '';
if ($perfil == 'ong') {
    require_once '../../components/popup/formulario-noticia.php';
}
?>
<div id="toast-noticia" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    Notícia atualizada com sucesso!
</div>
<div id="toast-noticia-erro" class="toast erro">
    <i class="fa-solid fa-triangle-exclamation"></i>
    Falha ao atualizar notícia!
</div>

<main <?php if ($perfil == 'doador') echo 'class="usuario-logado"'; ?>>
    <div class="container-noticia">
        <section id="carousel">
            <div id="carousel-imgs">
                <img src="../../assets/images/noticia-foto1.jpg" class="carousel-item">
                <img src="../../assets/images/noticia-foto2.jpg" class="carousel-item">
                <img src="../../assets/images/noticia-foto3.jpg" class="carousel-item">
                <img src="../../assets/images/noticia-foto4.jpg" class="carousel-item">
            </div>
        </section>
        <section class="area-materia">
            <div class="titulo">
                <h1><?= $noticia->titulo ?></h1>
                <span><i class="fa-regular fa-clock"></i> <?= $noticia->data_cadastro ?></span>
                <a title="Ver Perfil da ONG" href="../ong/perfil.php?id=<?= $noticia->ong_id ?>"><i class="fa-solid fa-house-flag"></i> <?= $noticia->nome ?></a>
            </div>
            <!-- Botões de edição para a ONG -->
            <?php if ($perfil == 'ong'): ?>
                <div class="area-acoes">
                    <button class="btn" onclick="abrir_popup('editar-noticia-popup')"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                    <button class="btn"><i class="fa-solid fa-trash-can"></i> Inativar</button>
                </div>
            <?php endif; ?>
            <div class="texto">
                <p><?= $noticia->texto ?></p>
            </div>
            <!-- Subtítulo -->
            <div class="subtitulo">
                <div class="sub-img">
                    <img src="../../assets/images/noticia-foto-meio.png">
                </div>
                <div class="sub-texto">
                    <h3><?= $noticia->subtitulo ?></h3>
                    <p><?= $noticia->subtexto ?></p>
                </div>
            </div>
        </section>
    </div>
</main>
<?php
$jsPagina = ['noticia/perfil.js'];
require_once '../../components/footer.php';
?>