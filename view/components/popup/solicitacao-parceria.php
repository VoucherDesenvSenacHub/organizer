<div class="popup-fundo" id="parceria-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('parceria-popup')"></button>
        <div class="popup-header">
            <h3><i class="fa-solid fa-handshake"></i> Solicitar Parceria</h3>
        </div>
        <form method="POST" action="../../../controller/ParceriaController.php">
            <div class="form-group">
                <label for="nome">Nome da Empresa <span>*</span></label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="cnpj">CNPJ <span>*</span></label>
                <input type="text" id="cnpj" name="cnpj" required placeholder="00.000.000/0000-00">
            </div>
            <div class="form-group">
                <label for="email">Email <span>*</span></label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone <span>*</span></label>
                <input type="text" id="telefone" name="telefone" required placeholder="(00) 00000-0000">
            </div>
            <div class="form-group">
                <label for="mensagem">Mensagem <span>*</span></label>
                <textarea id="mensagem" name="mensagem" required placeholder="Conte-nos como sua empresa pode contribuir com nossa missão..."></textarea>
            </div>
            <div class="form-btns">
                <button type="button" class="btn btn-cancelar" onclick="fechar_popup('parceria-popup')">Cancelar</button>
                <button type="submit" class="btn">
                    <i class="fa-solid fa-paper-plane"></i>
                    Enviar Solicitação
                </button>
            </div>
        </form>
    </div>
</div>