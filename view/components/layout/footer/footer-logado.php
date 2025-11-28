<footer>
    <div class="container single-column">

        <div class="col-section">
            <div class="item-group">
                <div class="item">
                    <h1>Organizer</h1>
                    <p>Somos uma plataforma dedicada a conectar você com ONGs e projetos que fazem a diferença.</p>
                </div>
                <div class="item">
                    <h1>Desenvolvedores</h1>
                    <p>Os desenvolvedores foram cruciais para transformar nossa visão em uma solução robusta.</p>
                    <a href="../visitante/desenvolvedores.php"><button class="btn">Saiba Mais</button></a>
                </div>
                <div class="item">
                    <h1>Nossos Parceiros</h1>
                    <p>Conheça empresas e organizações que colaboram conosco para criar um impacto positivo.</p>
                    <a href="../visitante/parcerias.php"><button class="btn">Saiba Mais</button></a>
                </div>
            </div>
        </div>

        <div class="col-section">
            <div class="item-group">
                <?php if (!isset($_SESSION['usuario']['id'])): ?>
                    <div class="item">
                        <h1>Junte-se a Nós</h1>
                        <p>Faça parte da nossa comunidade e ajude a fazer a diferença no mundo.</p>
                        <a href="../visitante/login.php"><button class="btn">Cadastrar-se</button></a>
                    </div>
                <?php elseif (isset($_SESSION['usuario']['id']) && !$_SESSION['usuario']['acessos']['ong']): ?>
                    <div class="item">
                        <h1>Criar uma ONG</h1>
                        <p>Já pensou em criar sua própria ONG? Transforme ideias em impacto real.</p>
                        <form onsubmit="return confirm('Deseja realmente criar uma ONG com sua conta?')"
                            action="../../../controller/Usuario/PrimeiroAcessoUsuarioController.php"
                            method="POST">
                            <input type="hidden" name="escolha" value="ong">
                            <button class="btn">Criar uma ONG</button>
                        </form>
                    </div>
                <?php endif ?>
                <div class="item">
                    <h1>Apoio</h1>
                    <p>Senac Hub Academy</p>
                    <div class="links">
                        <a href="https://github.com/VoucherDesenvSenacHub/organizer" target="_blank"><i class="fa-brands fa-square-github"></i></a>
                        <a href="https://www.instagram.com/senachubacademy/" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="copyright">
            <p>&copy; <?php echo date('Y'); ?> Organizer. Todos os direitos reservados.</p>
        </div>
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