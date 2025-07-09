<?php
$acesso = 'adm';
$tituloPagina = 'Solicitação | Organizer';
$cssPagina = ['adm/solicitacoes.css'];
require_once '../../components/layout/base-inicio.php';
?>
<main class="container">
    <h1><i class="fa-solid fa-house-flag"></i> SOLICITAÇÃO DE ONGS</h1>
    <div class="box-cards">
        <div class="card-solicitacao">
            <div class="nome">
                <h3>Nome da ONG</h3>
                <small>Responsável</small>
            </div>
            <small class="cnpj" >12/05/2025</small>
            <form action="validar-ong.php" method="GET">
                <input type="hidden" name="id">
                <button class="fa-solid fa-eye"></button>
            </form>
        </div>
        <div class="card-solicitacao">
            <div class="nome">
                <h3>Nome da ONG</h3>
                <small>Responsável</small>
            </div>
            <small>12/05/2025</small>
            <form action="validar-ong.php" method="GET">
                <input type="hidden" name="id">
                <button class="fa-solid fa-eye"></button>
            </form>
        </div>
        <div class="card-solicitacao">
            <div class="nome">
                <h3>Nome da ONG</h3>
                <small>Responsável</small>
            </div>
            <small>12/05/2025</small>
            <form action="validar-ong.php" method="GET">
                <input type="hidden" name="id">
                <button class="fa-solid fa-eye"></button>
            </form>
        </div>
    </div>
</main>
<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
?>