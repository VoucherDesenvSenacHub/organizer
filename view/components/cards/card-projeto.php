<?php
// Pegar os dados do Projeto e tratar possíveis erros
$IdProjeto = $projeto['projeto_id'] ?? null;
$FotoProjeto = $projeto['caminho'] ?? '../../assets/images/global/image-placeholder.svg';
$NomeProjeto = $projeto['nome'] ?? 'Nome do Projeto';
$DescricaoProjeto =  mb_strimwidth($projeto['descricao'], 0, 220, '...') ?? 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit, explicabo magni? Laboriosam possimus voluptas recusandae blanditiis architecto dolorem tenetur odio, nisi molestiae facere quia facilis officia cumque dicta impedit minima.';
$BarraProjeto = $projeto['barra'] ?? '30';
$StatusProjeto = $projeto['status'] ?? 'ATIVO';
// Verificar se o Doador favoritou o Projeto
$jaFavoritado = in_array($projeto['projeto_id'], $projetosFavoritos ?? []) ?? false;
$classe = $jaFavoritado ? 'favoritado' : '';
?>

<div class="card-projeto">
    <div class="acoes-projeto">
        <button title="Compartilhar" class="btn-share fa-solid fa-share-nodes" onclick="compartilhar('compartilhar-popup', <?= $IdProjeto ?>, 'projeto')"></button>
        <?php if (!isset($_SESSION['usuario']['id'])): ?>
            <button title="Favoritar" class="btn-like fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
        <?php elseif (!isset($_SESSION['perfil_usuario']) || $_SESSION['perfil_usuario'] === 'doador'): ?>
            <form action="../.././../controller/Projeto/FavoritarProjetoController.php" method="POST">
                <input type="hidden" name="projeto-id" value="<?= $IdProjeto ?>">
                <button title="Favoritar" class="btn-like fa-solid fa-heart <?= $classe ?>"></button>
            </form>
        <?php endif; ?>
    </div>
    <div class="img-projeto">
        <img src="<?= $FotoProjeto ?>">
        <?php if ($StatusProjeto === 'INATIVO'): ?>
            <div class="badge-inativo">INATIVO</div>
        <?php elseif ($StatusProjeto === 'FINALIZADO'): ?>
            <div class="badge-finalizado">FINALIZADO</div>
        <?php endif; ?>
    </div>
    <div class="info-projeto">
        <h5><?= $NomeProjeto ?></h5>
        <p><?= $DescricaoProjeto ?></p>
        <div class="barra-doacao">
            <span><?= $BarraProjeto ?>%</span>
            <div class="barra">
                <div class="barra-verde" style="width: <?= $BarraProjeto ?>%;"></div>
            </div>
        </div>
    </div>
    <a class="saiba-mais-projeto" href="../projeto/perfil.php?id=<?= $IdProjeto ?>">Saiba Mais</a>
</div>