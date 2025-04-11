<?php 
    $tituloPagina = 'Criar Notícias'; // Definir o título da página
    $cssPagina = ['ong/noticias-edicao.css']; //Colocar o arquivo .css 
    require_once '../../components/header-ong.php';
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
            <div class="botoes-edicao">
                <button id="editar-noticia" onclick="editarNoticia()">Editar<img src="../../assets/images/editar.png" alt="" ></button>
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

    <!-- DIV Pop-up Edição -->
    <div id="pagina-edicao">
        <div id="edicao-esquerda">
            <h1>CRIAR NOTÍCIA</h1>
            <form>
                <div id="linha1-edicao">
                    <div>
                        <label for="titulo-noticia">Título</label><br>
                        <input type="text" id="titulo-noticia" placeholder="Título">
                    </div>
                    <div>
                        <label for="subtitulo-noticia">Subítulo</label><br>
                        <input type="text" id="subtitulo-noticia" placeholder="Subtítulo">
                    </div>
                </div>
                <label for="texto1">Texto 1</label><br>
                <textarea name="texto1" id="texto1" cols="60" rows="10"></textarea><br>
                <label for="texto2">Texto 2</label><br>
                <textarea name="texto2" id="texto2" cols="60" rows="10"></textarea><br>
            </form>
        </div>
        <div id="edicao-direita">
            <div id="upload-fotos">
                <img src="../../assets/images/avatar.png" alt="" width="90%">
                <button><img src="../../assets/images/icon-upload.png" alt="">Upload de fotos</button>
            </div>
            <button onclick="popConclusao('edicao')">Criar Notícia <img src="../../assets/images/editar.png" alt=""></button>
        </div>
    </div>
    <!-- Fim da Pop-up edição -->

    
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