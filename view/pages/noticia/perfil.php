<?php
$tituloPagina = 'Leia Mais | Organizer';
$cssPagina = ['noticia/perfil.css'];
require_once '../../components/layout/base-inicio.php';

$perfil = $_SESSION['perfil_usuario'] ?? '';
?>
<main <?php if ($perfil == 'doador') echo 'class="usuario-logado"'; ?>>
    <div class="container-noticia">
        <section id="carousel">
            <div id="carousel-imgs">
                <img src="../../assets/images/noticia-foto1.jpg" class="carousel-item">
                <img src="../../assets/images/noticia-foto2.jpg" class="carousel-item">
                <img src="../../assets/images/noticia-foto3.jpg" class="carousel-item">
                <img src="../../assets/images/noticia-foto4.jpg" class="carousel-item">
            </div>
        </section>
        <section class="area-materia">
            <div class="titulo">
                <h1>Título da Notícia</h1>
                <span>Publicado em: 01/01/2025</span>
                <h5>Nome da Ong</h5>
            </div>
            <div class="texto">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, ipsam aut labore autem porro ipsa vero placeat vitae repudiandae facere. Corporis, nostrum. Ex, laborum ad! Nihil eveniet commodi laborum nobis! Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus doloremque et deserunt reprehenderit eius enim ad veritatis corporis. Quasi aliquam atque aperiam inventore deserunt a sint tenetur rerum eos voluptas?</p>
            </div>
            <!-- Subtítulo -->
            <div class="subtitulo">
                <div class="sub-img">
                    <img src="../../assets/images/noticia-foto-meio.png">
                </div>
                <div class="sub-texto">
                    <h3>Subtítulo</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, in. Libero reiciendis illo similique expedita saepe facilis, quis dolores nam nisi officia itaque tempora cum accusamus voluptates corporis asperiores quo.</p>
                </div>
            </div>
        </section>
    </div>
</main>
<?php
$jsPagina = ['noticia/perfil.js'];
require_once '../../components/footer.php';
?>