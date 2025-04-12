<?php
require_once __DIR__ . "\..\..\..\model\ProjetoModel.php";
require '../../components/cards/card-projeto.php';

$projetoModel = new Projeto();
$lista = $projetoModel->listar();

$tituloPagina = 'Projetos';
$cssPagina = ['ong/projetos.css'];
require_once '../../components/header-ong.php';
?>

<div id="principal">
    <div class="header-principal">
        <div>
            <h1>PROJETOS DA SUA ONG</h1>
        </div>
        <div class="div-input-lupa">
            <input class="input-buscar-projetos" type="text" id="buscar" placeholder="Buscar"><br>
            <img class="lupa-input" src="../../assets/images/lupa-cinza.png" alt="">
        </div>
        <div>
            <button class="botao-novo-projeto" onclick="abrir_popup('editar-projeto-popup')">NOVO PROJETO</button>
        </div>
    </div>

    <!-- cards -->
    <div class="div-card-geral">
        <?php foreach ($lista as $i) { ?>
            <?= mostrarCardProjeto($i->codproj, $i->nome, $i->resumo, 'ong') ?>
        <?php } ?>
    </div>
</div>

<!-- POPUP DE NOVO PROJETO -->
<div class="popup-fundo" id="editar-projeto-popup">
    <div class="container-popup">
        <button id="x-fechar" class="fa-solid fa-xmark" onclick="fechar_popup('editar-projeto-popup')"></button>
        <form action="perfil-projeto.php">
            <div class="box-edit">
                <h1>NOVO PROJETO</h1>
                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Nome<span>*</span></label>
                        <input id="nome" type="text" maxlength="45" required>
                    </div>
                    <div class="input-box">
                        <label for="meta">Meta de Doação<span>*</span></label>
                        <input id="meta" type="number" placeholder="R$" required>
                    </div>
                </div>
                <div class="input-box">
                    <label for="descricao">Sobre<span>*</span></label>
                    <textarea name="descricao" id="descricao" rows="6" required></textarea>
                </div>
            </div>
            <div class="box-edit">
                <div class="input-box">
                    <div class="qt-img">
                        <label for="fotos">Upload de Fotos<span>*</span></label>
                        <p id="qt-img">0/5</p>
                    </div>
                    <input id="fotos" type="file" name="fotos[]" multiple required>
                </div>
                <button class="btn">CRIAR PROJETO <i class="fa-solid fa-floppy-disk"></i></button>
            </div>
        </form>
    </div>
</div>


<!-- tela confirmação de projeto criado -->
<div class="tela-confirma-criacao" id="tela-confirma-criacao">
    <div class="card-confirma-criacao">
        <div class="div-projeto-criado">
            <h2 class="titulo-projeto-criado">Projeto Criado</h2>
            <img class="img-check" src="../../assets/images/Check.png" alt="">
        </div>
        <button href="perfil-projeto.php" class="btn-card">Visualizar</button>
    </div>
</div>

<?php
$jsPagina = ['projetos-ong.js'];
require_once '../../components/footer.php';
?>