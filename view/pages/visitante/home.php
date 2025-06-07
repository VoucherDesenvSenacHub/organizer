<?php
$acesso = 'visitante';
$tituloPagina = 'Home | Organizer';
$cssPagina = ['visitante/home.css'];
require_once '../../components//layout/base-inicio.php';

require_once '../../../model/OngModel.php';
$ongModel = new Ong();

$lista = $ongModel->listar();
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
                <img src="../../assets/images//pages/child.png" alt="">
            </div>
        </div>
    </section>

    <section class="secoes" id="secao-2">
        <div class="container">
            <h1>ONGS EM DESTAQUES</h1>
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
                    <button class="btn" onclick="abrir_popup_empresas('body-empresas')">Saiba Mais</button>
                </div>
            </div>
            <a id="scroll-home" href="#secao-1" class="fa-solid fa-arrow-up"></a>
        </div>
    </section>
</main>
<div id="body-empresas">
    <div class="container-empresas">
        <h1 class="h1u">Conheça empresas que nos apoiam</h1>
        <div class="grid">
            <div class="card">
                <img src="../../assets/images/image 171.png" alt="Faber-Castell">
            </div>
            <div class="card">
                <img src="../../assets/images/image 170.png" alt="Nu">
            </div>
            <div class="card">
                <img src="../../assets/images/image 173.png" alt="Pedigree">
            </div>
            <div class="card">
                <img src="../../assets/images/image 172.png" alt="Cielo">
            </div>
            <div class="card">
                <img src="../../assets/images/image 174.png" alt="Coral">
            </div>
            <div class="card">
                <img src="../../assets/images/imagem_2024-07-26_200350433-removebg-preview 1.png" alt="Guaraná">
            </div>
        </div>
        <div class="pagination">
            <button class="page-btn">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn">4</button>
            <button class="page-btn">></button>
        </div>
        <div class="boton">
            <button class="partner-btn" onclick="abrir_popup_form('body-forma')">QUERO SER PARCEIRO</button>
        </div>
    </div>
    <div id="body-forma" class="popup-fundo">
        <div class="conteiner-forma">
            <h2 class="titulo">Solicitação de Parceria</h2>
            <form id="formParceiro" action=""
                onsubmit="mensagem_enviada('toast-mensagem-enviada', 'body-forma'); return false;">
                <label class="Cnpj" for="cnpj">CNPJ</label>
                <input type="text" id="cnpj" maxlength="11" placeholder="000.000.000-00" required>

                <label class="mens" for="mensagem">Mensagem</label>
                <textarea id="mensagem"
                    placeholder="Ex: Somos a Coca-Cola e gostaríamos de apoiar seu projeto. Aguardo retorno!"
                    required></textarea>
                <div class="botoes">
                    <div>
                        <button type="button" onclick="fechar_popup('body-forma')" class="btn-voltar">VOLTAR</button>
                    </div>
                    <div>
                        <button type="submit">ENVIAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="toast-mensagem-enviada" class="toast">
        <i class="fa-regular fa-circle-check"></i>
        Mensagem enviada com sucesso!
    </div>
    <script>
        document.getElementById("formParceiro").addEventListener("submit", function(event) {
            event.preventDefault();
            this.reset();
        });
    </script>
    <?php
    $jsPagina = ['home-doador.js']; //Colocar o arquivo .js
    require_once '../../components/footer.php';
    ?>