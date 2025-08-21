<div class="popup-fundo" id="doacao-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('doacao-popup')"></button>
        <h1>QUANTO VOCÊ DESEJA DOAR?</h1>
        <form action="../../../controller/Projeto/DoarProjetoController.php" method="POST">
            <div id="radio-group">
                <input type="hidden" name="projeto-id" value="<?= $IdProjeto ?>">
                <input type="hidden" name="valor-arrecadado" value="<?= $PerfilProjeto['valor_arrecadado'] ?>">
                <input type="hidden" name="meta" value="<?= $PerfilProjeto['meta'] ?>">
                <label>
                    <input type="radio" name="valor-doacao" value="10" required>
                    <span>R$ 10</span>
                </label>
                <label>
                    <input type="radio" name="valor-doacao" value="30">
                    <span>R$ 30</span>
                </label>
                <label>
                    <input type="radio" name="valor-doacao" value="50">
                    <span>R$ 50</span>
                </label>
                <label>
                    <input type="radio" name="valor-doacao" value="100">
                    <span>R$ 100</span>
                </label>
                <label id="input-value">
                    <input type="radio" name="valor-doacao" value="outro">
                    <span>R$</span>
                    <input type="number" name="valor-personalizado" placeholder="Outro Valor">
                </label>
            </div>
            <button type="submit" class="btn">FAZER DOAÇÃO</button>
        </form>
    </div>
</div>