<?php
//Lógica e dependências primeiro
require_once __DIR__ . "/../../../model/ProjetoModel.php";
require_once __DIR__ . "/../../../model/OngModel.php";
$projetoModel = new Projeto();
$ongModel = new Ong();

//Processamento de dados
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'] ?? null;
    $projeto = $projetoModel->buscarId($id);
    $ong = $ongModel->buscarId($projeto->ong_id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $meta = $_POST['meta'];
    if ($id) {
        $projetoModel->editar($id, $nome, $descricao, $meta);
    }
}

//Definições da página (título e CSS)
$tituloPagina = 'Perfil do Projeto | Organizer';
$cssPagina = ['projeto/perfil.css'];
require_once '../../components/layout/base-inicio.php';
require_once 'partials/popups-projeto.php';
require_once 'partials/toast-projeto.php';

?>
<main>
    <div class="container" id="container-principal">
        <section id="apresentacao" class="container-section">
            <div id="dados-projeto">
                <h1><?= $projeto->nome ?></h1>
                <div id="valor-arrecadado">
                    <h3>Arrecadado: <span>R$ 30.000</span></h3>
                    <div class="barra-doacao">
                        <div class="barra">
                            <div class="barra-verde"></div>
                        </div>
                    </div>
                </div>
                <div id="progresso">
                    <p>Meta: <span>R$ <?= number_format($projeto->meta, 0, ',', '.'); ?></span></p>
                    <p>Status: Em progresso <span>(30% alcançado)</span></p>
                    <p><span>24</span> Doações Recebidas</p>
                </div>
                <!-- Botão de Acões do Projeto -->
                <?php require_once 'partials/acoes-projeto.php'; ?>
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
                <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('carousel-popup')"></button>
                <div id="carousel-big" class="carousel">
                    <div id="carousel-big-imgs" class="carousel-imgs">
                        <img src="https://placeholder.pagebee.io/api/plain/600/375" class="carousel-item-big">
                        <img src="https://placeholder.pagebee.io/api/plain/600/375" class="carousel-item-big">
                        <img src="https://placeholder.pagebee.io/api/plain/600/375" class="carousel-item-big">
                    </div>
                    <!-- <div class="btn-salvar">
                            <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                            <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                        </div> -->
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
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-medalha.png" alt="">
                    <h3>Responsável</h3>
                </div>
            </div>
            <div id="principal-painel">
                <div id="control-painel">
                    <div class="container-painel active">
                        <span id="data-criacao">Projeto criado em: <?= date('d/m/Y', strtotime($projeto->data_cadastro)); ?></span>
                        <p><?= $projeto->descricao ?></p>
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
                    <div class="container-painel area-doador-voluntario">
                        <h3>ONG RESPONSÁVEL</h3>
                        <div class="card-ong">
                            <div class="perfil">
                                <div class="logo">
                                    <p>Logo</p>
                                </div>
                                <div class="nome">
                                    <h2><?= $ong->nome ?></h2>
                                    <!-- <p>Área de Atuação</p> -->
                                </div>
                            </div>
                            <div class="acoes-ong">
                                <a href="../ong/perfil.php?id=<?= $projeto->ong_id ?>" class="saiba-mais-ong">Conhecer ONG</a>
                                <div class="btn-salvar">
                                    <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                                    <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                                </div>
                            </div>
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