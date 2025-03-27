<?php 
    $tituloPagina = 'Perfil do Projeto | Organizer';
    $cssPagina = ['visitante/perfil-projeto.css'];
    require_once '../../components/header.php';
?>

<main>
    <div class="container" id="container-principal">
        <section id="apresentacao" class="container-section">
            <div id="dados-projeto">
                <h1>NOME PROJETO</h1>
                <!-- <span id="data-criacao">Criada em 12/04/2023</span> -->
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
                    <button class="btn" onclick="abrir_popup('login-obrigatorio-popup')">Fazer uma doação</button>
                    <button class="btn" id="btn-voluntario" onclick="abrir_popup('login-obrigatorio-popup')">Ser Voluntário</button>
                </div>
            </div>
            <div id="imagem">
                <img src="../../assets/images/pages/perfil-projeto.png" alt="">
            </div>
            <div id="logo-ong">
                <img src="https://placeholder.pagebee.io/api/plain/400/250">
                <div class="btn-salvar">
                    <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                    <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                </div>
            </div>
        </section>
        <section class="container-section">
            <div id="btns-group">
                <div class="icon-title">
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
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-medalha.png" alt="">
                    <h3>Responsável</h3>
                </div>
            </div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur repellendus distinctio sunt nisi architecto nulla optio at quia perspiciatis fuga sapiente tenetur, recusandae, dolor ut praesentium animi, quo dolorem? Doloribus!
        </section>
    </div>
</main>

<?php
    $jsPagina = [];
    require_once '../../components/footer.php';
?>