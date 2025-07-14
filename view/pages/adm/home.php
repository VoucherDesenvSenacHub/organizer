<?php
$acesso = 'adm';
$tituloPagina = 'Home | ADM';
$cssPagina = ['adm/home.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$adminModel = new AdminModel();
$relatorio = $adminModel->RelatorioHome();
?>
<main class="container">
    <div id="title">
        <h1><i class="fa-solid fa-user-secret"></i> <?= $_SESSION['usuario']['nome'] ?></h1>
        <p>DASHBOARD</p>
    </div>
    <div id="resumo">
        <a href="ongs.php">
            <div class="resumo-item">
                <h3><?= $relatorio->qnt_ongs ?> <span>ONGS</span></h3>
                <i class="fa-solid fa-house-flag"></i>
            </div>
        </a>
        <a href="projetos.php">
            <div class="resumo-item">
                <h3><?= $relatorio->qnt_projetos ?> <span>PROJETOS</span></h3>
                <i class="fa-solid fa-diagram-project"></i>
            </div>
        </a>
        <a href="doadores.php">
            <div class="resumo-item">
                <h3><?= $relatorio->qnt_usuarios ?> <span>DOADORES</span></h3>
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
                        <p>5 Solicitações</p>
                    </div>
                </a>
            </div>
            <div class="card-adm">
                <h4>ONGS</h4>
                <span>Aprove ou recuse cadastros de ONG’s novas no sistema.</span>
                <a href="solicitacao-ong.php">
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
                        <th>RESPONSAVEL</th>
                        <th>CRIADO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="#">0</td>
                        <td data-label="NOME">Ong Amigos</td>
                        <td data-label="PROJETOS">4</td>
                        <td data-label="RESPONSAVEL">Gean</td>
                        <td data-label="CRIADO">12/05/2025</td>
                        <td>
                            <!-- <form method="GET"> -->
                            <input type="hidden" name="id" value="">
                            <a href="../adm/ongs.php"> <button class="fa-solid fa-eye"></button></a>
                            <!-- </form> -->
                        </td>
                    </tr>
                    <tr>
                        <td data-label="#">1</td>
                        <td data-label="NOME">Associação Natureza</td>
                        <td data-label="PROJETOS">2</td>
                        <td data-label="RESPONSAVEL">Eduarda</td>
                        <td data-label="CRIADO">12/05/2025</td>
                        <td>
                            <!-- <form method="GET"> -->
                            <input type="hidden" name="id" value="">
                            <a href="../adm/ongs.php"> <button class="fa-solid fa-eye"></button></a>
                            <!-- </form> -->
                        </td>
                    </tr>
                    <tr>
                        <td data-label="#">2</td>
                        <td data-label="NOME">SOS Estados</td>
                        <td data-label="PROJETOS">6</td>
                        <td data-label="RESPONSAVEL">Carlos</td>
                        <td data-label="CRIADO">12/05/2025</td>
                        <td>
                            <!-- <form method="GET"> -->
                            <input type="hidden" name="id" value="">
                            <a href="../adm/ongs.php"> <button class="fa-solid fa-eye"></button></a>
                            <!-- </form> -->
                        </td>
                    </tr>
                </tbody>
            </table>
            <a class="btn-ver-mais" href="ongs.php">Ver Mais</a>
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
                        <td data-label="NOME">Educação para Todos</td>
                        <td data-label="ONG">Ong Amigos</td>
                        <td data-label="ARRECADADO">R$ 15.000</td>
                        <td data-label="CRIADO">12/05/2025</td>
                        <td>
                            <!-- <form method="GET"> -->
                            <input type="hidden" name="id" value="">
                            <a href="../adm/projetos.php"> <button class="fa-solid fa-eye"></button></a>
                            <!-- </form> -->
                        </td>
                    </tr>
                    <tr>
                        <td data-label="#">1</td>
                        <td data-label="NOME">Vida Sustentável</td>
                        <td data-label="ONG">Associação Natureza</td>
                        <td data-label="ARRECADADO">R$ 5.000</td>
                        <td data-label="CRIADO">12/05/2025</td>
                        <td>
                            <!-- <form method="GET"> -->
                            <input type="hidden" name="id" value="">
                            <a href="../adm/projetos.php"> <button class="fa-solid fa-eye"></button></a>
                            <!-- </form> -->
                        </td>
                    </tr>
                    <tr>
                        <td data-label="#">2</td>
                        <td data-label="NOME">Alimenta Comunidade</td>
                        <td data-label="ONG">SOS Estados</td>
                        <td data-label="ARRECADADO">R$ 500</td>
                        <td data-label="CRIADO">12/05/2025</td>
                        <td>
                            <!-- <form method="GET"> -->
                            <input type="hidden" name="id" value="">
                            <a href="../adm/projetos.php"> <button class="fa-solid fa-eye"></button></a>
                            <!-- </form> -->
                        </td>
                    </tr>
                </tbody>
            </table>
            <a class="btn-ver-mais" href="projetos.php">Ver Mais</a>
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
                            <!-- <form method="GET"> -->
                            <input type="hidden" name="id" value="">
                            <a href="../adm/doadores.php"> <button class="fa-solid fa-eye"></button></a>
                            <!-- </form> -->
                        </td>
                    </tr>
                    <tr>
                        <td data-label="#">1</td>
                        <td data-label="NOME">Eduarda</td>
                        <td data-label="EMAIL">joao@organizer.com</td>
                        <td data-label="DOAÇÕES">R$ 3.400</td>
                        <td data-label="CRIADO">01/01/2025</td>
                        <td>
                            <!-- <form method="GET"> -->
                            <input type="hidden" name="id" value="">
                            <a href="../adm/doadores.php"> <button class="fa-solid fa-eye"></button></a>
                            <!-- </form> -->
                        </td>
                    </tr>
                    <tr>
                        <td data-label="#">2</td>
                        <td data-label="NOME">Bruna</td>
                        <td data-label="EMAIL">bruna@organizer.com</td>
                        <td data-label="DOAÇÕES">R$ 20.000</td>
                        <td data-label="CRIADO">01/01/2025</td>
                        <td>
                            <!-- <form method="GET"> -->
                            <input type="hidden" name="id" value="">
                            <a href="../adm/doadores.php"> <button class="fa-solid fa-eye"></button></a>
                            <!-- </form> -->
                        </td>
                    </tr>
                </tbody>
            </table>
            <a class="btn-ver-mais" href="doadores.php">Ver Mais</a>
        </fieldset>
    </div>
</main>
<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
?>