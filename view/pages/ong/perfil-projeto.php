<?php
    //CONFIGURAÇÕES DA PÁGINA
    $tituloPagina = 'Perfil do Projeto | Organizer';
    $cssPagina = ['ong/perfil-projeto.css'];
    require_once '../../components/header-ong.php';

    //IMPORTS
    require_once __DIR__ . '/../../../model/ProjetoModel.php';
    $projetoModel = new Projeto();

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $projeto = $projetoModel->buscarId($id);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $nome= $_POST['nome'];
        $resumo= $_POST['resumo'];
        $sobre = $_POST['sobre'];
        $meta = $_POST['meta'];
        if ($id){
            $projetoModel->editar($id, $nome, $resumo, $sobre, $meta);
        } else {
            $projetoModel->criar($nome, $resumo, $sobre, $meta);
        }
        
    } 
    
    require_once '../../components/popup/formulario-projeto.php';
    require_once '../../components/popup/inativar-projeto.php';

    //FORMULÁRIO PARA EDITAR PROJETO (popup)
    echo exibirFormularioProjeto(
        $id,
        $projeto->nome,
        $projeto->sobre,
        $projeto->meta,
        $projeto->resumo
    );
?>

<div id="toast-projeto" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    Projeto salvo com Sucesso!
</div>
<div id="toast-projeto-erro" class="toast erro">
    <i class="fa-solid fa-triangle-exclamation"></i>
    Falha ao salvar Projeto!
</div>

<main>
    <div class="container" id="container-principal">
        <section id="apresentacao" class="container-section">
            <div id="dados-projeto">
                <h1><?= $projeto->nome ?></h1>
                <div id="valor-arrecadado">
                    <h3>Arrecadado: <span>R$ 30.000</span></h3> <!-- Valor fictício -->
                    <div class="barra-doacao">
                        <div class="barra">
                            <div class="barra-verde"></div>
                        </div>
                    </div>
                </div>
                <div id="progresso">
                    <p>Meta: <span>R$ <?= number_format($projeto->meta, 0, ',', '.'); ?></span></p>
                    <p>Status: Em progresso <span>(30% alcançado)</span></p> <!-- Valor fictício -->
                    <p><span>24</span> Doações Recebidas</p> <!-- Valor fictício -->
                </div>
                <div id="acoes">
                    <button class="btn" id="btn-editar" onclick="abrir_popup('editar-projeto-popup')">
                        <i class="fa-solid fa-pen-to-square"></i> Editar
                    </button>
                    <button class="btn" id="btn-inativar" onclick="abrir_popup('inativar-projeto-popup')">
                        <i class="fa-solid fa-trash-can"></i> Inativar
                    </button>
                </div>
            </div>
            <div id="imagem-ilustrativa">
                <img src="../../assets/images/pages/perfil-projeto.png" alt="">
            </div>
            <div id="carousel" class="carousel">
                <div id="carousel-imgs" class="carousel-imgs">
                    <img src="https://placeholder.pagebee.io/api/plain/400/250" class="carousel-item">
                    <img src="https://placeholder.pagebee.io/api/plain/400/250" class="carousel-item">
                    <img src="https://placeholder.pagebee.io/api/plain/400/250" class="carousel-item">
                </div>
                <div class="btn-salvar">
                    <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                    <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                </div>
            </div>
        </section>

        <!-- Popup para imagens em tamanho grande -->
        <div class="popup-fundo" id="carousel-popup">
            <div class="container-popup">
                <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('carousel-popup')"></button>
                <div id="carousel-big" class="carousel">
                    <div id="carousel-big-imgs" class="carousel-imgs">
                        <img src="https://placeholder.pagebee.io/api/plain/600/375" class="carousel-item-big">
                        <img src="https://placeholder.pagebee.io/api/plain/600/375" class="carousel-item-big">
                        <img src="https://placeholder.pagebee.io/api/plain/600/375" class="carousel-item-big">
                    </div>
                    <!-- <div class="btn-salvar">
                        <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                        <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- Painel de abas: sobre, doadores, voluntários -->
        <section id="painel-projeto" class="container-section">
            <div id="btns-group">
                <div class="icon-title active">
                    <img src="../../assets/images/pages/icone-sobre.png" alt="">
                    <h3>Sobre</h3>
                </div>
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-doacao.png" alt="">
                    <h3>Doadores</h3>
                </div>
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-abraco.png" alt="">
                    <h3>Voluntários</h3>
                </div>
            </div>

            <div id="principal-painel">
                <div id="control-painel">
                    <div class="container-painel active">
                        <span id="data-criacao">Projeto criado em: <?= date('d/m/Y', strtotime($projeto->data)); ?></span>
                        <p><?= $projeto->sobre ?></p>
                    </div>

                    <div class="container-painel area-doador-voluntario">
                        <h3>DOADORES DESTE PROJETO</h3>
                        <div class="box-cards">
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                        </div>
                    </div>

                    <div class="container-painel area-doador-voluntario">
                        <h3>VOLUNTÁRIOS DESTE PROJETO</h3>
                        <div class="box-cards">
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
    $jsPagina = ['perfil-projeto.js'];
    require_once '../../components/footer.php';
?>
