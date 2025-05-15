<?php
$tituloPagina = 'Home | ADM';
$cssPagina = ['adm/home.css'];
require_once '../../components/header-adm.php';
?>
<main class="container">
    <div id="title">
        <h1>BEM VINDO</h1>
        <p>DASHBOARD</p>
    </div>
    <div id="resumo">
        <a href="ver-ong.php">
            <div class="resumo-item">
                <h3>30 <span>ONGS</span></h3>
                <i class="fa-solid fa-house-flag"></i>
            </div>
        </a>
        <a href="ver-projetos.php">
            <div class="resumo-item">
                <h3>110 <span>PROJETOS</span></h3>
                <i class="fa-solid fa-diagram-project"></i>
            </div>
        </a>
        <a href="ver-doadores.php">
            <div class="resumo-item">
                <h3>400 <span>DOADORES</span></h3>
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
                <a href="solicitacao-parcerias.php">
                    <div><i class="fa-solid fa-handshake"></i>
                        <p>5 Solicitações</p>
                    </div>
                </a>
            </div>
            <div class="card-adm">
                <h4>ONGS</h4>
                <span>Aprove ou recuse cadastros de ONG’s novas no sistema.</span>
                <a href="ongs-a-serem-validadas.php">
                    <div><i class="fa-solid fa-house-flag"></i>
                        <p>5 Solicitações</p>
                    </div>
                </a>
            </div>
            <div class="card-adm">
                <h4>INATIVAR</h4>
                <span>Confirme a inativação do projeto solicitados pela ONG.</span>
                <div><i class="fa-solid fa-trash-can"></i>
                    <p>5 Solicitações</p>
                </div>
            </div>
        </fieldset>

        <fieldset id="section-ong">
            <legend><i class="fa-solid fa-house-flag"></i> ONGS</legend>
            <table id="table-ong">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NOME</th>
                        <th>PROJETOS</th>
                        <th>CRIADO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="#">0</td>
                        <td data-label="NOME">ONG 1</td>
                        <td data-label="PROJETOS">15</td>
                        <td data-label="CRIADO">12/05/2025</td>
                        <td>
                            <form method="GET">
                                <input type="hidden" name="id" value="">
                                <button class="fa-solid fa-pen-to-square"></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="#">1</td>
                        <td data-label="NOME">ONG 2</td>
                        <td data-label="PROJETOS">15</td>
                        <td data-label="CRIADO">12/05/2025</td>
                        <td>
                            <form method="GET">
                                <input type="hidden" name="id" value="">
                                <button class="fa-solid fa-pen-to-square"></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="#">2</td>
                        <td data-label="NOME">ONG 3</td>
                        <td data-label="PROJETOS">15</td>
                        <td data-label="CRIADO">12/05/2025</td>
                        <td>
                            <form method="GET">
                                <input type="hidden" name="id" value="">
                                <button class="fa-solid fa-pen-to-square"></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
        <fieldset id="section-projeto">
            <legend><i class="fa-solid fa-diagram-project"></i> PROJETOS</legend>
            <table id="table-projeto">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NOME</th>
                        <th>ONG</th>
                        <th>ARRECADADO</th>
                        <th>CRIADO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="#">0</td>
                        <td data-label="NOME">Projeto 1</td>
                        <td data-label="ONG">ONG 1</td>
                        <td data-label="ARRECADADO">R$ 15.000</td>
                        <td data-label="CRIADO">12/05/2025</td>
                        <td>
                            <form method="GET">
                                <input type="hidden" name="id" value="">
                                <button class="fa-solid fa-pen-to-square"></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="#">1</td>
                        <td data-label="NOME">Projeto 2</td>
                        <td data-label="ONG">ONG 2</td>
                        <td data-label="ARRECADADO">R$ 5.000</td>
                        <td data-label="CRIADO">12/05/2025</td>
                        <td>
                            <form method="GET">
                                <input type="hidden" name="id" value="">
                                <button class="fa-solid fa-pen-to-square"></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="#">2</td>
                        <td data-label="NOME">Projeto 3</td>
                        <td data-label="ONG">ONG 3</td>
                        <td data-label="ARRECADADO">R$ 500</td>
                        <td data-label="CRIADO">12/05/2025</td>
                        <td>
                            <form method="GET">
                                <input type="hidden" name="id" value="">
                                <button class="fa-solid fa-pen-to-square"></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
        <fieldset id="section-doador">
            <legend><i class="fa-solid fa-users"></i> DOADORES</legend>
            <table id="table-doador">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th>DOAÇÕES</th>
                        <th>CRIADO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="#">0</td>
                        <td data-label="NOME">Gean</td>
                        <td data-label="EMAIL">gean@organizer.com</td>
                        <td data-label="DOAÇÕES">R$ 5.000</td>
                        <td data-label="CRIADO">01/01/2025</td>
                        <td>
                            <form method="GET">
                                <input type="hidden" name="id" value="">
                                <button class="fa-solid fa-pen-to-square"></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="#">1</td>
                        <td data-label="NOME">João</td>
                        <td data-label="EMAIL">joao@organizer.com</td>
                        <td data-label="DOAÇÕES">R$ 3.400</td>
                        <td data-label="CRIADO">01/01/2025</td>
                        <td>
                            <form method="GET">
                                <input type="hidden" name="id" value="">
                                <button class="fa-solid fa-pen-to-square"></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="#">2</td>
                        <td data-label="NOME">Maria</td>
                        <td data-label="EMAIL">maria@gmail.com</td>
                        <td data-label="DOAÇÕES">R$ 20.000</td>
                        <td data-label="CRIADO">01/01/2025</td>
                        <td>
                            <form method="GET">
                                <input type="hidden" name="id" value="">
                                <button class="fa-solid fa-pen-to-square"></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </div>
</main>
<?php
$jsPagina = [];
require_once '../../components/footer.php';
?>