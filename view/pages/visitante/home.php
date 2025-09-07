<?php
$acesso = 'visitante';
$tituloPagina = 'Home | Organizer';
$cssPagina = ['visitante/home.css'];
require_once '../../components//layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$ongModel = new OngModel();

$lista = $ongModel->listarCardsOngs('recentes');
// var_dump($lista);
?>
<!-- COMEÇAR SEU CÓDIGO AQUI -->
<div id="toast-volte-sempre" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    Tchau, até mais tarde
</div>
<main>
    <section class="secoes" id="secao-1">
        <div class="container">
            <div id="area-texto">
                <h1>AJUDE ONGS</h1>
                <p>Encontre e apoie projetos incríveis! faça doações ou torne-se voluntário. Juntos vamos fazer a
                    diferença!</p>
                <a href="#secao-2"><button class="btn">Conhecer</button></a>
            </div>
            <div id="area-img">
                <img src="../../assets/images/pages/visitante/criancas.png" alt="">
            </div>
        </div>
    </section>

    <section class="secoes" id="secao-2">
        <div class="container">
            <h1>ONGS RECENTES</h1>
            <div class="box-ongs">
                <?php foreach ($lista as $ong):
                    require '../../components/cards/card-ong.php';
                endforeach; ?>
            </div>
        </div>
    </section>

    <section class="secoes" id="secao-3">
        <div class="container">
            <h1>SOBRE O PROJETO</h1>
            <div id="info">
                <div>
                    <i class="fa-solid fa-users"></i>
                    <h3>Quem Somos</h3>
                    <p>Somos uma plataforma dedicada a conectar você com ONGs e projetos que fazem a diferença. Nossa
                        missão é facilitar o apoio a causas sociais e ambientais, oferecendo uma maneira simples e
                        transparente para você contribuir e se envolver.</p>
                </div>
                <div>
                    <i class="fa-solid fa-handshake"></i>
                    <h3>Nossos Parceiros</h3>
                    <p>Conheça empresas e organizações que colaboram conosco para criar um impacto positivo. Veja como
                        essas parcerias ajudam a fortalecer a nossa missão.</p>
                        <a href="parcerias.php">Saiba Mais</a>
                </div>
            </div>
            <a id="scroll-home" href="#secao-1" class="fa-solid fa-arrow-up"></a>
        </div>
    </section>
</main>
    <?php
    $jsPagina = [];
    require_once '../../components/layout/footer/footer-visitante.php';
    ?>