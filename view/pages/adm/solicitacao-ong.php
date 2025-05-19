<?php
$tituloPagina = 'Solicitação de ONGS';
$cssPagina = ['adm/home.css'];
require_once '../../components/header-adm.php';
?>
<main class="container">
    <h1>SOLICITAÇÃO DE ONGS</h1>
    <div class="dashboard">
        <fieldset id="section-ong">
            <!-- <legend><i class="fa-solid fa-house-flag"></i> SOLICITAÇÃO DE ONGS</legend> -->
            <table id="table-ong">
                <thead>
                    <tr>
                        <th>NOME</th>
                        <th>RESPONSÁVEL</th>
                        <th>DATA</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="NOME">Ong 1</td>
                        <td data-label="RESPONSÁVEL">João</td>
                        <td data-label="DATA">12/05/2025</td>
                        <td>
                            <form method="GET" action="validar-ong.php">
                                <input type="hidden" name="id" value="">
                                <button class="fa-solid fa-eye"></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="NOME">Ong 1</td>
                        <td data-label="RESPONSÁVEL">João</td>
                        <td data-label="DATA">12/05/2025</td>
                        <td>
                            <form method="GET" action="validar-ong.php">
                                <input type="hidden" name="id" value="">
                                <button class="fa-solid fa-eye"></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="NOME">Ong 1</td>
                        <td data-label="RESPONSÁVEL">João</td>
                        <td data-label="DATA">12/05/2025</td>
                        <td>
                            <form method="GET" action="validar-ong.php">
                                <input type="hidden" name="id" value="">
                                <button class="fa-solid fa-eye"></button>
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