<div class="popup-fundo" id="inativar-noticia-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('inativar-noticia-popup')"></button>
        <form id="form-inativar-noticia" action="../../../controller/Noticia/InativarNoticiaAdmController.php" method="POST">
            <input type="hidden" name="inativar-noticia" value="true">
            <input type="hidden" name="noticia_id" value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>">
            <div class="box-edit">
                <h1>INATIVAR NOTÍCIA</h1>
                <p><i class="fa-solid fa-triangle-exclamation"></i> <strong>ATENÇÃO:</strong></p>
                <p>Tem certeza que deseja <strong>INATIVAR</strong> a notícia?</p>
                <p>Esta ação irá:</p>
                <ul>
                    <li>Desativar a notícia permanentemente</li>
                    <li>Impedir que seja visualizada publicamente</li>
                    <li>Não pode ser desfeita</li>
                </ul>
                <div class="btn-acoes-modal">
                    <button class="btn btn-cancelar" type="button" onclick="fechar_popup('inativar-noticia-popup')">
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