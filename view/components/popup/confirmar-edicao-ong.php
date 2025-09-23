<div class="popup-fundo" id="confirmar-edicao-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('confirmar-edicao-popup')"></button>
        <div class="box-edit">
            <h1>CONFIRMAR ALTERAÇÕES</h1>
            <p><i class="fa-solid fa-question-circle"></i> Tem certeza que deseja <strong>alterar</strong> esses dados da ONG?</p>
            <div class="btn-acoes-modal">
                <button class="btn btn-cancelar" type="button" onclick="fechar_popup('confirmar-edicao-popup')">
                    <i class="fa-solid fa-xmark"></i> CANCELAR
                </button>
                <button class="btn btn-confirmar" type="button" onclick="confirmarEdicao()">
                    <i class="fa-solid fa-floppy-disk"></i> CONFIRMAR
                </button>
            </div>
        </div>
    </div>
</div>
