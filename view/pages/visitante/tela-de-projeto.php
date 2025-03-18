<?php 
    $tituloPagina = ''; // Definir o título da página
    $cssPagina = ['visitante/tela-de-projeto.css']; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header.php';
?>
<main>

<div id="erro403" class="popup-fundo">
        <div class="container-popup" id="popup-erro">
            <div class="img">
                <img src="../../assets/images/erro403.png" alt="Erro 403">
            </div>
            <div class="msg">
                <p class="linha1">Para realizar essa ação,</p>
                <p>Faça seu <a href="../doador/login.php">login</a></p>
                <button class="btn-maistarde" onclick="fechar_popup('erro403')">Mais Tarde</button>
            </div>
        </div>
    </div>
    

<div id="principal">
        <div class="principal-esq">
            <div class="principal-dir">
                <div class="info-conteiner">
                    <div class="header-conteiner">
                        <p class="nome-projeto">NOME DO PROJETO</p>
                        <p class="arrecadado">Arrecadado: R$ 20.000</p>
                        <progress max="100" value="20"></progres>
                        <div>   
                            
                        </div>
                    </div>
                    <div class="info-projeto">
                        <div>
                            <p>Meta: <strong>R$ 100.000</strong></p>
                            <p class="progress">Status: Em progresso (<strong>20% alcançado</strong>)</p>
                            <p><strong>24  </strong>Doações Recebidas</p>
                        </div>
                        <div class="btn-favoritos-compartilhar" >
                            <button class="btn-favoritos" onclick="abrir_popup('erro403')"><img src="../../assets/images/love.png"alt=""></button>
                            <button class="btn-compartilhar" onclick="abrir_popup('erro403')"><img src="../../assets/images/share.png"alt=""></button>
                        </div>
                    </div>
                    <div class="btns-ajudar-projeto">
                        <button class="btn-doacao" onclick="abrir_popup('erro403')" >Fazer uma doação</button>
                        <button class="btn-voluntario"onclick="abrir_popup('erro403')">Tornar-se voluntário</button>
                    </div>
                </div>
                <div class="carousel">
                    <div class="carousel-imgs">
                        <img src="../../assets/images/ambiental.png" alt="" class="carousel-item">
                        <img src="../../assets/images/ambiental.png"alt="" class="carousel-item">
                        <img src="" alt="" class="carousel-item">
                    </div>
                </div>
            </div>
            
            <div class="btns-slider">
                <button>
                    Sobre
                    <img src="../../assets/images/interrogacao.png" alt="Icon de Interrogação">
                </button>
                <button>
                    Doadores
                    <img src="../../assets/images/donate.png" alt="Icon de Abraço">
                </button>
                <button>
                    Voluntários
                    <img src="../../assets/images/hug.png" alt="Icon de Medalha">
                </button>
                <button>
                    Responsáveis
                    <img src="../../assets/images/gold-medal.png" alt="Icon de Mão colocando moeda">
                </button>
            </div>
            <ul class="conteiner">
                <div>
                    <li class="slide active">
                        <span>Projeto criado em: </>04/08/2023</span>

                        <p class="texto-projeto"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident ducimus enim eum officia,
                            molestiae nostrum? Illum dolorem repellendus pariatur numquam, earum, repellat accusantium,
                            reiciendis maiores dignissimos sint quidem tenetur impedit.</p>
                    </li>
                    <li class="slide">
                        <p class="doadores-projeto">DOADORES DESTE PROJETO</p>
                        <div class="doadores">
                            <div class="doador">
                                <div class="icon-name">
                                    <p>P</p>
                                </div>
                                <p>Pedro</p>
                                <p>R$ 102</p>
                            </div>
                            <div class="doador">
                                <div class="icon-name">
                                    <p>M</p>
                                </div>
                                <p>Mario</p>
                                <p>R$ 102</p>
                            </div>
                            <div class="doador">
                                <div class="icon-name">
                                    <p>M</p>
                                </div>
                                <p>Marcio</p>
                                <p>R$ 102</p>
                            </div>
                            <div class="doador">
                                <div class="icon-name">
                                    <p>M</p>
                                </div>
                                <p>Maria</p>
                                <p>R$ 102</p>
                            </div>
                            <div class="doador">
                                <div class="icon-name">
                                    <p>I</p>
                                </div>
                                <p>Italo</p>
                                <p>R$ 102</p>
                            </div>
                            <div class="doador">
                                <div class="icon-name">
                                    <p>J</p>
                                </div>
                                <p>José</p>
                                <p>R$ 102</p>
                            </div>
                            <div class="doador">
                                <div class="icon-name">
                                    <p>T</p>
                                </div>
                                <p>Thiago</p>
                                <p>R$ 102</p>
                            </div>
                            <div class="doador">
                                <div class="icon-name">
                                    <p>J</p>
                                </div>
                                <p>João</p>
                                <p>R$ 102</p>
                            </div>
                            <div class="doador">
                                <div class="icon-name">
                                    <p>P</p>
                                </div>
                                <p>Paola</p>
                                <p>R$ 102</p>
                            </div>
                            <div class="doador">
                                <div class="icon-name">
                                    <p>R</p>
                                </div>
                                <p>Rita</p>
                                <p>R$ 102</p>
                            </div>
                            <div class="doador">
                                <div class="icon-name">
                                    <p>W</p>
                                </div>
                                <p>Wedson</p>
                                <p>R$ 102</p>
                            </div>
                            <div class="doador">
                                <div class="icon-name">
                                    <p>F</p>
                                </div>
                                <p>Felipe</p>
                                <p>R$ 102</p>
                            </div>
                        </div>
                        <div class="paginacao">
                            <button class="pagina-button active">1</button>
                            <button class="pagina-button">2</button>
                            <button class="pagina-button">3</button>
                            <button class="pagina-button">4</button>
                            <button class="pagina-button">></button>
                        </div>
                    </li>
                    <li class="slide">
                        <p class="doadores-projeto">NOSSOS APOIADORES</p>
                        <div class="voluntarios">
                            <div class="voluntario">
                                <div class="icon-name">
                                    <p>M</p>
                                </div>
                                <div class="info-voluntario">
                                    <p>Marcos<p>
                                    <p>Apoiando o <strong>Projeto tal</strong></p>
                                </div>
                            </div>
                            <div class="voluntario">
                                <div class="icon-name">
                                    <p>J</p>
                                </div>
                                <div class="info-voluntario">
                                    <p>João<p>
                                    <p>Apoiando o <strong>Projeto tal</strong></p>
                                </div>
                            </div>
                            <div class="voluntario">
                                <div class="icon-name">
                                    <p>C</p>
                                </div>
                                <div class="info-voluntario">
                                    <p>Célia<p>
                                    <p>Apoiando o <strong>Projeto tal</strong></p>
                                </div>
                            </div>
                            <div class="voluntario">
                                <div class="icon-name">
                                    <p>E</p>
                                </div>
                                <div class="info-voluntario">
                                    <p>Eren<p>
                                    <p>Apoiando o <strong>Projeto tal</strong></p>
                                </div>
                            </div>
                            <div class="voluntario">
                                <div class="icon-name">
                                    <p>L</p>
                                </div>
                                <div class="info-voluntario">
                                    <p>Levi<p>
                                    <p>Apoiando o <strong>Projeto tal</strong></p>
                                </div>
                            </div>
                            <div class="voluntario">
                                <div class="icon-name">
                                    <p>T</p>
                                </div>
                                <div class="info-voluntario">
                                    <p>Thiago<p>
                                    <p>Apoiando o <strong>Projeto tal</strong></p>
                                </div>
                            </div>
                            <div class="voluntario">
                                <div class="icon-name">
                                    <p>P</p>
                                </div>
                                <div class="info-voluntario">
                                    <p>Paula<p>
                                    <p>Apoiando o <strong>Projeto tal</strong></p>
                                </div>
                            </div>
                            <div class="voluntario">
                                <div class="icon-name">
                                    <p>K</p>
                                </div>
                                <div class="info-voluntario">
                                    <p>Kauê<p>
                                    <p>Apoiando o <strong>Projeto tal</strong></p>
                                </div>
                            </div>
                            <div class="voluntario">
                                <div class="icon-name">
                                    <p>K</p>
                                </div>
                                <div class="info-voluntario">
                                    <p>Kauan<p>
                                    <p>Apoiando o <strong>Projeto tal</strong></p>
                                </div>
                            </div>
                            <div class="voluntario">
                                <div class="icon-name">
                                    <p>O</p>
                                </div>
                                <div class="info-voluntario">
                                    <p>Olivia<p>
                                    <p>Apoiando o <strong>Projeto tal</strong></p>
                                </div>
                            </div>
                            <div class="voluntario">
                                <div class="icon-name">
                                    <p>A</p>
                                </div>
                                <div class="info-voluntario">
                                    <p>Ana<p>
                                    <p>Apoiando o <strong>Projeto tal</strong></p>
                                </div>
                            </div>
                            <div class="voluntario">
                                <div class="icon-name">
                                    <p>H</p>
                                </div>
                                <div class="info-voluntario">
                                    <p>Hebert<p>
                                    <p>Apoiando o <strong>Projeto tal</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="paginacao">
                            <button class="pagina-button active">1</button>
                            <button class="pagina-button">2</button>
                            <button class="pagina-button">3</button>
                            <button class="pagina-button">4</button>
                            <button class="pagina-button">></button>
                        </div>
                    </li>
                    <li class="slide">
                        <p class="doadores-projeto">ONG RESPONSÁVEL</p>
                        <div class="responsaveis">
                            <div class="conteiner-responsaveis">
                                <div class="img">
                                    <img src="../../assets/images/logo-novo.png" alt="">
                                </div>
                                <div class="info-responsavel">
                                    <h3>ONG TODOS JUNTOS</h3>
                                    <p>Área de Atuação</p>
                                    <div class="status-responsavel">
                                        <p>Saúde</p>    
                                        <p>Esporte</p>
                                    </div>
                                    <a href="php"></a><button class="btn-respondavel">
                                        Conhecer ONG</button></a>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
        </div>


<?php
    $jsPagina = ['tela-de-projeto-visitante.js']; //Colocar o arquivo .js (exemplo: 'cadastro.js')
    require_once '../../components/footer.php';
?>
