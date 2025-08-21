 <div class="popup-fundo" id="inativar-projeto-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('inativar-projeto-popup')"></button>
        <form action="home.php">
            <div class="box-edit">
                <h1>INFORME O MOTIVO DE INATIVAR ESSE PROJETO</h1>
                <p>Escolha<span>*</span></p>
                <div class="group-check">
                    <label for="check-1" class="input-box">
                        <input type="checkbox" id="check-1" name="motivo-inativa">
                        Falta de recursos financeiros
                    </label>
                    <label for="check-2" class="input-box">
                        <input type="checkbox" id="check-2" name="motivo-inativa">
                        Mudança na missão ou objetivos da ONG
                    </label>
                    <label for="check-3" class="input-box">
                        <input type="checkbox" id="check-3" name="motivo-inativa">
                        Falta de voluntários
                    </label>
                    <label for="check-4" class="input-box">
                        <input type="checkbox" id="check-4" name="motivo-inativa">
                        Baixo impacto ou relevância
                    </label>
                    <label for="check-5" class="input-box">
                        <input type="checkbox" id="check-5" name="motivo-inativa">
                        Problemas de gestão
                    </label>
                    <label for="check-6" class="input-box">
                        <input type="checkbox" id="check-6" name="motivo-inativa">
                        Motivos internos da ONG
                    </label>
                </div>
            </div>
            <div class="box-edit">
                <div class="input-area">
                    <label for="motivo">Motivo<span>*</span></label>
                    <textarea name="motivo" id="motivo" rows="6" required></textarea>
                </div>
                <button class="btn">INATIVAR O PROJETO <i class="fa-solid fa-floppy-disk"></i></button>
            </div>
        </form>
    </div>
</div>