<?php
$acesso = 'doador';
$tituloPagina = 'Home - Doador';
$cssPagina = ['doador/home.css'];
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';

// Pegar os dados do Doador
$doadorModel = new DoadorModel();
$IdDoador = $_SESSION['usuario']['id'];
$relatorio = $doadorModel->RelatorioHome($IdDoador);
$UltimasAtividades = $doadorModel->ultimasAtividadesDoador($IdDoador);

$projetoModel = new ProjetoModel();
$lista = $projetoModel->listarCardsProjetos(['recentes' => true, 'limit' => 4, 'status' => ['ATIVO']]);
$projetosFavoritos = $projetoModel->listarFavoritos($IdDoador);
?>

<main class="conteudo-principal">
    <section>
        <div id="cabecalho">
            <h1>Olá, <?= implode(' ', array_slice(explode(' ', trim($usuario['nome'])), 0, 2)) ?>.</h1>
            <p>Seja bem-vindo à sua área de doador.</p>
            <div id="info-doacao">
                <a class="item-info" href="doacoes.php">
                    <h3>
                        R$ <?= number_format($relatorio['qnt_doacoes'] ?? 0, 0, ',', '.'); ?> <span>MINHAS DOAÇÕES</span></h3>
                    <i class="fa-solid fa-coins"></i>
                </a>
            </div>
        </div>
        <?php if ($UltimasAtividades): ?>
            <div class="container-cards">
                <h4>SUAS ATIVIDADES RECENTES</h4>
                <div class="box-cards">
                    <?php foreach ($UltimasAtividades as $atividade) {
                        require '../../components/cards/card-atividades-doador.php';
                    } ?>
                </div>
            </div>
        <?php endif ?>
        <div class="container-cards">
            <h4>PROJETOS RECENTES</h4>
            <div class="box-cards">
                <?php foreach ($lista as $projeto) {
                    require '../../components/cards/card-projeto.php';
                } ?>
            </div>
        </div>
    </section>
</main>
<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
?>