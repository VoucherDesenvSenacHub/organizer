<?php
$PerfilProjeto = (array) $PerfilProjeto;
$acao = ($PerfilProjeto['projeto_id']) ? 'EDITAR PROJETO' : 'NOVO PROJETO';
$btn_text = ($PerfilProjeto['projeto_id']) ? 'SALVAR ALTERAÇÃO' : 'CRIAR PROJETO';
?>
<div class="popup-fundo" id="editar-projeto-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('editar-projeto-popup')"></button>
        <form action="../../../controller/Projeto/GerenciarProjetoController.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="projeto-id" value="<?= $PerfilProjeto['projeto_id'] ?>">
    <input type="hidden" name="valor-arrecadado" value="<?= $PerfilProjeto['valor_arrecadado'] ?>">
    <div class="box-edit">
        <h1><?= $acao ?></h1>
        <div class="input-group">
            <div class="input-box">
                <label for="nome">Nome<span>*</span></label>
                <input id="nome" name="nome" type="text" maxlength="50" value="<?= $PerfilProjeto['nome'] ?>" required>
            </div>
            <div class="input-box">
                <label for="meta">Meta de Doação<span>*</span></label>
                <input id="meta" name="meta" type="number" placeholder="R$" value="<?= $PerfilProjeto['meta'] ?>" required>
            </div>
        </div>
        <div class="input-box">
            <label for="descricao">Descrição<span>*</span></label>
            <textarea name="descricao" id="descricao" rows="8" required><?= $PerfilProjeto['descricao'] ?></textarea>
        </div>
        <div class="input-box">
            <label for="categoria">Categoria<span>*</span></label>
            <select id="categorias" name="categoria" required>
                <option value="" disabled selected>Selecione</option>
                <?php foreach ($Categorias as $categoria): ?>
                    <option value="<?= $categoria['categoria_id'] ?>" <?= ($PerfilProjeto['categoria_id'] == $categoria['categoria_id']) ? 'selected' : '' ?>>
                        <?= $categoria['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="box-edit">
        <div class="input-box">
            <div class="qt-img">
                <label for="imagens">Upload de Fotos<span>*</span></label>
                <p id="qt-img">0/5</p>
            </div>
            <input id="imagens" type="file" name="imagens[]" multiple>
        </div>
        <button class="btn" type="submit"><?= $btn_text ?> <i class="fa-solid fa-floppy-disk"></i></button>
    </div>
</form>

    </div>
</div>