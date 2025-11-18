<footer>
    <div class="container">
        <div>
            <div class="item">
                <h1>Organizer</h1>
                <p>Somos uma plataforma dedicada a conectar você com ONGs e projetos que fazem a diferença. Nossa missão é facilitar o apoio a causas sociais e ambientais, oferecendo uma maneira simples e transparente para você contribuir e se envolver.</p>
            </div>
            <?php if (isset($_SESSION['usuario']['id']) and !$_SESSION['usuario']['acessos']['ong']): ?>
                <div class="item">
                    <h1>Nossos Parceiros</h1>
                    <p>Conheça empresas e organizações que colaboram conosco para criar um impacto positivo. Veja como
                        essas parcerias ajudam a fortalecer a nossa missão.</p>
                    <a href="../visitante/parcerias.php"><button class="btn">Saiba Mais</button></a>
                </div>
            <?php endif ?>
        </div>
        <?php if (isset($_SESSION['usuario']['id']) and !$_SESSION['usuario']['acessos']['ong']): ?>
            <div>
                <div class="item">
                    <h1>Criar uma Ong</h1>
                    <p>Já pensou em criar sua própria ONG? <br> Transforme ideias em impacto real com seu próprio projeto social.</p>
                    <form onsubmit="return confirm('Deseja realmente criar uma ONG com sua conta?')" action="../../../controller/Usuario/PrimeiroAcessoUsuarioController.php" method="POST">
                        <input type="hidden" name="escolha" value="ong">
                        <button class="btn">Criar uma Ong</button>
                    </form>
                </div>
                <div class="item">
                    <h1>Apoio</h1>
                    <p>Senac Hub Academy</p>
                    <div class="links">
                        <a href="https://github.com/VoucherDesenvSenacHub/organizer" target="_blank"><i class="fa-brands fa-square-github"></i></a>
                        <a href="https://www.instagram.com/senachubacademy/" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
                    </div>
                </div>
            </div>
        <?php elseif (!isset($_SESSION['usuario']['id'])): ?>
            <div class="item">
                <h1>Apoio</h1>
                <p>Senac Hub Academy</p>
                <div class="links">
                    <a href="https://github.com/VoucherDesenvSenacHub/organizer" target="_blank"><i class="fa-brands fa-square-github"></i></a>
                    <a href="https://www.instagram.com/senachubacademy/" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
                </div>
            </div>
            <div class="item">
                <h1>Criar uma Ong</h1>
                <p>Já pensou em criar sua própria ONG? <br> Transforme ideias em impacto real com seu próprio projeto social.</p>
                <a href="../visitante/login.php"><button class="btn">Criar uma Ong</button></a>
            </div>
        <?php endif ?>
    </div>
</footer>
</div><!-- Fecha a div#container-conteudo -->
</div><!-- Fecha a div.container -->
</main>

<!-- Arquivo JS Principal -->
<script src="../../assets/js/global/main.js"></script>
<script src="../../assets/js/global/logado.js"></script>
<script src="../../assets/js/global/mascaras.js"></script>

<!-- JS Específicos da Página -->
<?php
if (isset($jsPagina) && is_array($jsPagina)) {
    foreach ($jsPagina as $js) {
        echo '<script src="../../assets/js/pages/' . $js . '"></script>' . PHP_EOL;
    }
}
?>
<?php
if (isset($_SESSION['mensagem_toast'])) {
    $tipo = json_encode($_SESSION['mensagem_toast'][0]);
    $mensagem = json_encode($_SESSION['mensagem_toast'][1]);
    echo "<script>exibir_toast($tipo, $mensagem)</script>";
    unset($_SESSION['mensagem_toast']);
}
?>
</body>

</html>