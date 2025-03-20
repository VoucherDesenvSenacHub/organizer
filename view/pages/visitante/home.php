<!-- PEGAR A BASE NO README.md -->

<?php 
    $tituloPagina = 'Home | Organizer'; // Definir o título da página
    $cssPagina = ['visitante/home.css']; //Colocar o arquivo .css 
    require_once '../../components/header.php';
?>
<!-- COMEÇAR SEU CÓDIGO AQUI -->
<main>
        <section class="secoes" id="secao-1">
            <div class="container">
                <div id="area-texto">
                    <h1>AJUDE ONGS</h1>
                    <p>Encontre e apoie projetos incríveis! faça doações ou torne-se voluntário. Juntos vamos fazer a diferença!</p>
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
                    <div class="card-ong">
                        <div class="perfil">
                            <div class="logo">
                                <p>Logo</p>
                            </div>
                            <div class="nome">
                                <h2>Nome da ONG</h2>
                                <p>Área de Atuação</p>
                            </div>
                        </div>
                        <div class="descricao">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                                alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                                cumque minus nobis, ipsum delectus!</p>
                        </div>
                        <div class="doacao">
                            <p><span>150 </span>Doações</p>
                            <p><span>9 </span>Projetos</p>
                        </div>
                        <div class="acoes-ong">
                            <a href="perfil-ong.php" class="saiba-mais-ong">Saiba Mais</a>
                            <div class="btn-salvar">
                                <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                                <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-ong">
                        <div class="perfil">
                            <div class="logo">
                                <p>Logo</p>
                            </div>
                            <div class="nome">
                                <h2>Nome da ONG</h2>
                                <p>Área de Atuação</p>
                            </div>
                        </div>
                        <div class="descricao">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                                alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                                cumque minus nobis, ipsum delectus!</p>
                        </div>
                        <div class="doacao">
                            <p><span>150 </span>Doações</p>
                            <p><span>9 </span>Projetos</p>
                        </div>
                        <div class="acoes-ong">
                            <a href="perfil-ong.php" class="saiba-mais-ong">Saiba Mais</a>
                            <div class="btn-salvar">
                                <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                                <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-ong">
                        <div class="perfil">
                            <div class="logo">
                                <p>Logo</p>
                            </div>
                            <div class="nome">
                                <h2>Nome da ONG</h2>
                                <p>Área de Atuação</p>
                            </div>
                        </div>
                        <div class="descricao">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                                alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                                cumque minus nobis, ipsum delectus!</p>
                        </div>
                        <div class="doacao">
                            <p><span>150 </span>Doações</p>
                            <p><span>9 </span>Projetos</p>
                        </div>
                        <div class="acoes-ong">
                            <a href="perfil-ong.php" class="saiba-mais-ong">Saiba Mais</a>
                            <div class="btn-salvar">
                                <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                                <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-ong">
                        <div class="perfil">
                            <div class="logo">
                                <p>Logo</p>
                            </div>
                            <div class="nome">
                                <h2>Nome da ONG</h2>
                                <p>Área de Atuação</p>
                            </div>
                        </div>
                        <div class="descricao">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                                alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                                cumque minus nobis, ipsum delectus!</p>
                        </div>
                        <div class="doacao">
                            <p><span>150 </span>Doações</p>
                            <p><span>9 </span>Projetos</p>
                        </div>
                        <div class="acoes-ong">
                            <a href="perfil-ong.php" class="saiba-mais-ong">Saiba Mais</a>
                            <div class="btn-salvar">
                                <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                                <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-ong">
                        <div class="perfil">
                            <div class="logo">
                                <p>Logo</p>
                            </div>
                            <div class="nome">
                                <h2>Nome da ONG</h2>
                                <p>Área de Atuação</p>
                            </div>
                        </div>
                        <div class="descricao">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                                alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                                cumque minus nobis, ipsum delectus!</p>
                        </div>
                        <div class="doacao">
                            <p><span>150 </span>Doações</p>
                            <p><span>9 </span>Projetos</p>
                        </div>
                        <div class="acoes-ong">
                            <a href="perfil-ong.php" class="saiba-mais-ong">Saiba Mais</a>
                            <div class="btn-salvar">
                                <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                                <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-ong">
                        <div class="perfil">
                            <div class="logo">
                                <p>Logo</p>
                            </div>
                            <div class="nome">
                                <h2>Nome da ONG</h2>
                                <p>Área de Atuação</p>
                            </div>
                        </div>
                        <div class="descricao">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                                alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                                cumque minus nobis, ipsum delectus!</p>
                        </div>
                        <div class="doacao">
                            <p><span>150 </span>Doações</p>
                            <p><span>9 </span>Projetos</p>
                        </div>
                        <div class="acoes-ong">
                            <a href="perfil-ong.php" class="saiba-mais-ong">Saiba Mais</a>
                            <div class="btn-salvar">
                                <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                                <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                            </div>
                        </div>
                    </div>
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
                        <p>Somos uma plataforma dedicada a conectar você com ONGs e projetos que fazem a diferença. Nossa missão é facilitar o apoio a causas sociais e ambientais, oferecendo uma maneira simples e transparente para você contribuir e se envolver.</p>
                    </div>
                    <div>
                        <i class="fa-solid fa-handshake"></i>
                        <h3>Nossos Parceiros</h3>
                        <p>Conheça empresas e organizações que colaboram conosco para criar um impacto positivo. Veja como essas parcerias ajudam a fortalecer a nossa missão.</p>
                        <button class="btn">Saiba Mais</button>
                    </div>
                </div>
                <a id="scroll-home" href="#secao-1" class="fa-solid fa-arrow-up"></a>
            </div>
        </section>
    </main>

<?php
    $jsPagina = []; //Colocar o arquivo .js
    require_once '../../components/footer.php';
?>



<!-- PEGAR A BASE NO README.md -->