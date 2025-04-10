<?php 
    $tituloPagina = 'Editar Notícias'; // Definir o título da página
    $cssPagina = ['ong/noticias-edicao.css']; //Colocar o arquivo .css 
    require_once '../../components/header-ong.php';
?>
        <!-- Fim cabeçalho -->


    <!-- DIV Criação -->
    <div id="pagina-criacao">
        <div id="edicao-esquerda">
            <h1>NOVA NOTÍCIA</h1>
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
            <button onclick="popConclusao('edicao')">Salvar notícia<img src="../../assets/images/editar.png" alt=""></button>
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