<?php
$acao = ($projeto->projeto_id) ? 'EDITAR PROJETO' : 'NOVO PROJETO';
$btn_text = ($projeto->projeto_id) ? 'SALVAR ALTERAÇÃO' : 'CRIAR PROJETO';
// $meta = (int)$meta;
?>
<div class="popup-fundo" id="editar-projeto-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('editar-projeto-popup')"></button>
        <form action="../../../controller/projeto/CadastrarProjetoController.php" method="POST">
            <input type="hidden" name="id" value="<?= $projeto->projeto_id ?>">
            <div class="box-edit">
                <h1><?= $acao ?></h1>
                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Nome<span>*</span></label>
                        <input id="nome" name="nome" type="text" maxlength="50" value="<?= $projeto->nome ?>" required>
                    </div>
                    <div class="input-box">
                        <label for="meta">Meta de Doação<span>*</span></label>
                        <input id="meta" name="meta" type="number" placeholder="R$" value="<?= $projeto->meta ?>"
                            required>
                    </div>
                </div>
                <!-- <div class="input-box">
                    <label for="resumo">Resumo<span>*</span></label>
                    <textarea name="resumo" id="resumo" rows="3" required>RESUMO{VAR}</textarea>
                </div> -->
                <div class="input-box">
                    <label for="descricao">Descrição<span>*</span></label>
                    <textarea name="descricao" id="descricao" rows="8" required><?= $projeto->descricao ?></textarea>
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