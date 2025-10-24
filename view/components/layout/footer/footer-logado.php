        </div><!-- Fecha a div#container-conteudo -->
    </div><!-- Fecha a div.container -->
</main>

<footer>
    <!-- Em desenvolvimento... -->
</footer>


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