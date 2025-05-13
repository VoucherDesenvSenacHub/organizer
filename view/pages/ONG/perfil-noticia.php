<?php
$tituloPagina = 'Editar Notícias'; // Definir o título da página
$cssPagina = ['ong/perfil-noticia.css']; //Colocar o arquivo .css 
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
    <div class="carousel">
        <div class="carousel-imgs">
            <img src="../../assets/images/noticia-foto1.jpg" class="carousel-item">
            <img src="../../assets/images/noticia-foto2.jpg" class="carousel-item">
            <img src="../../assets/images/noticia-foto3.jpg" class="carousel-item">
            <img src="../../assets/images/noticia-foto4.jpg" class="carousel-item">
        </div>
    </div>

    <div class="cima">
        <div class="titulo">
            <h1>Título da notícia</h1>
            <p>Publicado em: 29 de agosto de 2024</p>
            <h3>Nome da ONG</h3>
        </div>

        <div class="botoes-edicao">
            <button id="editar-noticia" onclick="abrir_popup('editar-noticia-popup')">Editar<img
                    src="../../assets/images/editarr.png" class="lapis-editar" alt=""></button>
            <button id="deletar-noticia" onclick="popConclusao('delete')">Excluir<img
                    src="../../assets/images/delete-noticia.png" alt=""></button>
        </div>
    </div>

    <div class="texto">
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus convallis molestie commodo.
            Donec cursus ex vitae erat eleifend viverra. Sed luctus metus at nisl interdum suscipit. Ut venenatis
            aliquet lacus ut placerat.
            Morbi bibendum,nulla feugiat laoreet cursus, purus sem vestibulum massa, laoreet rutrum justo diam non urna.
            Nulla facilisi.
            Suspendisse hendrerit nunc vehicula sem mattis tincidunt. Nulla facilisi. Mauris suscipit lorem vitae mi
            cursus, at laoreet urna elementum.
            Proin vel tellus eu massa iaculis cursus. Aliquam ultrices enim et gravida scelerisque. Sed et molestie
            eros. Duis sit amet velit tincidunt,
            consequat velit ac, fermentum nisi.</p>
    </div>

    <div class="baixo">
        <div>
            <img src="../../assets/images/noticia-foto-meio.png">
        </div>

        <div class="subtitulo">
            <h3>Subitítulo</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus convallis molestie commodo.
                Donec cursus ex vitae erat eleifend viverra. Sed luctus metus at nisl interdum suscipit. Ut venenatis
                aliquet lacus ut placerat.
                Morbi bibendum,nulla feugiat laoreet cursus, purus sem vestibulum massa, laoreet rutrum justo diam non
                urna. Nulla facilisi.
                Suspendisse hendrerit nunc vehicula sem mattis tincidunt. Nulla facilisi. Mauris suscipit lorem vitae mi
                cursus, at laoreet urna elementum.
                Proin vel tellus eu massa iaculis cursus. Aliquam ultrices enim et gravida scelerisque. Sed et molestie.
            </p>
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