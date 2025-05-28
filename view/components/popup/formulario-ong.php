<?php
$acao = ($ong->codong) ? 'EDITAR ONG' : 'NOVA ONG';
$btn_text = ($ong->codong) ? 'SALVAR ALTERAÇÃO' : 'CRIAR ONG';
// $meta = (int)$meta;
?>
<div class="popup-fundo" id="editar-ong-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('editar-ong-popup')"></button>
        <form action="ong-edicao .php" method="POST">
            <input type="hidden" name="id" value="<?= $ong->codong ?>">
            <div class="box-edit">
                <h1><?= $acao ?></h1>
                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Titulo<span>*</span></label>
                        <input id="nome" name="nome" type="text" maxlength="50" value="<?= $ong->titulo ?>" required>
                    </div>
                    <div class="input-box">
                        <label for="subtitulo">Subtitulo<span>*</span></label>
                        <input id="subtitulo" name="subtitulo" type="text"<?= $ong->subtitulo ?> required>
                    </div>
                </div>
                <div class="input-box">
                    <label for="texto">Texto<span>*</span></label>
                    <textarea name="texto" id="texto" rows="3" required><?= $ong->texto ?></textarea>
                </div>
                <div class="input-box">
                    <label for="subtexto">Subtexto<span>*</span></label>
                    <textarea name="subtexto" id="subtexto" rows="6" required><?= $ong->subtexto ?></textarea>
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
                <button class="btn"><?= $btn_text ?> <i class="fa-solid fa-floppy-disk"></i></button>
            </div>
        </form>
    </div>
</div>