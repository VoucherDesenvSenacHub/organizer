<div class="popup-fundo" id="editar-projeto-popup">
    <div class="container-popup">
        <button id="x-fechar" class="fa-solid fa-xmark" onclick="fechar_popup('editar-projeto-popup')"></button>
        <form action="perfil-projeto.php">
            <div class="box-edit">
                <h1>EDITAR PROJETO</h1>
                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Nome<span>*</span></label>
                        <input id="nome" type="text" maxlength="45" required>
                    </div>
                    <div class="input-box">
                        <label for="meta">Meta de Doação<span>*</span></label>
                        <input id="meta" type="number" placeholder="R$" required>
                    </div>
                </div>
                <div class="input-box">
                    <label for="descricao">Sobre<span>*</span></label>
                    <textarea name="descricao" id="descricao" rows="6" required></textarea>
                </div>
            </div>
            <div class="box-edit">
                <div class="input-box">
                    <div class="qt-img">
                        <label for="fotos">Upload de Fotos<span>*</span></label>
                        <p id="qt-img">0/5</p>
                    </div>
                    <input id="fotos" type="file" name="fotos[]" multiple required>
                </div>
                <button class="btn">SALVAR ALTERAÇÃO <i class="fa-solid fa-floppy-disk"></i></button>
            </div>
        </form>
    </div>
</div>