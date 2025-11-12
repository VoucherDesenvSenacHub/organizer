<?php
$acesso = 'doador';
//CONFIGURAÇÕES DA PÁGINA
$tituloPagina = 'Doações | Organizer';
$cssPagina = ['doador/doacoes.css'];
require_once '../../components/layout/base-inicio.php';

require_once '../../../model/ProjetoModel.php';
$projetoModel = new ProjetoModel();
$doacoes = $projetoModel->buscarDoacao($_SESSION['usuario']['id']);
?>
<main class="conteudo-principal">
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
                <?php foreach ($doacoes as $doacao): 
                    $idOngCard = $projetoModel->buscarIdOng($doacao['projeto_id']);
                    $ongProjeto = $projetoModel->buscarOngProjeto($idOngCard['ong_id']);
                    ?>
                    <div class="card-doacao">
                        <div class="img">
                            <?php if ($doacao['caminho']): ?>
                                <img src="../../../<?= $doacao['caminho'] ?>">
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
                        <form action="../../../controller/RelatorioController.php" method="POST">
                            <input type="hidden" name="id-ong" value="<?= $doacao['nome'] ?>">
                            <input type="hidden" name="relatorio" value="recibo">
                            <input type="hidden" name ="valor" value="R$ <?= number_format($doacao['valor'], 2, ',', '.') ?>">
                            <input type="hidden" name="data" value="<?= date('d/m/Y', strtotime($doacao['data_doacao'])) ?>">
                            <input type="hidden" name="projeto" value="<?= $doacao['nome'] ?>">
                            <input type="hidden" name="nome" value="<?= $usuario['nome'] ?>">
                            <input type="hidden" name="ong" value="<?= $ongProjeto['nome'] ?>">
                            <input type="hidden" name="cnpj" value="<?= $ongProjeto['cnpj'] ?>">
                            <input type="hidden" name="cidade" value="<?= $ongProjeto['cidade'] ?>">
                            <input type="hidden" name="estado" value="<?= $ongProjeto['estado'] ?>">
                            <button class="btn"><i class="fa-solid fa-receipt"></i></button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif ?>
    </section>
</main>
<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
?>