<?php
$acesso = 'adm';
$tituloPagina = 'Validar | Organizer';
$cssPagina = ['adm/validar-ong.css'];
require_once '../../components/layout/base-inicio.php';
?>
<main class="container">
    <h1>SOLICITAÇÃO DA ONG: {NOME}</h1>
    <div class="dados-ong">
        <fieldset>
            <legend><i class="fa-solid fa-house-flag"></i> DADOS DA ONG</legend>
            <div class="form">
                <label><span>Nome da ONG</span><input type="text"></label>
                <label><span>CPNJ</span><input type="text"></label>
                <label><span>Telefone</span><input type="text"></label>
                <label><span>Email</span><input type="text"></label>
            </div>
            <div class="form form-descricao">
                <label><span>Descrição</span><textarea></textarea></label>
                <div class="checkbox">
                    <span>Áreas de Atuação</span>
                    <small><input type="checkbox">Saúde</small>
                    <small><input type="checkbox">Esporte</small>
                    <small><input type="checkbox">Meio Ambiente</small>
                    <small><input type="checkbox">Tecnologia</small>
                    <small><input type="checkbox">Educação</small>
                    <small><input type="checkbox">Cultura</small>
                    <small><input type="checkbox">Proteção Animal</small>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend><i class="fa-solid fa-location-dot"></i> DADOS DE ENDEREÇO</legend>
            <div class="form">
                <label><span>CEP</span><input type="text"></label>
                <label><span>Rua</span><input type="text"></label>
                <label><span>Bairro</span><input type="text"></label>
                <label><span>Cidade</span><input type="text"></label>
            </div>
        </fieldset>
        <fieldset>
            <legend><i class="fa-solid fa-building-columns"></i> DADOS BANCÁRIOS</legend>
            <div class="form">
                <label><span>Banco</span><input type="text"></label>
                <label><span>Agência</span><input type="text"></label>
                <label><span>Número da conta</span><input type="text"></label>
                <label><span>Tipo de Conta</span><input type="text"></label>
            </div>
        </fieldset>
        <fieldset>
            <legend><i class="fa-solid fa-user-shield"></i> RESPONSÁVEL</legend>
            <div class="form">
                <label><span>Nome</span><input type="text"></label>
                <label><span>CPF</span><input type="text"></label>
                <label><span>Telefone</span><input type="text"></label>
            </div>
        </fieldset>
        <div class="btn-acoes">
            <button class="btn">APROVAR <i class="fa-solid fa-thumbs-up"></i></button>
            <button class="btn">RECUSAR <i class="fa-solid fa-thumbs-down"></i></button>
        </div>
    </div>
</main>
<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
?>