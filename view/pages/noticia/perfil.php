<?php
ob_start();
require_once __DIR__ . '/../../../autoload.php';
$PerfilNoticiaModel = new NoticiaModel();

//Definições da página
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Leia Mais | Organizer';
$cssPagina = ['noticia/perfil.css'];
require_once '../../components/layout/base-inicio.php';

//Processamento de dados
if (isset($_GET['id'])) {
    $IdNoticia = $_GET['id'];
    $PerfilNoticia = $PerfilNoticiaModel->buscarPerfilNoticia($IdNoticia);
    $ImagensNoticia = $PerfilNoticiaModel->buscarImagensNoticia($IdNoticia);
}

$perfil = $_SESSION['perfil_usuario'] ?? '';
if ($perfil == 'ong' && isset($PerfilNoticia) && $PerfilNoticia) {
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
        <?php if (!isset($_GET['id']) || !$PerfilNoticia): ?>
            <h2 style="text-align: center;">ERRO AO ENCONTRAR NOTÍCIA!</h2>
        <?php else: ?>
            <section id="carousel">
                <div id="carousel-imgs">
                    <?php if ($ImagensNoticia) {
                        foreach ($ImagensNoticia as $imagem) {
                            echo "<img src=\"{$imagem['caminho']}\" class=\"carousel-item\">";
                        }
                    } else {
                        echo "<img src='../../assets/images/global/image-placeholder.svg' class='carousel-item'>";
                    } ?>
                </div>
            </section>
            <section class="area-materia">
                <div class="titulo">
                    <h1><?= $PerfilNoticia['titulo'] ?></h1>
                    <span><i class="fa-regular fa-clock"></i> <?= date('d/m/Y H:i', strtotime($PerfilNoticia['data_cadastro'])) ?></span>
                    <a title="Ver Perfil da ONG" href="../ong/perfil.php?id=<?= $PerfilNoticia['ong_id'] ?>"><i class="fa-solid fa-house-flag"></i> <?= $PerfilNoticia['nome'] ?></a>
                </div>
                <!-- Botões de edição para a ONG -->
                <?php if ($perfil === 'ong' && $PerfilNoticia['ong_id'] === $_SESSION['ong_id']): ?>
                    <div class="area-acoes">
                        <button class="btn" onclick="abrir_popup('editar-noticia-popup')"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                        <form onsubmit="return confirm('Tem certeza que deseja inativar..')" action="../../../controller/Noticia/InativarNoticiaController.php" method="POST">
                            <input type="hidden" name="noticia-id" value=<?= $IdNoticia ?>>
                            <button class="btn"><i class="fa-solid fa-trash-can"></i> Inativar</button>
                        </form>
                    </div>
                <?php endif; ?>
                <div class="texto">
                    <p><?= $PerfilNoticia['texto'] ?></p>
                </div>
                <!-- Subtítulo -->
                <div class="subtitulo">
                    <div class="sub-img">
                        <?php if ($ImagensNoticia) {
                            $ultimaImagem = end($ImagensNoticia);
                            echo "<img src=\"{$ultimaImagem['caminho']}\">";
                        } else {
                            echo "<img src='../../assets/images/global/image-placeholder.svg'>";
                        } ?>
                    </div>
                    <div class="sub-texto">
                        <h3><?= $PerfilNoticia['subtitulo'] ?></h3>
                        <p><?= $PerfilNoticia['subtexto'] ?></p>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
</main>
<?php
$jsPagina = ['noticia/perfil.js'];
require_once '../../components/layout/footer/footer-logado.php';
// Ativar os toast
if (isset($_SESSION['editar-noticia'])) {
    if ($_SESSION['editar-noticia']) {
        echo "<script>mostrar_toast('toast-noticia')</script>";
    } else {
        echo "<script>mostrar_toast('toast-noticia-erro')</script>";
    }
    unset($_SESSION['editar-noticia']);
}
?>