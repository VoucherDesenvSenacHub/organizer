
<?php 
    $tituloPagina = 'nao logado'; // Definir o título da página
    $cssPagina = ['VISITANTE/nao-logado.css','VISITANTE/nao-logado-form.css']; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header.php';
?>
<!-- COMEÇAR SEU CÓDIGO AQUI -->

<header>
        <div class="navcontainer">
            <div class="logo">
                <h1>LOGO</h1>
            </div>
            <nav id="nav-bar">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Ongs</a></li>
                    <li><a href="#">Projetos</a></li>
                    <li><a href="#">Notícias</a></li>
                </ul>
            </nav>
            <div class="btn-login">
                <button class="btn" id="openPopup" onclick="loginPopup()">LOGIN</button>
                <button onclick="menu_mobile()" id="hamburguer"></button>
            </div>
        </div>
    </header>
    <!-- Fim cabeçalho -->

    <!-- POP-UP -->
    <div id="fundo-popup">
        <div class="popup">
            <div class="msg">
                <h1>Olá, Seja <br> Bem-Vindo!</h1>
                <p>Escolha seu tipo de acesso:</p>
                <ul>
                    <li><i class="fa-solid fa-user"></i><a href="#">Sou um usúario</a></li>
                    <li><i class="fa-solid fa-house-flag"></i><a href="#">Sou uma ONG</a></li>
                    <li><i class="fa-solid fa-user-secret"></i></i><a href="#">Administrador</a></li>
                </ul>
            </div>
            <div class="img">
                <img src="assets/images/celular.png">
            </div>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
