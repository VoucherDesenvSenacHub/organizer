<?php
$tituloPagina = 'Perfil do Projeto | Organizer';
$cssPagina = ['ong/perfil-projeto.css'];
require_once '../../components/header-ong.php';
require '../../components/editar-projeto.php';
require '../../components/inativar-projeto.php';
?>

<main>
    <div class="container" id="container-principal">
        <section id="apresentacao" class="container-section">
            <div id="dados-projeto">
                <h1>NOME PROJETO</h1>
                <div id="valor-arrecadado">
                    <h3>Arrecadado: <span>R$ 30.000</span></h3>
                    <div class="barra-doacao">
                        <div class="barra">
                            <div class="barra-verde"></div>
                        </div>
                    </div>
                </div>
                <div id="progresso">
                    <p>Meta: <span>R$ 100.000</span></p>
                    <p>Status: Em progresso <span>(30% alcançado)</span></p>
                    <p><span>24</span> Doações Recebidas</p>
                </div>
                <div id="acoes">
                    <button class="btn" id="btn-editar" onclick="abrir_popup('editar-projeto-popup')"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                    <button class="btn" id="btn-inativar" onclick="abrir_popup('inativar-projeto-popup')"><i class="fa-solid fa-trash-can"></i> Inativar</button>
                </div>
            </div>
            <div id="imagem-ilustrativa">
                <img src="../../assets/images/pages/perfil-projeto.png" alt="">
            </div>
            <div id="carousel" class="carousel">
                <div id="carousel-imgs" class="carousel-imgs">
                    <img src="https://placeholder.pagebee.io/api/plain/400/250" class="carousel-item">
                    <img src="https://placeholder.pagebee.io/api/plain/400/250" class="carousel-item">
                    <img src="https://placeholder.pagebee.io/api/plain/400/250" class="carousel-item">
                </div>
                <div class="btn-salvar">
                    <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                    <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                </div>
            </div>
        </section>
        <div class="popup-fundo" id="carousel-popup">
            <div class="container-popup">
                <button id="x-fechar" class="fa-solid fa-xmark" onclick="fechar_popup('carousel-popup')"></button>
                <div id="carousel-big" class="carousel">
                    <div id="carousel-big-imgs" class="carousel-imgs">
                        <img src="https://placeholder.pagebee.io/api/plain/600/375" class="carousel-item-big">
                        <img src="https://placeholder.pagebee.io/api/plain/600/375" class="carousel-item-big">
                        <img src="https://placeholder.pagebee.io/api/plain/600/375" class="carousel-item-big">
                    </div>
                    <div class="btn-salvar">
                        <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                        <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                    </div>
                </div>
            </div>
        </div>
        <section id="painel-projeto" class="container-section">
            <div id="btns-group">
                <div class="icon-title active">
                    <img src="../../assets/images/pages/icone-sobre.png" alt="">
                    <h3>Sobre</h3>
                </div>
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-doacao.png" alt="">
                    <h3>Doadores</h3>
                </div>
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-abraco.png" alt="">
                    <h3>Voluntários</h3>
                </div>
                <!-- <div class="icon-title">
                    <img src="../../assets/images/pages/icone-medalha.png" alt="">
                    <h3>Responsável</h3>
                </div> -->
            </div>
            <div id="principal-painel">
                <div id="control-painel">
                    <div class="container-painel active">
                        <span id="data-criacao">Projeto criado em: 04/08/2023</span>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sint, quibusdam repellat saepe eos neque rerum placeat, reprehenderit amet vitae consectetur aspernatur autem optio quis eligendi unde cumque voluptatibus omnis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, dolorum amet sapiente error dolor voluptatem delectus ratione laudantium exercitationem labore sit laborum eaque at iste cupiditate explicabo ab. Rerum, temporibus!</p>
                    </div>
                    <div class="container-painel area-doador-voluntario">
                        <h3>DOADORES DESTE PROJETO</h3>
                        <div class="box-cards">
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                        </div>
                    </div>
                    <div class="container-painel area-doador-voluntario">
                        <h3>VOLUNTÁRIOS DESTE PROJETO</h3>
                        <div class="box-cards">
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
$jsPagina = ['perfil-projeto.js'];
require_once '../../components/footer.php';
?>