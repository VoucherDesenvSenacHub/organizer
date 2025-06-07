<?php
$acesso = 'ong';
require_once '../../../controller/verificarAcesso.php';
VerificarAcesso($acesso);

$tituloPagina = 'Home | Organizer';
$cssPagina = ['ong/home.css'];
require_once '../../components/layout/base-inicio.php';

?>
<main class="container">
    <div id="title">
        <h1>BEM VINDO</h1>
        <p>PAINEL</p>
    </div>
    <div id="resumo">
        <div class="resumo-item">
            <h3>12 <span>PROJETOS</span></h3>
            <i class="fa-solid fa-diagram-project"></i>
        </div>
        <div class="resumo-item">
            <h3>R$ 15.000 <span>DOAÇÔES</span></h3>
            <i class="fa-solid fa-coins"></i>
        </div>
        <div class="resumo-item">
            <h3>45 <span>VOLUNTÁRIOS</span></h3>
            <i class="fa-solid fa-users"></i>
        </div>
    </div>
    <nav id="nav-home">
        <a href="noticias.php"><img src="../../assets/images/icons/gif-noticia.gif" alt=""><span>NOTÍCIAS</span></a>
        <a href="projetos.php"><img src="../../assets/images/icons/gif-projeto.gif" alt=""><span>PROJETOS</span></a>
        <a href="conta.php"><img src="../../assets/images/icons/gif-perfil.gif" alt=""><span>PERFIL</span></a>
        <a href="voluntarios.php"><img src="../../assets/images/icons/gif-voluntario.gif" alt=""><span>VOLUNTÁRIOS</span></a>
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