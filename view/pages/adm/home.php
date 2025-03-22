<?php 
    $tituloPagina = 'tela inicial'; // Definir o título da página
    $cssPagina = ['adm/home.css']; //Colocar o arquivo .css 
    require_once '../../components/header-adm.php';
?>

<main>
    <div id="principal">
        <div class="principal-esq">
            <div class="sub-principal-esq">
                <div class="cards-esq">
                    <h1>BEM VINDO ADM</h1>
                    <div class="card1">
                        <h3>Ongs cadastradas</h3>
                        <p>70</p>
                    </div>
                    <div class="card1">
                        <h3>Projetos</h3>
                        <p>110</p>
                    </div>
                    <div class="card1">
                        <h3>Doadores</h3>
                        <p>400</p>
                    </div>
                </div>
                <div class="principal-dir">
                    <img src="../../assets/images/figura-inicial.png" alt="">
                </div>
                <h4 class="sub-dir">DASHBOARD</h4>
            </div>

            <main class="main-content">
                <section class="section solicitacoes">
                    <div class="section-header-s">
                        <div><img class="section-icon orange" src="../../assets/images/notificacao.png" alt=""></div>
                        <span>SOLICITAÇÕES</span>
                    </div>
                    <div class="cards-grid">
                        <!-- Card Empresas -->
                        <div class="action-card purple">
                            <div class="card-header">Empresas</div>
                            <p class="card-description">Aprove ou recuse solicitações de parcerias de empresas</p>
                            <button class="card-button">
                                <span class="icon">👜</span> <!-- Ícone de mala -->
                                Ir para lista
                                <span class="notification">6</span>
                            </button>
                        </div>
        
                        <!-- Card ONGS -->
                        <div class="action-card orange">
                            <div class="card-header">ONGS</div>
                            <p class="card-description">Aprove ou recuse cadastros de ONG's novas no sistema</p>
                            <button class="card-button">
                                <span class="icon">🏅</span> <!-- Ícone de medalha -->
                                Ir para lista
                                <span class="notification">5</span>
                            </button>
                        </div>
        
                        <!-- Card Inativar -->
                        <div class="action-card red">
                            <div class="card-header">Remover</div>
                            <p class="card-description">remover parceria com empresa ou Ongs</p>
                            <button class="card-button">
                                <span class="icon">🚫</span> <!-- Ícone de bloqueio -->
                                Ir para lista
                                <span class="notification">9</span>
                            </button>
                        </div>
                    </div>
                </section>
        
                <section class="section ongs">
                    <div class="section-header-o">
                        <div><img class="section-icon orange" src="../../assets/images/lupa_bg.png" alt=""></div>
                        <span>ONGS (70)</span>
                    </div>
                    <table class="table-ongs">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Projetos</th>
                                <th>Doações</th>
                                <th>Voluntários</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ONG 1</td>
                                <td>12</td>
                                <td>R$ 300.000</td>
                                <td>20 Ativos</td>
                            </tr>
                            <tr>
                                <td>ONG 2</td>
                                <td>7</td>
                                <td>R$ 10.000</td>
                                <td>13 Ativos</td>
                            </tr>
                            <tr>
                                <td>ONG 3</td>
                                <td>5</td>
                                <td>R$ 23.372</td>
                                <td>34 Ativos</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="#" class="ver-todos">VER TODAS</a>
                </section>
        
                <section class="section projetos">
                    <div class="section-header-p">
                        <div><img class="section-icon green" src="../../assets/images/globo.png" alt=""></div>
                        <span>PROJETOS (110)</span>
                    </div>
                    <table class="table-projetos">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>ONG</th>
                                <th>Doações</th>
                                <th>Voluntários</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Projeto 1</td>
                                <td>Salve os Animais</td>
                                <td>R$ 10.230</td>
                                <td>13 Ativos</td>
                            </tr>
                            <tr>
                                <td>Projeto 2</td>
                                <td>Ajuda Mais</td>
                                <td>R$ 3.232</td>
                                <td>6 Ativos</td>
                            </tr>
                            <tr>
                                <td>Projeto 3</td>
                                <td>Teleton</td>
                                <td>R$ 272</td>
                                <td>1 Ativo</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="#" class="ver-todos">VER TODOS</a>
                </section>
        
                <section class="section doadores">
                    <div class="section-header-d">
                        <div><img class="section-icon blue" src="../../assets/images/user.png" alt="">
                        </div>
                        <span>DOADORES (400)</span>
                    </div>
                    <table class="table-doadores">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Doações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>João</td>
                                <td>joaozin@gmail.com</td>
                                <td>R$ 300</td>
                            </tr>
                            <tr>
                                <td>Levi</td>
                                <td>leviarc@gmail.com</td>
                                <td>R$ 4.300</td>
                            </tr>
                            <tr>
                                <td>Elisângela</td>
                                <td>eli2731@gmail.com</td>
                                <td>R$ 19.430</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="#" class="ver-todos">VER TODOS</a>
                </section>
            </main>

        </div>
    </div>
</main>

<?php
    $jsPagina = []; //Colocar o arquivo .js (exemplo: 'ONG/cadastro.js')
    require_once '../../components/footer.php';
?>