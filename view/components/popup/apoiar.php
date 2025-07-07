<div class="popup-fundo" id="apoiar-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('apoiar-popup')"></button>
        <!-- Se eu JÁ apoio -->
        <?php if (isset($jaApoiou) && $jaApoiou): ?>
            <h1>Você já apoia este projeto</h1>
            <p>Se quiser, você pode retirar seu apoio. Isso não afeta o projeto diretamente, mas ajuda a manter suas preferências atualizadas.</p>
            <form action="#" method="POST" onsubmit="return confirm('Tem certeza que deseja remover seu apoio deste projeto?')">
                <input type="hidden" name="projeto-desapoiar-id" value="<?= $_GET['id'] ?>">
                <button class="btn btn-desapoiar" type="submit">
                    <img src="../../assets/images/pages/icone-coracao-partido.png">
                    <span>REMOVER APOIO</span>
                </button>
            </form>
            <!-- Se eu NÃO apoio -->
        <?php else: ?>
            <h1>Deseja apoiar este projeto?</h1>
            <p>Mesmo sem contribuir com dinheiro agora, seu apoio é muito importante para inspirar outras pessoas!</p>
            <form action="#" method="POST">
                <input type="hidden" name="projeto-apoio-id" value="<?= $_GET['id'] ?>">
                <button class="btn" type="submit">
                    <img src="../../assets/images/pages/icone-apoio.png">
                    <span>APOIAR PROJETO</span>
                </button>
            </form>
        <?php endif; ?>
        <!-- <button onclick="fechar_popup('apoiar-popup')">Mais Tarde</button> -->
    </div>
</div>