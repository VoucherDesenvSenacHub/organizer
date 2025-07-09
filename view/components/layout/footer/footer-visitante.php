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

</body>
</html>