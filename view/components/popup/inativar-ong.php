<div class="popup-fundo" id="inativar-ong-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('inativar-ong-popup')"></button>
        <form id="form-inativar-ong" action="../../../controller/Ong/InativarOngController.php" method="POST">
            <input type="hidden" name="inativar-ong" value="true">
            <input type="hidden" name="ong_id" value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>">
            <div class="box-edit">
                <h1>INATIVAR ONG</h1>
                <p><i class="fa-solid fa-triangle-exclamation"></i> <strong>ATENÇÃO:</strong></p>
                <p>Tem certeza que deseja <strong>INATIVAR</strong> a ONG?</p>
                <p>Esta ação irá:</p>
                <ul>
                    <li>Desativar a conta da ONG permanentemente</li>
                    <li>Impedir acesso ao sistema</li>
                    <li>Não pode ser desfeita</li>
                </ul>
                <div class="btn-acoes-modal">
                    <button class="btn btn-cancelar" type="button" onclick="fechar_popup('inativar-ong-popup')">
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
