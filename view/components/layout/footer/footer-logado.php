

<footer>
    <div class="container">
        <div class="item">
            <h1>Organizer</h1>
            <p>Somos uma plataforma dedicada a conectar você com ONGs e projetos que fazem a diferença. Nossa missão é facilitar o apoio a causas sociais e ambientais, oferecendo uma maneira simples e transparente para você contribuir e se envolver.</p>
        </div>
        <!-- <div class="item">
            <h1>Links</h1>
            <div class="links">
                <a href="../doador/home.php">Home</a>
                <a href="../ong/lista.php">Ongs</a>
                <a href="../projeto/lista.php">Projetos</a>
                <a href="../noticia/lista.php">Notícias</a>
            </div>
        </div> -->
        <div class="item">
            <h1>Apoio</h1>
            <p>Senac Hub Academy</p>
            <div class="links">
                <a href="https://github.com/VoucherDesenvSenacHub/organizer" target="_blank"><i class="fa-brands fa-square-github"></i></a>
                <a href="https://www.instagram.com/senachubacademy/" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
            </div>
        </div>
        <?php if(isset($_SESSION['usuario']['id']) and !$_SESSION['usuario']['acessos']['ong']): ?>
            <div class="item">
                <h1>Criar uma Ong</h1>
                <p>Já pensou em criar sua própria ONG? <br> Transforme ideias em impacto real com seu próprio projeto social.</p>
                <form onsubmit="return confirm('Deseja realmente criar uma ONG com sua conta?')" action="../../../controller/Usuario/PrimeiroAcessoUsuarioController.php" method="POST">
                    <input type="hidden" name="escolha" value="ong">
                    <button class="btn">Criar uma Ong</button>
                </form>
            </div>
        <?php elseif(!isset($_SESSION['usuario']['id'])): ?>
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
<script src="../../assets/js/global/cadastro.js"></script>

<!-- JS Específicos da Página -->
<?php
if (isset($jsPagina) && is_array($jsPagina)) {
    foreach ($jsPagina as $js) {
        echo '<script src="../../assets/js/pages/' . $js . '"></script>' . PHP_EOL;
    }
}
?>

<!-- Mascara do popup de ver perfil -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    $("#telefone_usuario").mask("(00) 0 0000-0000");
    $("#cpf_usuario").mask("000.000.000-00");
    $("#nome_usuario").on("input", function () {
        var valor = $(this).val();
        $(this).val(valor.replace(/[^a-zA-ZÀ-ÿ\s]/g, ""));
    });
</script>

</body>

</html>