<?php
$acesso = 'doador';
//CONFIGURAÇÕES DA PÁGINA
$tituloPagina = 'Home - Doador';
$cssPagina = ['doador/home.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$usuarioModel = new Usuario();
$relatorio = $usuarioModel->RelatorioHome($_SESSION['usuario_id']);
?>
<section id="cabecalho">
    <h1>Olá, <?= implode(' ', array_slice(explode(' ', trim($usuario->nome)), 0, 2)) ?>.</h1>
    <p>Seja bem-vindo à sua área de doador.</p>
    <div id="info-doacao">
        <a class="item-info" href="doacoes.php">
            <h3>R$ <?= number_format($relatorio->qnt_doacoes, 0, ',', '.'); ?> <span>MINHAS DOAÇÕES</span></h3>
            <i class="fa-solid fa-coins"></i>
        </a>
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
                <div class="img-projeto">
                    <img src="../../assets/images/global/image-placeholder.svg">
                </div>
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
                <a class="saiba-mais-projeto" href="../projeto/perfil.php?id=1">Saiba Mais</a>
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
require_once '../../components/layout/footer/footer-logado.php';
?>