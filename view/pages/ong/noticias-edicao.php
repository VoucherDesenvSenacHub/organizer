<?php 
    $tituloPagina = 'Editar Notícias'; // Definir o título da página
    $cssPagina = ['ong/noticias-edicao.css']; //Colocar o arquivo .css 
    require_once '../../components/header-ong.php';

    $noticia = (object) [
        'codnot' => '',
        'titulo' => '',
        'subtitulo' => '',
        'texto' => '',
        'subtexto' => ''
    ];
    $acao = 'EDITAR NOTICIA';
    require_once '../../components/popup/formulario-noticia.php';
?>

        <!-- Fim cabeçalho -->


    <!-- Início DIV principal -->
    <div id="principal">
        <div class="container-fotos">
            <div class="fotos-slide">
                <img src="../../assets/images/noticia-foto1.jpg" alt="">
                <img src="../../assets/images/noticia-foto2.jpg" alt="">
                <img src="../../assets/images/noticia-foto3.jpg" alt="">
                <img src="../../assets/images/noticia-foto4.jpg" alt="">
                <img src="../../assets/images/noticia-foto5.jpg" alt="">
            </div>
        </div>
        <div class="cabecalho-noticia">
            <div>
                <h1 class="h1-pb">SOS Rio Grande do Sul</h1>
                <h2 class="h2-pb">Publicado em 29 de agosto de 2024</h2>
            </div>

            <div> 
            <!-- <div>   
                <button class="botao-nova-noticia" onclick="abrir_popup('editar-noticia-popup')">Editar</button>
                <button class="botao-nova-noticia" onclick="popConclusao('')">Excluir</button>
            </div> -->
            </div>
            <div class="botoes-edicao">
                <button id="editar-noticia" onclick="abrir_popup('editar-noticia-popup')">Editar<img src="../../assets/images/editar.png" alt="" ></button>
                <button id="deletar-noticia" onclick="popConclusao('delete')">Excluir<img src="../../assets/images/delete-noticia.png" alt=""></button>
            </div>
        </div>
        <div id="texto-noticia">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus convallis molestie commodo. 
                Donec cursus ex vitae erat eleifend viverra. Sed luctus metus at nisl interdum suscipit. Ut venenatis 
                aliquet lacus ut placerat. Morbi bibendum, nulla feugiat laoreet cursus, purus sem vestibulum massa, 
                laoreet rutrum justo diam non urna. Nulla facilisi. Suspendisse hendrerit nunc vehicula sem mattis 
                tincidunt. Nulla facilisi. Mauris suscipit lorem vitae mi cursus, at laoreet urna elementum. Proin vel 
                tellus eu massa iaculis cursus. Aliquam ultrices enim et gravida scelerisque. Sed et molestie eros. 
                Duis sit amet velit tincidunt, consequat velit ac, fermentum nisi.</p>
            <img src="../../assets/images/noticia-foto-meio.png" alt="" id="foto-meio-noticia">
            <h3>Subtitulo</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus convallis molestie commodo. 
                Donec cursus ex vitae erat eleifend viverra. Sed luctus metus at nisl interdum suscipit. 
                Ut venenatis aliquet lacus ut placerat. Morbi bibendum</p>
        </div>
    </div>
    <!-- Fim DIV principal  -->

    
    <!-- Pop-up conclusão -->
    <div id="pop-conclusao">
        <img id="icone-conclusao" src="" alt="" width="20%">
        <p id="texto-conclusao"></p>
    </div>
    
    <!-- Fim do popup conclusão -->
    <?php
        $jsPagina = ['ongs.js']; //Colocar o arquivo .js
        require_once '../../components/footer.php';
    ?>

</body>
</html>