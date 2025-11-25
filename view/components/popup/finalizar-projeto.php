<div class="popup-fundo" id="finalizar-projeto-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('finalizar-projeto-popup')"></button>
        <form action="../../../controller/Projeto/FinalizarProjetoController.php" method="POST">
            <div class="box-edit">
                <h1>INFORME O MOTIVO PARA FINALIZAR O PROJETO</h1>
                <p>Escolha<span>*</span></p>
                <div class="group-check">
                    <input type="text" name="projeto-id" value="<?= $IdProjeto ?>" readonly hidden>
                    <label class="input-box">
                        <input value="Meta atingida" type="radio" name="motivo-finalizar" required>
                        Meta atingida
                    </label>
                    <label class="input-box">
                        <input value="Decisão da ONG" type="radio" name="motivo-finalizar">
                        Decisão da ONG
                    </label>
                    <label class="input-box">
                        <input value="Falta de recursos" type="radio" name="motivo-finalizar">
                        Falta de recursos
                    </label>
                    <label class="input-box">
                        <input value="Baixo impacto ou relevância" type="radio" name="motivo-finalizar">
                        Baixo impacto ou relevância
                    </label>
                    <label class="input-box">
                        <input value="Problemas de gestão" type="radio" name="motivo-finalizar">
                        Problemas de gestão
                    </label>
                    <label class="input-box">
                        <input value="outro" id="outro-motivo" type="radio" name="motivo-finalizar">
                        Outro motivo
                    </label>
                </div>
            </div>
            <div class="box-edit box-motivo">
                <div class="input-area">
                    <label for="motivo">Informe o motivo<span>*</span></label>
                    <textarea name="motivo" id="motivo" rows="3" required minlength="20"></textarea>
                </div>
            </div>
            <button class="btn">FINALIZAR O PROJETO <i class="fa-solid fa-floppy-disk"></i></button>
        </form>
    </div>
</div>