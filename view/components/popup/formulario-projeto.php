<?php
$PerfilProjeto = (array) $PerfilProjeto;
$acao = ($PerfilProjeto['projeto_id']) ? 'EDITAR PROJETO' : 'NOVO PROJETO';
$btn_text = ($PerfilProjeto['projeto_id']) ? 'SALVAR ALTERAÇÃO' : 'CRIAR PROJETO';
?>
<div class="popup-fundo" id="editar-projeto-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('editar-projeto-popup')"></button>
        <form action="../../../controller/Projeto/GerenciarProjetoController.php" method="POST">
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
                        <input id="meta" name="meta" type="number" placeholder="R$" value="<?= $PerfilProjeto['meta'] ?>"
                            required>
                    </div>
                </div>
                <!-- <div class="input-box">
                    <label for="resumo">Resumo<span>*</span></label>
                    <textarea name="resumo" id="resumo" rows="3" required>RESUMO{VAR}</textarea>
                </div> -->
                <div class="input-box">
                    <label for="descricao">Descrição<span>*</span></label>
                    <textarea name="descricao" id="descricao" rows="8" required><?= $PerfilProjeto['descricao'] ?></textarea>
                </div>
                <div class="input-box">
                <label for="categoria">Categoria do Projeto<span>*</span></label>
                <select id="categoria" name="categoria" required>
                    <option value="">Selecione uma categoria</option>
                    <option value="1" <?= ($PerfilProjeto['categoriaProjetoId'] ?? '') == 1 ? 'selected' : '' ?>>Educação</option>
                    <option value="2" <?= ($PerfilProjeto['categoriaProjetoId'] ?? '') == 2 ? 'selected' : '' ?>>Saúde</option>
                    <option value="3" <?= ($PerfilProjeto['categoriaProjetoId'] ?? '') == 3 ? 'selected' : '' ?>>Esporte</option>
                    <option value="4" <?= ($PerfilProjeto['categoriaProjetoId'] ?? '') == 4 ? 'selected' : '' ?>>Cultura</option>
                    <option value="5" <?= ($PerfilProjeto['categoriaProjetoId'] ?? '') == 5 ? 'selected' : '' ?>>Tecnologia</option>
                    <option value="6" <?= ($PerfilProjeto['categoriaProjetoId'] ?? '') == 6 ? 'selected' : '' ?>>Meio Ambiente</option>
                </select>
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