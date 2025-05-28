<?php
$tituloPagina = 'Solicitação de Inativação de Projeto | ONG';
$cssPagina = ['adm/inativacao-projeto-ong.css'];
require_once '../../components/header-adm.php';
?>

<!-- POP-UP 1: Confirmação -->
<div class="block-popup">
    <div id="ipopup">
        <div class="msg">
            <h1>Deseja inativar o projeto?</h1>
            <div class="block-buttons">
                <button type="button" onclick="blockpopup2()" class="btn-sim">SIM</button>
                <button type="button" id="btn-nao" class="btn-nao">NÃO</button>
            </div>
        </div>
    </div>
</div>

<!-- POP-UP 2: Sucesso -->
<div id="block-popup2">
    <div id="ipopup">
        <div class="msg">
            <h1>PROJETO DA ONG INATIVADO COM SUCESSO!</h1>
            <span class="material-symbols-outlined">check</span>
        </div>
    </div>
</div>

<main class="container">
    <h1>SOLICITAÇÃO DE INATIVAÇÃO PROJETO ONG</h1>
    <div class="box-cards">

        <!-- Projeto 1 -->
        <div class="card-solicitacao">
            <div class="nome">
                <h3>Projeto</h3>
                <small>Responsavel</small>
            </div>
            <small class="cnpj">12/05/2025</small>
            <form onsubmit="event.preventDefault();">
                <input type="hidden" name="id" value="101">
                <button type="button" onclick="blockpopup()" class="btn-inativar">Inativar</button>
            </form>
        </div>

        <!-- Projeto 2 -->
        <div class="card-solicitacao">
            <div class="nome">
                <h3>Projeto</h3>
                <small>Responsavel</small>
            </div>
            <small>12/05/2025</small>
            <form onsubmit="event.preventDefault();">
                <input type="hidden" name="id" value="102">
                <button type="button" onclick="blockpopup()" class="btn-inativar">Inativar</button>
            </form>
        </div>
        <div class="card-solicitacao">
            <div class="nome">
                <h3>Projeto</h3>
                <small>Responsavel</small>
            </div>
            <small class="cnpj">12/05/2025</small>
            <form onsubmit="event.preventDefault();">
                <input type="hidden" name="id" value="101">
                <button type="button" onclick="blockpopup()" class="btn-inativar">Inativar</button>
            </form>
        </div>

        <div class="card-solicitacao">
            <div class="nome">
                <h3>Projeto</h3>
                <small>Responsavel</small>
            </div>
            <small class="cnpj">12/05/2025</small>
            <form onsubmit="event.preventDefault();">
                <input type="hidden" name="id" value="101">
                <button type="button" onclick="blockpopup()" class="btn-inativar">Inativar</button>
            </form>
        </div>

        <div class="card-solicitacao">
            <div class="nome">
                <h3>Projeto</h3>
                <small>Responsavel</small>
            </div>
            <small class="cnpj">12/05/2025</small>
            <form onsubmit="event.preventDefault();">
                <input type="hidden" name="id" value="101">
                <button type="button" onclick="blockpopup()" class="btn-inativar">Inativar</button>
            </form>
        </div>

    </div>
</main>
<?php
$jsPagina = ['inativar-projeto-ong.js'];
require_once '../../components/footer.php';
?>
