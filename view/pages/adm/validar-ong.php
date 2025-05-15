<?php
$tituloPagina = 'Solicitação de ONGS';
$cssPagina = ['adm/validar-ong.css'];
require_once '../../components/header-adm.php';
?>
<main class="container">
    <h1>DADOS DA ONG: {NOME}</h1>
    <div class="dados-ong">
        <fieldset>
            <legend>DADOS DA ONG</legend>
            <div class="form">
                <label><span>Nome</span><input type="text"></label>
                <label><span>Nome</span><input type="text"></label>
                <label><span>Nome</span><input type="text"></label>
                <label><span>Nome</span><input type="text"></label>
            </div>
        </fieldset>
        <fieldset>
            <legend>DADOS DE ENDEREÇO</legend>
        </fieldset>
        <fieldset>
            <legend>DADOS BANCÁRIOS</legend>
        </fieldset>
        <fieldset>
            <legend>RESPONSÁVEL</legend>
        </fieldset>
    </div>
</main>
<?php
$jsPagina = [];
require_once '../../components/footer.php';
?>