
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
<?php
    $jsPagina = ['home-doador.js']; //Colocar o arquivo .js (exemplo: 'ONG/cadastro.js')
    require_once '../../components/footer.php';
?>