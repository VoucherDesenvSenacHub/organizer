<?php 
    $tituloPagina = 'Perfil da ONG | Organizer';
    $cssPagina = ['visitante/perfil-ong.css'];
    require_once '../../components/header.php';
?>

<main>
    <div class="container" id="container-principal">
        <section id="apresentacao" class="container-section">
            <div id="logo-ong">
                <img src="https://placeholder.pagebee.io/api/plain/400/250">
                <div class="btn-salvar">
                    <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                    <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                </div>
            </div>
            <div id="dados-ong">
                <h1>NOME ONG</h1>
                <span id="data-criacao">Criada em 12/04/2023</span>
                <h3>Arrecadado: <span>R$ 50.000</span></h3>
                <div id="recebidos">
                    <p><span>150 </span>Doações Recebidas</p>|
                    <p><span>9 </span>Projetos Criados</p>
                </div>
                <div id="acoes">
                    <button class="btn" onclick="abrir_popup('login-obrigatorio-popup')">Fazer uma doação</button>
                    <button class="btn" id="btn-voluntario" onclick="abrir_popup('login-obrigatorio-popup')">Ser Voluntário</button>
                </div>
            </div>
            <div id="imagem">
                <img src="../../assets/images/pages/perfil-ong.png" alt="">
            </div>
        </section>
        <section class="container-section">
            <div class="section-item" id="sobre">
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-sobre.png" alt="">
                    <h3>Sobre</h3>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit doloremque odio, optio adipisci voluptatibus est consequuntur non id soluta officiis dolorum possimus nemo quaerat incidunt accusantium omnis eaque voluptate dignissimos? Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum quis libero iste esse pariatur laudantium. Aliquam minima, incidunt quae ex dolorum voluptas quia animi explicabo facere ad dolores autem ipsam.</p>
            </div>
        </section>
        <section class="container-section" id="apoiadores">
            <div class="section-item">
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-doacao.png" alt="">
                    <h3>Doadores</h3>
                </div>
                <div class="mini-cards">
                    <?php require '../../components/cards/card-doador.php'; ?>
                    <?php require '../../components/cards/card-doador.php'; ?>
                    <?php require '../../components/cards/card-doador.php'; ?>
                    <?php require '../../components/cards/card-doador.php'; ?>
                    <?php require '../../components/cards/card-doador.php'; ?>
                    <?php require '../../components/cards/card-doador.php'; ?>
                </div>
            </div>
            <div class="section-item">
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-abraco.png" alt="">
                    <h3>Voluntários</h3>
                </div>
                <div class="mini-cards">
                    <?php require '../../components/cards/card-voluntario.php'; ?>
                    <?php require '../../components/cards/card-voluntario.php'; ?>
                    <?php require '../../components/cards/card-voluntario.php'; ?>
                    <?php require '../../components/cards/card-voluntario.php'; ?>
                    <?php require '../../components/cards/card-voluntario.php'; ?>
                    <?php require '../../components/cards/card-voluntario.php'; ?>
                </div>
            </div>
        </section>
        <section class="container-section">
            <div class="section-item" id="noticias">
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-megafone.png" alt="">
                    <h3>Notícias</h3>
                </div>
                <div class="mini-cards">
                    <?php require '../../components/cards/card-noticia.php'; ?>
                    <?php require '../../components/cards/card-noticia.php'; ?>
                </div>
            </div>
        </section>
        <section class="container-section">
            <div class="section-item" id="projetos">
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-lampada.png" alt="">
                    <h3>Projetos</h3>
                </div>
                <div class="mini-cards">
                    <?php require '../../components/cards/card-projeto.php'; ?>
                    <?php require '../../components/cards/card-projeto.php'; ?>
                    <?php require '../../components/cards/card-projeto.php'; ?>
                    <?php require '../../components/cards/card-projeto.php'; ?>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
    $jsPagina = [];
    require_once '../../components/footer.php';
?>