<div id="principal">
        <div class="principal-esq">
            <div>
                <h1>AJUDE ONGS</h1>
                <p>Encontre e apoie projetos incríveis! faça doações ou torne-se voluntário. Juntos, fazer a diferença!
                </p>
                <a href="#">Saiba mais</a>
            </div>
        </div>
        <div class="principal-dir">
            <img src="assets/images/Humanitarian Help-bro 1.png" alt="">
        </div>
    </div>
    <!-- Fim DIV principal  -->

    <!-- DIV CARDS -->
    <div>
        <div class="container">
            <h2>ONGS EM DESTAQUE</h2>
            <div class="cards">
                <div class="card">
                    <div class="topo-card">
                        <img src="assets/images/Avatar.png" alt="">
                        <div>
                            <h3>Nome da ong</h3>
                            <p>Área de Atuação</p>
                        </div>
                    </div>
                    <div class="traco"></div>
                    <div class="conteudo-card">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores ab quam ad distinctio
                            tempora possimus molestias, perferendis deserunt non nulla numquam minima nihil aliquam
                            cumque reiciendis magni quibusdam, exercitationem quidem!</p>
                        <div>
                            <p>150 <span>Doações</span></p>
                            <p>150 <span>Projetos</span></p>
                        </div>
                    </div>
                    <div class="traco"></div>
                    <div class="rodape-card">
                        <div class="maisinfo">
                            <a href="#maisinfo">Mais informações</a>
                        </div>
                        <div class="acoes">
                            <a class="compartilhar" href="#compartilhar"><img src="assets/images/Ícones de Salvar.png"
                                    alt=""></a>
                            <a class="curtir" href="#curtir"><img src="assets/images/Ícones de Salvar (2).png"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="topo-card">
                        <img src="assets//images/Avatar.png" alt="">
                        <div>
                            <h3>Nome da ong</h3>
                            <p>Área de Atuação</p>
                        </div>
                    </div>
                    <div class="traco"></div>
                    <div class="conteudo-card">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores ab quam ad distinctio
                            tempora possimus molestias, perferendis deserunt non nulla numquam minima nihil aliquam
                            cumque reiciendis magni quibusdam, exercitationem quidem!</p>
                        <div>
                            <p>150 <span>Doações</span></p>
                            <p>150 <span>Projetos</span></p>
                        </div>
                    </div>
                    <div class="traco"></div>
                    <div class="rodape-card">
                        <div class="maisinfo">
                            <a href="#maisinfo">Mais informações</a>
                        </div>
                        <div class="acoes">
                            <a class="compartilhar" href="#compartilhar"><img src="assets/images/Ícones de Salvar.png"
                                    alt=""></a>
                            <a class="curtir" href="#curtir"><img src="assets/images/Ícones de Salvar (2).png"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="topo-card">
                        <img src="assets/images/Avatar.png" alt="">
                        <div>
                            <h3>Nome da ong</h3>
                            <p>Área de Atuação</p>
                        </div>
                    </div>
                    <div class="traco"></div>
                    <div class="conteudo-card">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores ab quam ad distinctio
                            tempora possimus molestias, perferendis deserunt non nulla numquam minima nihil aliquam
                            cumque reiciendis magni quibusdam, exercitationem quidem!</p>
                        <div>
                            <p>150 <span>Doações</span></p>
                            <p>150 <span>Projetos</span></p>
                        </div>
                    </div>
                    <div class="traco"></div>
                    <div class="rodape-card">
                        <div class="maisinfo">
                            <a href="#maisinfo">Mais informações</a>
                        </div>
                        <div class="acoes">
                            <a class="compartilhar" href="#compartilhar"><img src="assets/images/Ícones de Salvar.png"
                                    alt=""></a>
                            <a class="curtir" href="#curtir"><img src="assets/images/Ícones de Salvar (2).png"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="topo-card">
                        <img src="assets/images/Avatar.png" alt="">
                        <div>
                            <h3>Nome da ong</h3>
                            <p>Área de Atuação</p>
                        </div>
                    </div>
                    <div class="traco"></div>
                    <div class="conteudo-card">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores ab quam ad distinctio
                            tempora possimus molestias, perferendis deserunt non nulla numquam minima nihil aliquam
                            cumque reiciendis magni quibusdam, exercitationem quidem!</p>
                        <div>
                            <p>150 <span>Doações</span></p>
                            <p>150 <span>Projetos</span></p>
                        </div>
                    </div>
                    <div class="traco"></div>
                    <div class="rodape-card">
                        <div class="maisinfo">
                            <a href="#maisinfo">Mais informações</a>
                        </div>
                        <div class="acoes">
                            <a class="compartilhar" href="#compartilhar"><img src="assets/images/Ícones de Salvar.png"
                                    alt=""></a>
                            <a class="curtir" href="#curtir"><img src="assets/images/Ícones de Salvar (2).png"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="topo-card">
                        <img src="assets/images/Avatar.png" alt="">
                        <div>
                            <h3>Nome da ong</h3>
                            <p>Área de Atuação</p>
                        </div>
                    </div>
                    <div class="traco"></div>
                    <div class="conteudo-card">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores ab quam ad distinctio
                            tempora possimus molestias, perferendis deserunt non nulla numquam minima nihil aliquam
                            cumque reiciendis magni quibusdam, exercitationem quidem!</p>
                        <div>
                            <p>150 <span>Doações</span></p>
                            <p>150 <span>Projetos</span></p>
                        </div>
                    </div>
                    <div class="traco"></div>
                    <div class="rodape-card">
                        <div class="maisinfo">
                            <a href="#maisinfo">Mais informações</a>
                        </div>
                        <div class="acoes">
                            <a class="compartilhar" href="#compartilhar"><img src="assets/images/Ícones de Salvar.png"
                                    alt=""></a>
                            <a class="curtir" href="#curtir"><img src="assets/images/Ícones de Salvar (2).png"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="topo-card">
                        <img src="assets/images/Avatar.png" alt="">
                        <div>
                            <h3>Nome da ong</h3>
                            <p>Área de Atuação</p>
                        </div>
                    </div>
                    <div class="traco"></div>
                    <div class="conteudo-card">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores ab quam ad distinctio
                            tempora possimus molestias, perferendis deserunt non nulla numquam minima nihil aliquam
                            cumque reiciendis magni quibusdam, exercitationem quidem!</p>
                        <div>
                            <p>150 <span>Doações</span></p>
                            <p>150 <span>Projetos</span></p>
                        </div>
                    </div>
                    <div class="traco"></div>
                    <div class="rodape-card">
                        <div class="maisinfo">
                            <a href="#maisinfo">Mais informações</a>
                        </div>
                        <div class="acoes">
                            <a class="compartilhar" href="#compartilhar"><img src="assets/images/Ícones de Salvar.png"
                                    alt=""></a>
                            <a class="curtir" href="#curtir"><img src="assets/images/Ícones de Salvar (2).png"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FIM DIV CARDS -->

    <!-- RODAPE -->
    <div class="container-rodape">
        <div>
            <h2>QUEM SOMOS</h2>
            <div class="conteudo-rodape">
                <div class="cont-esq">
                    <div>
                        <h3>Quem somos</h3>
                        <p>Somos uma plataforma dedicada a conectar você com ONGs e projetos que fazem a diferença.
                            Nossa missão é facilitar o apoio a causas sociais e ambientais, oferecendo uma maneira
                            simples e transparente para você contribuir e se envolver.</p>
                    </div>
                </div>
                <div class="cont-dir">
                    <div class="dir-text">
                        <h3>Nossos parceiros</h3>
                        <p>Conheça empresas e organizações que colaboram conosco para criar um impacto positivo. Veja
                            como essas parcerias ajudam a fortalecer a nossa missão.</p>
                    </div>
                    <div>
                        <a href="empresas/index.html">Ver Empresas</a>
                    </div>
                </div>
            </div>
            <div class="botao-voltar">
                <a href="index.html"><img src="assets/images/Arrow up-circle.png" alt=""></a>
            </div>
        </div>
    </div>

<?php
    $jsPagina = ['nao-logado.js']; //Colocar o arquivo .js (exemplo: 'cadastro.js')
    require_once '../../components/footer.php';
?>