<?php
$acesso = 'adm';
$tituloPagina = 'Home | ADM';
$cssPagina = ['adm/home.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$adminModel = new AdminModel();
$relatorio = $adminModel->RelatorioHome();
$solicitacoes = $adminModel->ContadoresSolicitacoes();
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
                    <i class="fa-solid fa-house-flag"></i>
                </div>
            </a>
            <a href="projetos.php">
                <div class="resumo-item">
                    <h3><?= $relatorio['qnt_projetos'] ?> <span>PROJETOS</span></h3>
                    <i class="fa-solid fa-diagram-project"></i>
                </div>
            </a>
            <a href="doadores.php">
                <div class="resumo-item">
                    <h3><?= $relatorio['qnt_usuarios'] ?> <span>DOADORES</span></h3>
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
                        <div><i class="fa-solid fa-house-flag"></i>
                            <p><?= $solicitacoes->ongs ?> Solicitações</p>
                        </div>
                    </a>
                </div>
            </fieldset>
        </div>
        <div class="secao-3">
            <div class="container-card">
                <div class="top">
                    <i class="fa-solid fa-house-flag"></i>
                    <h1>Ongs</h1>
                </div>
                <div class="content">
                    <div class="list">
                        <div class="left">
                            <h2>Nome da Ong</h2>
                            <div class="info">
                                <span>2 Projetos</span>
                                <span>4 Apoios</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <span class="linha"></span>
                    <div class="list">
                        <div class="left">
                            <h2>Nome da Ong</h2>
                            <div class="info">
                                <span>2 Projetos</span>
                                <span>4 Apoios</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <span class="linha"></span>
                    <div class="list">
                        <div class="left">
                            <h2>Nome da Ong</h2>
                            <div class="info">
                                <span>2 Projetos</span>
                                <span>4 Apoios</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <span class="linha"></span>
                    <div class="list">
                        <div class="left">
                            <h2>Nome da Ong</h2>
                            <div class="info">
                                <span>2 Projetos</span>
                                <span>4 Apoios</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    
                </div>
                <div class="area-btn">
                    <button class="btn">Todas as Ongs</button>
                </div>
            </div>
            <div class="container-card">
                <div class="top">
                    <i class="fa-solid fa-house-flag"></i>
                    <h1>Ongs</h1>
                </div>
                <div class="content">
                    <div class="list">
                        <div class="left">
                            <h2>Nome da Ong</h2>
                            <div class="info">
                                <span>2 Projetos</span>
                                <span>4 Apoios</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <span class="linha"></span>
                    <div class="list">
                        <div class="left">
                            <h2>Nome da Ong</h2>
                            <div class="info">
                                <span>2 Projetos</span>
                                <span>4 Apoios</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <span class="linha"></span>
                    <div class="list">
                        <div class="left">
                            <h2>Nome da Ong</h2>
                            <div class="info">
                                <span>2 Projetos</span>
                                <span>4 Apoios</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <span class="linha"></span>
                    <div class="list">
                        <div class="left">
                            <h2>Nome da Ong</h2>
                            <div class="info">
                                <span>2 Projetos</span>
                                <span>4 Apoios</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    
                </div>
                <div class="area-btn">
                    <button class="btn">Todas as Ongs</button>
                </div>
            </div>
            <div class="container-card">
                <div class="top">
                    <i class="fa-solid fa-house-flag"></i>
                    <h1>Ongs</h1>
                </div>
                <div class="content">
                    <div class="list">
                        <div class="left">
                            <h2>Nome da Ong</h2>
                            <div class="info">
                                <span>2 Projetos</span>
                                <span>4 Apoios</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <span class="linha"></span>
                    <div class="list">
                        <div class="left">
                            <h2>Nome da Ong</h2>
                            <div class="info">
                                <span>2 Projetos</span>
                                <span>4 Apoios</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <span class="linha"></span>
                    <div class="list">
                        <div class="left">
                            <h2>Nome da Ong</h2>
                            <div class="info">
                                <span>2 Projetos</span>
                                <span>4 Apoios</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <span class="linha"></span>
                    <div class="list">
                        <div class="left">
                            <h2>Nome da Ong</h2>
                            <div class="info">
                                <span>2 Projetos</span>
                                <span>4 Apoios</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    
                </div>
                <div class="area-btn">
                    <button class="btn">Todas as Ongs</button>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
?>