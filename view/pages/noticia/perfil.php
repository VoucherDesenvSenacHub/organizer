<?php
ob_start();
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Leia Mais | Organizer';
$cssPagina = ['noticia/perfil.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$noticiaModel = new NoticiaModel();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $noticia = $noticiaModel->buscarId($id);
    $imagens_noticia = $noticiaModel->buscarImagens($id);
    $imagem_subtitulo = $noticiaModel->imagemSubtitulo($id);
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
if ($perfil == 'ong' && isset($noticia) && $noticia) {
    require_once '../../components/popup/formulario-noticia.php';
}
ob_end_flush();
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
        <?php if (!isset($_GET['id']) || !$noticia): ?>
            <h2 style="text-align: center;">ERRO AO ENCONTRAR NOTÍCIA!</h2>
        <?php else: ?>
            <section id="carousel">
                <div id="carousel-imgs">
                    <?php if ($imagens_noticia) {
                        foreach ($imagens_noticia as $imagem) {
                            echo "<img src=\"{$imagem['logo_url']}\" class=\"carousel-item\">";
                        }
                    } else {
                        echo "<img src='../../assets/images/global/image-placeholder.svg' class='carousel-item'>";
                    } ?>
                </div>
            </section>
            <section class="area-materia">
                <div class="titulo">
                    <h1><?= $noticia['titulo'] ?></h1>
                    <span><i class="fa-regular fa-clock"></i> <?= $noticia['data_cadastro'] ?></span>
                    <a title="Ver Perfil da ONG" href="../ong/perfil.php?id=<?= $noticia['ong_id'] ?>"><i class="fa-solid fa-house-flag"></i> <?= $noticia['nome'] ?></a>
                </div>
                <!-- Botões de edição para a ONG -->
                <?php if ($perfil === 'ong' && $noticia['ong_id'] === $_SESSION['ong_id']): ?>
                    <div class="area-acoes">
                        <button class="btn" onclick="abrir_popup('editar-noticia-popup')"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                        <button class="btn"><i class="fa-solid fa-trash-can"></i> Inativar</button>
                    </div>
                <?php endif; ?>
                <div class="texto">
                    <p><?= $noticia['texto'] ?></p>
                </div>
                <!-- Subtítulo -->
                <div class="subtitulo">
                    <div class="sub-img">
                        <?php if ($imagem_subtitulo) {
                            echo "<img src=\"{$imagem_subtitulo['logo_url']}\">";
                        } else {
                            echo "<img src='../../assets/images/global/image-placeholder.svg'>";
                        } ?>
                    </div>
                    <div class="sub-texto">
                        <h3><?= $noticia['subtitulo'] ?></h3>
                        <p><?= $noticia['subtexto'] ?></p>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
</main>
<?php
$jsPagina = ['noticia/perfil.js'];
require_once '../../components/layout/footer/footer-logado.php';
?>