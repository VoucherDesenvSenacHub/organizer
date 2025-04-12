<?php
//CONFIGURAÇÕES DA PÁGINA
$tituloPagina = 'Projetos';
$cssPagina = ['ong/projetos.css'];
require_once __DIR__ . '/../../components/header-ong.php';

//IMPORTS
require_once __DIR__ . '/../../../model/ProjetoModel.php';
require_once __DIR__ . '/../../components/cards/card-projeto.php';
require_once __DIR__ . '/../../components/formulario-projeto.php';

//CARREGA CARDS DE PROJETOS
$projetoModel = new Projeto();
$lista = $projetoModel->listar();
?>

<!--FORMULÁRIO DE CRIAÇÃO DE PROJETO (popup)-->
<?= exibirFormularioProjeto('', '', '', '', '') ?>

<div id="toast-projeto" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    Projeto Criado com Sucesso!
</div>
<div id="toast-projeto-erro" class="toast erro">
    <i class="fa-solid fa-triangle-exclamation"></i>
    Falha ao Criar Projeto!
</div>

<!--CONTEÚDO PRINCIPAL DA PÁGINA-->
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

    <!-- CARDS DE PROJETOS -->
    <div class="div-card-geral">
        <?php foreach ($lista as $i): ?>
            <?= mostrarCardProjeto($i->codproj, $i->nome, $i->resumo, 'ong') ?>
        <?php endforeach; ?>
    </div>
</div>

<?php
$jsPagina = ['projetos-ong.js'];
require_once __DIR__ . '/../../components/footer.php';
?>