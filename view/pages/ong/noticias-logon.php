<?php 
    $tituloPagina = 'Editar Notícias'; // Definir o título da página
    $cssPagina = ['ong/noticias-logon.css']; //Colocar o arquivo .css 
    require_once '../../components/header-ong.php';
    require_once '../../components/popup/formulario-noticia.php';
?>
    
    <!-- Início DIV principal -->
    <div id="principal">
        <div id="painel-l1">
            <h1>SUAS NOTÍCIAS PUBLICADAS</h1>

                <div>   
                    <button class="botao-nova-noticia" onclick="abrir_popup('editar-noticia-popup')">NOVA NOTÍCIA +</button>
                </div>
        </div>
        <div id="noticias-publicadas">
            <div class="card-noticia">
                <img src="../../assets/images/sos-rs.png" alt="">
                <span>
                    <h2><a href="#">SOS Rio Grande do Sul</a></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur qui quasi accusamus ipsa inventore deserunt perspiciatis unde dolorum reiciendis officia? </p>
                </span>
                <span class="btn-edicao">
                    <a href="noticias-edicao.php"><button><img src="../../assets/images/edit.png" alt=""></button></a>
                    <button onclick="popConclusao('delete')"><img src="../../assets/images/delete.png" alt=""></button>
                </span>
            </div>
            <div class="card-noticia">
                <img src="../../assets/images/imagem-prevista.png" alt="">
                <span>
                    <h2>Título da Matéria</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur qui quasi accusamus ipsa inventore deserunt perspiciatis unde dolorum reiciendis officia? </p>
                </span>
                <span class="btn-edicao">
                    <button><img src="../../assets/images/edit.png" alt=""></button>
                    <button onclick="popConclusao('delete')"><img src="../../assets/images/delete.png" alt=""></button>
                </span>
            </div>
            <div class="card-noticia">
                <img src="../../assets/images/imagem-prevista.png" alt="">
                <span>
                    <h2>Título da Matéria</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur qui quasi accusamus ipsa inventore deserunt perspiciatis unde dolorum reiciendis officia? </p>
                </span>
                <span class="btn-edicao">
                    <button><img src="../../assets/images/edit.png" alt=""></button>
                    <button onclick="popConclusao('delete')"><img src="../../assets/images/delete.png" alt=""></button>
                </span>
            </div>
            <div class="card-noticia">
                <img src="../../assets/images/imagem-prevista.png" alt="">
                <span>
                    <h2>Título da Matéria</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur qui quasi accusamus ipsa inventore deserunt perspiciatis unde dolorum reiciendis officia? </p>
                </span>
                <span class="btn-edicao">
                    <button><img src="../../assets/images/edit.png" alt=""></button>
                    <button onclick="popConclusao('delete')"><img src="../../assets/images/delete.png" alt=""></button>
                </span>
            </div>
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