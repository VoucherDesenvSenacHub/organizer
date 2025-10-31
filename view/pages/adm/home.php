<?php
$acesso = 'adm';
$tituloPagina = 'Home | ADM';
$cssPagina = ['adm/home.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$adminModel = new AdminModel();
$relatorio = $adminModel->RelatorioHome();
$solicitacoes = $adminModel->ContadoresSolicitacoes();

$relatorioOng = $adminModel->buscarOngs();
$relatorioProjeto = $adminModel->buscarProjetos();
$relatorioDoador = $adminModel->buscarDoadores();
$relatorioNoticia = $adminModel->buscarNoticias();

?>
<main class="conteudo-principal">
    <section>
        <div id="title">
            <h1><i class="fa-solid fa-user-secret"></i> <?= $_SESSION['usuario']['nome'] ?></h1>
            <p>DASHBOARD</p>
        </div>
        <div id="resumo">
            <a href="ongs.php">
                <div class="resumo-item">
                    <h3><?= $relatorio['qnt_ongs'] ?> <span>ONGS</span></h3>
                    <i class="fa-solid fa-building-flag"></i>
                </div>
            </a>
            <a href="projetos.php">
                <div class="resumo-item">
                    <h3><?= $relatorio['qnt_projetos'] ?> <span>PROJETOS</span></h3>
                    <i class="fa-solid fa-diagram-project"></i>
                </div>
            </a>
            <a href="usuarios.php">
                <div class="resumo-item">
                    <h3><?= $relatorio['qnt_usuarios'] ?> <span>USUÁRIOS</span></h3>
                    <i class="fa-solid fa-users"></i>
                </div>
            </a>
        </div>
        <div class="dashboard">
            <fieldset id="section-solicitacao">
                <legend><i class="fa-solid fa-bell"></i> SOLICITAÇÕES</legend>
                <div class="card-adm">
                    <h4>EMPRESAS</h4>
                    <span>Aprove ou recuse solicitações de parcerias de empresas.</span>
                    <a href="parcerias.php">
                        <div><i class="fa-solid fa-handshake"></i>
                            <p><?= $solicitacoes->empresas ?> Solicitações</p>
                        </div>
                    </a>
                </div>
                <div class="card-adm">
                    <h4>ONGS</h4>
                    <span>Aprove ou recuse cadastros de ONG’s novas no sistema.</span>
                    <a href="solicitacoes-ongs.php">
                        <div><i class="fa-solid fa-building-flag"></i>
                            <p><?= $solicitacoes->ongs ?> Solicitações</p>
                        </div>
                    </a>
                </div>
            </fieldset>
        </div>
        <div class="secao-3">
            <div class="container-card">
                <div class="top">
                    <i class="fa-solid fa-building-flag"></i>
                    <h1>Ongs</h1>
                </div>
                <div class="content">
                    <?php foreach ($relatorioOng as $ong): ?>
                        <a class="item" href="../ong/perfil.php?id=<?= $ong['ong_id'] ?>">
                            <div class="left">
                                <h2><?= $ong['nome'] ?></h2>
                                <div class="info">
                                    <span><?= $ong['total_projetos'] ?> Projetos</span>
                                    |
                                    <span><?= $ong['total_apoios'] ?> Apoios</span>
                                </div>
                            </div>
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                        <span class="linha"></span>
                    <?php endforeach; ?>
                </div>
                <a class="area-btn" href="ongs.php">
                    <button class="btn">Todas as Ongs</button>
                </a>
            </div>

            <div class="container-card">
                <div class="top">
                    <i class="fa-solid fa-diagram-project"></i>
                    <h1>Projetos</h1>
                </div>
                <div class="content">
                    <?php foreach ($relatorioProjeto as $projeto): ?>
                        <a class="item" href="../projeto/perfil.php?id=<?= $projeto['projeto_id'] ?>">
                            <div class="left">
                                <h2><?= $projeto['nome'] ?></h2>
                                <div class="info">
                                    <span>R$ <?= number_format($projeto['valor_arrecadado'], 0, ',', '.') ?></span>
                                    |
                                    <span><?= $projeto['total_apoios'] ?> Apoios</span>
                                </div>
                            </div>
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                        <span class="linha"></span>
                    <?php endforeach; ?>
                </div>
                <a class="area-btn" href="projetos.php">
                    <button class="btn">Todos os Projetos</button>
                </a>
            </div>

            <div class="container-card">
                <div class="top">
                    <!-- <i class="fa-solid fa-users"></i> -->
                    <img src="../../assets/images/icons/icon-doadores.png">
                    <h1>Doadores</h1>
                </div>
                <div class="content">
                    <?php foreach ($relatorioDoador as $doador): ?>
                        <a class="item" href="#">
                            <div class="left">
                                <h2><?= $doador['nome'] ?></h2>
                                <div class="info">
                                    <span>R$ <?= number_format($doador['valor_doado'], 0, ',', '.') ?> Doações</span>
                                    <!-- |
                                    <span>Texto</span> -->
                                </div>
                            </div>
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                        <span class="linha"></span>
                    <?php endforeach; ?>
                </div>
                <a class="area-btn" href="usuarios.php">
                    <button class="btn">Todos os Doadores</button>
                </a>
            </div>

            <div class="container-card">
                <div class="top">
                    <i class="fa-solid fa-newspaper"></i>
                    <h1>Notícias</h1>
                </div>
                <div class="content">
                    <?php foreach ($relatorioNoticia as $noticia): ?>
                        <a class="item" href="../noticia/perfil.php?id=<?= $noticia['noticia_id'] ?>">
                            <div class="left">
                                <h2><?= $noticia['titulo'] ?></h2>
                                <div class="info">
                                    <span><i class="fa-solid fa-calendar-days"></i> <?= date('d/m/Y', strtotime($noticia['data_cadastro'])) ?></span>
                                    <!-- |
                                    <span>Texto</span> -->
                                </div>
                            </div>
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                        <span class="linha"></span>
                    <?php endforeach; ?>
                </div>
                <a class="area-btn" href="noticias.php">
                    <button class="btn">Todas as Notícias</button>
                </a>
            </div>
        </div>
        <div>
        <a class="area-btn" href="bloquear-noticias.php">
                    <button class="btn">Bloquear publicação de noticia de ong</button>
                </a>
                </div>
    </section>
</main>
<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
?>