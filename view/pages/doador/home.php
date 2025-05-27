<<<<<<< HEAD

<?php 
    $tituloPagina = 'Home'; // Definir o título da página
    $cssPagina = ['doador/home.css']; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header-usuario.php';
?>


<?php require_once '../../components/compartilhar.php'; ?>
<main>
    <section>
        <div class="container">
            <div id="secao-1">
                <div id="container-esq">
                    <div>
                        <h1>Olá Júlia</h1>
                        <p>Explore os projetos e as últimas novidades</p>
                    </div>
                    <div>
                        <h4>Visão Geral</h4>
                        <div class="visaogeral">
                        <a class="btn-info" href="minhas-doacoes.php">
                        <div class="info">
                                <span>Minhas Doações</span>
                                <h5>R$ 300</h5>
                            </div>
                        </a>
                            
                            <div class="info">
                                    <span>Participações</span>
                                    <h5>4 Projetos</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="img-inicio">
                        <img src="../../assets/images/Team work-bro.png" alt="">
                    </div>
                </div>
            <div id="secao-2">
                <h3>Suas atividades recentes</h3>
                <div id="boxCard">
                    <div class="card">
                        <div class="icon" id="icon_money">
                            <img src="../../assets/images/money.png">
                        </div>
                        <div class="text-card">
                            <h4>Doação realizada</h5>
                            <p>Você doou R$ 50,00 para o Projeto “Educação para Todos”</p>
                            <span>04 de agosto de 2024, 14:21</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon" id="icon_heart">
                            <img src="../../assets/images/coracao.png" alt="">
                        </div>
                        <div class="text-card">
                            <h4>Projeto Salvo</h5>
                            <p>Você favoritou o Projeto “Amigos da Natureza””</p>
                            <span>02 de julho de 2024, 04:32</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon" id="icon_hug">
                            <img src="../../assets/images/abraco.png" alt="">
                        </div>
                        <div class="text-card">
                            <h4>Voluntariado Inscrito</h5>
                            <p>Você se inscreveu na ONG “Ajuda Animal””</p>
                            <span>04 de agosto de 2024, 14:21</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="secao-3">
                <h3>Projetos em destaques</h3>
                <div class="cards">
                    <div class="card-projeto">
                        <div class="acoes-projeto">
                            <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                            <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                        </div>
                        <div class="img-projeto">250x130</div>
                        <div class="info-projeto">
                            <h5>Nome Projeto</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                                ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                            </p>
                            <div class="barra-doacao">
                                <span>30%</span>
                                <div class="barra">
                                    <div class="barra-verde"></div>
                                </div>
                            </div>
                        </div>
                        <a class="saiba-mais-projeto" href="perfil-projeto.php">Saiba Mais</a>
                    </div>
                    <div class="card-projeto">
                        <div class="acoes-projeto">
                            <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                            <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                        </div>
                        <div class="img-projeto">250x130</div>
                        <div class="info-projeto">
                            <h5>Nome Projeto</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                                ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                            </p>
                            <div class="barra-doacao">
                                <span>30%</span>
                                <div class="barra">
                                    <div class="barra-verde"></div>
                                </div>
                            </div>
                        </div>
                        <a class="saiba-mais-projeto" href="perfil-projeto.php">Saiba Mais</a>
                    </div>
                    <div class="card-projeto">
                        <div class="acoes-projeto">
                            <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                            <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                        </div>
                        <div class="img-projeto">250x130</div>
                        <div class="info-projeto">
                            <h5>Nome Projeto</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                                ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                            </p>
                            <div class="barra-doacao">
                                <span>30%</span>
                                <div class="barra">
                                    <div class="barra-verde"></div>
                                </div>
                            </div>
                        </div>
                        <a class="saiba-mais-projeto" href="perfil-projeto.php">Saiba Mais</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
        <?php require_once '../../components/meu-perfil-doador.php'; ?>
    </div>
    <!-- <div id="fundo-confirmacao">
        <div id="confirmacao">
            <span>Deseja mesmo sair da conta?</span>
            <div>
                <a href="../visitante/home.php"><button class="sair">SIM</button></a>
                <button class="nao-sair" onclick="fechar_confirmacao()" href="">NÃO</button>
            </div>
        </div>
    </div> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#cpf").mask("000.000.000-00");
            $("#telefone").mask("(00) 00000-0000");
        });
    </script>
