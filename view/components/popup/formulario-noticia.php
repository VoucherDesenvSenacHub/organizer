<?php
$acao = ($noticia->noticia_id) ? 'EDITAR NOTICIA' : 'NOVA NOTICIA';
$btn_text = ($noticia->noticia_id) ? 'SALVAR ALTERAÇÃO' : 'CRIAR NOTICIA';
?>
<div class="popup-fundo" id="editar-noticia-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('editar-noticia-popup')"></button>
        <form action="#" method="POST">
            <input type="hidden" name="id" value="<?= $noticia->noticia_id ?>">
            <div class="box-edit">
                <h1><?= $acao ?></h1>
                <div class="input-box">
                    <label for="titulo">Titulo<span>*</span></label>
                    <input id="titulo" name="titulo" type="text" value="<?= $noticia->titulo ?>" required>
                </div>
                <div class="input-box">
                    <label for="texto">Texto<span>*</span></label>
                    <textarea name="texto" id="texto" rows="6" required><?= $noticia->texto ?></textarea>
                </div>
                <div class="input-box" id="subtitle">
                    <label for="subtitulo">Subtitulo<span>*</span></label>
                    <input id="subtitulo" name="subtitulo" type="text" maxlength="90" value="<?= $noticia->subtitulo ?>" required>
                </div>
                <div class="input-box">
                    <label for="subtexto">Subtexto<span>*</span></label>
                    <textarea name="subtexto" id="subtexto" rows="4" required><?= $noticia->subtexto ?></textarea>
                </div>
            </div>
            <div class="box-edit">
                <div class="input-box">
                    <div class="qt-img">
                        <label for="fotos">Upload de Fotos<span>*</span></label>
                        <p id="qt-img">0/5</p>
                    </div>
                    <input id="fotos" type="file" name="fotos[]" multiple>
                </div>
                <button class="btn" type="submit"><?= $btn_text ?> <i class="fa-solid fa-floppy-disk"></i></button>
            </div>
        </form>
    </div>
</div>