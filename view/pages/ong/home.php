<?php
$acesso = 'ong';
$tituloPagina = 'Home | Organizer';
$cssPagina = ['ong/home.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$ongModel = new Ong();
$projetoModel = new Projeto();
$noticiaModel = new NoticiaModel();
$listaNoticiasRecentes = $noticiaModel->listarRecentes($_SESSION['ong_id']);
$listaProjetosRecentes = $projetoModel->listarRecentesOng($_SESSION['ong_id']);
$minhaOng = $ongModel->buscarPerfil($_SESSION['ong_id']);
$dadosOng = $ongModel->buscarDados($_SESSION['ong_id']);
?>
<!-- Toast -->
<div id="toast-cadastro-ong" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    Cadastro realizado com Sucesso!
</div>

<main class="container">
    <div id="title">
        <h1> <?= $minhaOng->nome ?></h1>
        <!-- <p>PAINEL</p> -->
    </div>
    <div id="resumo">
        <a class="resumo-item" href="relatorios.php">
            <h3>R$ <?= number_format($dadosOng->qnt_doacoes, 0, ',', '.'); ?> <span>DOAÇÔES</span></h3>
            <i class="fa-solid fa-coins"></i>
        </a>
        <a class="resumo-item" href="projetos.php">
            <h3><?= $dadosOng->qnt_projeto ?> <span>PROJETOS</span></h3>
            <i class="fa-solid fa-diagram-project"></i>
        </a>
        <a class="resumo-item" href="relatorios.php">
            <h3><?= $dadosOng->qnt_apoiador ?> <span>APOIADORES</span></h3>
            <i class="fa-solid fa-hand-holding-heart"></i>
        </a>
        <a class="resumo-item" href="noticias.php">
            <h3><?= $dadosOng->qnt_noticia ?> <span>NOTÍCIAS</span></h3>
            <i class="fa-solid fa-newspaper"></i>
        </a>
    </div>
    <!-- <nav id="nav-home">
        <a href="noticias.php"><img src="../../assets/images/icons/gif-noticia.gif" alt=""><span>NOTÍCIAS</span></a>
        <a href="projetos.php"><img src="../../assets/images/icons/gif-projeto.gif" alt=""><span>PROJETOS</span></a>
        <a href="meu-perfil.php"><img src="../../assets/images/icons/gif-perfil.gif" alt=""><span>PERFIL</span></a>
        <a href="apoiadores.php"><img src="../../assets/images/icons/gif-voluntario.gif" alt=""><span>APOIADORES</span></a>
        <a href="relatorios.php"><img src="../../assets/images/icons/gif-relatorio.gif" alt=""><span>RELATÓRIOS</span></a>
    </nav> -->

    <div id="atividades">
        <h4>SUAS ATIVIDADES RECENTES</h4>
        <div id="cards">
            <?php foreach ($listaProjetosRecentes as $projeto) {
                $tipo = "projeto";
                require '../../components/cards/card-atividades-recentes.php';
            } ?>
            <?php foreach ($listaNoticiasRecentes as $noticia) {
                $tipo = "noticia";
                require '../../components/cards/card-atividades-recentes.php';
            } ?>
        </div>
    </div>



    <!-- <div id="atividades">
        <h4>SUAS ATIVIDADES RECENTES</h4>
        <div id="cards">
            <div class="card-acoes">
                <div class="icon tp-doacao">
                    <img src="../../assets/images/icons/icon-projeto.png">
                </div>
                <div class="acoes-text">
                    <h4>Projeto Criado</h4>
                    <p>Você criou o Projeto “ >”</p>
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
    </div> -->
</main>
<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
// Ativar os toast
if (isset($_SESSION['cadastro-ong'])) {
    echo "<script>mostrar_toast('toast-cadastro-ong')</script>";
    unset($_SESSION['cadastro-ong']);
}
?>