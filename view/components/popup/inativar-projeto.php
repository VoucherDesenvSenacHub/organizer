<div class="popup-fundo" id="inativar-projeto-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('inativar-projeto-popup')"></button>
        <form id="form-inativar-projeto" action="../../../controller/Projeto/InativarProjetoController.php" method="POST">
            <input type="hidden" name="inativar-projeto" value="true">
            <input type="hidden" name="projeto_id" value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>">
            <div class="box-edit">
                <h1>INATIVAR PROJETO</h1>
                <p><i class="fa-solid fa-triangle-exclamation"></i> <strong>ATENÇÃO:</strong></p>
                <p>Tem certeza que deseja <strong>INATIVAR</strong> o projeto?</p>
                <p>Esta ação irá:</p>
                <ul>
                    <li>Desativar o projeto permanentemente</li>
                    <li>Impedir novas doações e apoios</li>
                    <li>Não pode ser desfeita</li>
                </ul>
                <div class="btn-acoes-modal">
                    <button class="btn btn-cancelar" type="button" onclick="fechar_popup('inativar-projeto-popup')">
                        <i class="fa-solid fa-xmark"></i> CANCELAR
                    </button>
                    <button class="btn btn-confirmar" type="submit">
                        <i class="fa-solid fa-ban"></i> CONFIRMAR INATIVAÇÃO
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>