</main>
=======
>>>>>>> 6b53f1825d36cd5fe3ec87dea6deb3a1586a340d
<?php
//CONFIGURAÇÕES DA PÁGINA
$tituloPagina = 'Home - Doador';
$cssPagina = ['doador/home.css'];
require_once '../../components/header-doador.php';
?>
<section id="cabecalho">
    <h1>Olá, <?= implode(' ', array_slice(explode(' ', trim($doador->nome)), 0, 2)) ?>.</h1>
    <p>Seja bem-vindo à sua área de doador.</p>
    <div id="info-doacao">
        <div class="item-info">
            <h4>Minhas Doações</h4>
            <h5>R$ 300</h5>
        </div>
        <div class="item-info">
            <h4>Participações</h4>
            <h5>4 Projetos</h5>
        </div>
    </div>
</section>
<section id="acoes-doador">
    <h2>SUAS ATIVIDADES RECENTES</h2>
    <div class="box-cards">
        <div class="card-acoes">
            <div class="icon tp-doacao">
                <img src="../../assets/images/pages/home-doador/icon-dinheiro.png">
            </div>
            <div class="acoes-text">
                <h4>Doação realizada</h4>
                <p>Você doou R$ 50,00 para o Projeto “Educação para Todos”</p>
                <span>04 de agosto de 2024, 14:21</span>
            </div>
        </div>
        <div class="card-acoes">
            <div class="icon tp-salvar">
                <img src="../../assets/images/pages/home-doador/icon-coracao.png">
            </div>
            <div class="acoes-text">
                <h4>Projeto Salvo</h4>
                <p>Você favoritou o Projeto “Amigos da Natureza”</p>
                <span>04 de agosto de 2024, 14:21</span>
            </div>
        </div>
        <div class="card-acoes">
            <div class="icon tp-apoiar">
                <img src="../../assets/images/pages/home-doador/icon-abraco.png">
            </div>
            <div class="acoes-text">
                <h4>Voluntariado Escrito</h4>
                <p>Você se inscreveu na ONG “Ajuda Animal”</p>
                <span>04 de agosto de 2024, 14:21</span>
            </div>
        </div>
    </div>
</section>
<section class="container-cards">
    <h2>PROJETOS EM DESTAQUES</h2>
    <div class="box-cards">
        <?php for ($i = 0; $i < 4; $i++) { ?>
            <div class="card-projeto">
                <div class="acoes-projeto">
                    <button class="btn-share fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                    <button class="btn-like fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                </div>
                <div class="img-projeto">250x130</div>
                <div class="info-projeto">
                    <h5>Nome Projeto</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequatur quo consectetur enim eos totam perspiciatis iure? Expedita dolores beatae officiis quaerat libero veritatis voluptas, ullam natus a animi accusantium earum.</p>
                    <div class="barra-doacao">
                        <span>30%</span>
                        <div class="barra">
                            <div class="barra-verde"></div>
                        </div>
                    </div>
                </div>
                <a class="saiba-mais-projeto" href="perfil-projeto.php">Saiba Mais</a>
            </div>
        <?php } ?>
    </div>
</section>
<!-- <section class="container-cards">
                <h2>ONGS EM DESTAQUES</h2>
                <div class="box-cards">
                    <?php for ($i = 0; $i < 3; $i++) { ?>
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
                                <div class="btns-salvar">
                                    <button class="btn-share fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                                    <button class="btn-like fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section> -->
<?php
$jsPagina = [];
require_once '../../components/footer-doador.php';
?>