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
                    <label>Categoria do Projeto<span>*</span></label>
                    <div class="categorias">
                        <label><input type="checkbox" name="categorias[]" value="1" data-id="<?= $solicitacao['categoriaProjetoId'] ?>" data-tipo="Educação"?> Educação</label>
                        <label><input type="checkbox" name="categorias[]" value="2" data-id="<?= $solicitacao['categoriaProjetoId'] ?>" data-tipo="Saúde"?> Saúde</label>
                        <label><input type="checkbox" name="categorias[]" value="3" data-id="<?= $solicitacao['categoriaProjetoId'] ?>" data-tipo="Esporte"?> Esporte</label>
                        <label><input type="checkbox" name="categorias[]" value="4" data-id="<?= $solicitacao['categoriaProjetoId'] ?>" data-tipo="Cultura"?> Cultura</label>
                        <label><input type="checkbox" name="categorias[]" value="5"data-id="<?= $solicitacao['categoriaProjetoId'] ?>" data-tipo="Tecnologia"?> Tecnologia</label>
                        <label><input type="checkbox" name="categorias[]" value="6" data-id="<?= $solicitacao['categoriaProjetoId'] ?>" data-tipo="Meio Ambiente"?> Meio Ambiente</label>
                    </div>
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