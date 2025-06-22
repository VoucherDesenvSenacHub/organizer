<?php
$acesso = 'ong';
$tituloPagina = 'Home | Organizer';
$cssPagina = ['ong/home.css'];
require_once '../../components/layout/base-inicio.php';

require_once '../../../model/OngModel.php';
$ongModel = new Ong();
$minhaOng = $ongModel->buscarPerfil($_SESSION['ong_id']);
$dadosOng = $ongModel->buscarDados($_SESSION['ong_id']);
?>
<main class="container">
    <div id="title">
        <h1> <?= $minhaOng->nome ?></h1>
        <!-- <p>PAINEL</p> -->
    </div>
    <div id="resumo">
        <a class="resumo-item" href="projetos.php">
            <h3><?= $dadosOng->qnt_projeto ?> <span>PROJETOS</span></h3>
            <i class="fa-solid fa-diagram-project"></i>
        </a>
        <a class="resumo-item" href="relatorios.php">
            <h3>R$ <?= number_format($dadosOng->qnt_doacoes, 0, ',', '.'); ?> <span>DOAÇÔES</span></h3>
            <i class="fa-solid fa-coins"></i>
        </a>
        <a class="resumo-item" href="apoiadores.php">
            <h3>??? <span>APOIADORES</span></h3>
            <i class="fa-solid fa-users"></i>
        </a>
    </div>
    <nav id="nav-home">
        <a href="noticias.php"><img src="../../assets/images/icons/gif-noticia.gif" alt=""><span>NOTÍCIAS</span></a>
        <a href="projetos.php"><img src="../../assets/images/icons/gif-projeto.gif" alt=""><span>PROJETOS</span></a>
        <a href="meu-perfil.php"><img src="../../assets/images/icons/gif-perfil.gif" alt=""><span>PERFIL</span></a>
        <a href="apoiadores.php"><img src="../../assets/images/icons/gif-voluntario.gif" alt=""><span>APOIADORES</span></a>
        <a href="relatorios.php"><img src="../../assets/images/icons/gif-relatorio.gif" alt=""><span>RELATÓRIOS</span></a>
    </nav>
    <div id="atividades">
        <h4>SUAS ATIVIDADES RECENTES</h4>
        <div id="cards">
            <div class="card-acoes">
                <div class="icon tp-doacao">
                    <img src="../../assets/images/icons/icon-projeto.png">
                </div>
                <div class="acoes-text">
                    <h4>Projeto Criado</h4>
                    <p>Você criou o Projeto “Mais Amor”</p>
                    <span>04 de agosto de 2024, 14:21</span>
                </div>
            </div>
            <div class="card-acoes">
                <div class="icon tp-noticia">
                    <img src="../../assets/images/icons/icon-noticia.png">
                </div>
                <div class="acoes-text">
                    <h4>Notícia Publicada</h4>
                    <p>Você publicou a notícia “Meta Alcançada”</p>
                    <span>04 de agosto de 2024, 14:21</span>
                </div>
            </div>
            <div class="card-acoes">
                <div class="icon tp-alterar">
                    <img src="../../assets/images/icons/icon-alterar.png">
                </div>
                <div class="acoes-text">
                    <h4>Perfil Alterado</h4>
                    <p>Você alterou o seu “endereço”.</p>
                    <span>04 de agosto de 2024, 14:21</span>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
$jsPagina = [];
require_once '../../components/footer.php';
?>