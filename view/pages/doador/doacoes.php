<?php
$acesso = 'doador';
//CONFIGURAÇÕES DA PÁGINA
$tituloPagina = 'Doações | Organizer';
$cssPagina = ['doador/doacoes.css'];
require_once '../../components/layout/base-inicio.php';

require_once '../../../model/ProjetoModel.php';
$projetoModel = new Projeto();

$doacoes = $projetoModel->buscarDoacao($_SESSION['usuario']['id']);
?>
<section>
    <h1><i class="fa-solid fa-coins"></i> MINHAS DOAÇÕES</h1>
    <?php
    if (!$doacoes): ?>
        <div class="btn-doar">
            <h4>Você ainda não realizou nenhuma doação! <i class="fa-regular fa-face-frown"></i> </h4>
            <a href="../projeto/lista.php">
                <button class="btn"><i class="fa-solid fa-hand-holding-dollar"></i> Conhecer Projetos</button></a>
        </div>
    <?php else: ?>
        <div class="cards-container">
            <?php foreach ($doacoes as $doacao): ?>
                <div class="card-doacao">
                    <div class="img">
                        <?php if ($doacao['logo_url']): ?>
                            <img src="<?= $doacao['logo_url'] ?>">
                        <?php else: ?>
                            <img src='../../assets/images/global/image-placeholder.svg'>";
                        <?php endif; ?>
                    </div>
                    <div class="info">
                        <h4><a href="../projeto/perfil.php?id=<?= $doacao['projeto_id'] ?>"><?= $doacao['nome'] ?></a></h4>
                        <small><i class="fa-solid fa-sack-dollar"></i> R$ <?= number_format($doacao['valor'], 0, '', '.') ?></small>
                        <small><i class="fa-solid fa-calendar-days"></i> <?= date('d/m/Y', strtotime($doacao['data_doacao'])) ?></small>
                        <small><i class="fa-solid fa-clock"></i> <?= date('H:i', strtotime($doacao['data_doacao'])) ?></small>
                    </div>
                    <button class="btn"><i class="fa-solid fa-receipt"></i></button>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif ?>
</section>
<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
?>