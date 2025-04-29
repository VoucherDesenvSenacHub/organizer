<?php
$tituloPagina = 'Home | ADM';
$cssPagina = ['adm/novo-home.css'];
require_once '../../components/header-ong.php';
?>
<main class="container">
    <div id="title">
        <h1>BEM VINDO</h1>
        <p>PAINEL</p>
    </div>
    <div id="resumo">
        <div class="resumo-item">
            <h3>30 <span>ONGS</span></h3>
            <i class="fa-solid fa-house-flag"></i>
        </div>
        <div class="resumo-item">
            <h3>110 <span>PROJETOS</span></h3>
            <i class="fa-solid fa-diagram-project"></i>
        </div>
        <div class="resumo-item">
            <h3>400 <span>DOADORES</span></h3>
            <i class="fa-solid fa-users"></i>
        </div>
    </div>
    <div class="dashboard">
        <fieldset id="section-solicitacao">
            <legend><i class="fa-solid fa-bell"></i> SOLICITAÇÕES</legend>
            <div class="card-adm">
                <h4>EMPRESAS</h4>
                <span>Aprove ou recuse solicitações de parcerias de empresas.</span>
                <div><i class="fa-solid fa-handshake"></i>
                    <p>5 Solicitações</p>
                </div>
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
        </fieldset>
        <fieldset id="section-projeto">
            <legend><i class="fa-solid fa-diagram-project"></i> PROJETOS</legend>
        </fieldset>
        <fieldset id="section-doador">
            <legend><i class="fa-solid fa-users"></i> DOADORES</legend>
        </fieldset>
    </div>
</main>
<?php
$jsPagina = [];
require_once '../../components/footer.php';
?>