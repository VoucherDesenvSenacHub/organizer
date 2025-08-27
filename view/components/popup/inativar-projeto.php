<div class="popup-fundo" id="inativar-projeto-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('inativar-projeto-popup')"></button>
        <form action="acoes-ong.php" method="POST">
            <input type="hidden" name="acao" value="inativar_projeto">
            <input type="hidden" name="projeto_id" value="<?= $_GET['id'] ?? '' ?>">
            
            <div class="box-edit">
                <h1>INFORME O MOTIVO DE INATIVAR ESSE PROJETO</h1>
                <p>Escolha<span>*</span></p>
                <div class="group-check">
                    <label for="check-1" class="input-box">
                        <input type="radio" id="check-1" name="escolha" value="Falta de recursos financeiros" required>
                        Falta de recursos financeiros
                    </label>
                    <label for="check-2" class="input-box">
                        <input type="radio" id="check-2" name="escolha" value="Mudança na missão ou objetivos da ONG">
                        Mudança na missão ou objetivos da ONG
                    </label>
                    <label for="check-3" class="input-box">
                        <input type="radio" id="check-3" name="escolha" value="Falta de voluntários">
                        Falta de voluntários
                    </label>
                    <label for="check-4" class="input-box">
                        <input type="radio" id="check-4" name="escolha" value="Baixo impacto ou relevância">
                        Baixo impacto ou relevância
                    </label>
                    <label for="check-5" class="input-box">
                        <input type="radio" id="check-5" name="escolha" value="Problemas de gestão">
                        Problemas de gestão
                    </label>
                    <label for="check-6" class="input-box">
                        <input type="radio" id="check-6" name="escolha" value="Motivos internos da ONG">
                        Motivos internos da ONG
                    </label>
                </div>
            </div>
            <div class="box-edit">
                <div class="input-area">
                    <label for="motivo">Motivo<span>*</span></label>
                    <textarea name="motivo" id="motivo" rows="6" required></textarea>
                </div>
                <button type="submit" class="btn">INATIVAR O PROJETO <i class="fa-solid fa-floppy-disk"></i></button>
            </div>
        </form>
    </div>
</div>