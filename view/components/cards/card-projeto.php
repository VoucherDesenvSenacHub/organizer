<?php
$id = $projeto->projeto_id ?? 'Erro';
$class = $class ?? '';
$nome = $projeto->nome ?? 'Nome do Projeto';
$descricao =  mb_strimwidth($projeto->descricao, 0, 230, '...') ?? 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit, explicabo magni? Laboriosam possimus voluptas recusandae blanditiis architecto dolorem tenetur odio, nisi molestiae facere quia facilis officia cumque dicta impedit minima.';
$barra = $barra ?? '30';
$jaFavoritado = $jaFavoritado ?? false;
$classe = $jaFavoritado ? 'favoritado' : '';
$logo_url = $projeto->logo_url ?? '../../assets/images/global/image-placeholder.svg';
?>

<div class="card-projeto <?= $class ?>">
    <div class="acoes-projeto">
            <button class="btn-share fa-solid fa-share-nodes" onclick="compartilhar('compartilhar-popup', <?=$id?>, 'projeto')"></button>
        <?php if (!isset($_SESSION['usuario']['id'])): ?>
            <button title="Favoritar" class="btn-like fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
        <?php else: ?>
            <form action="../.././../controller/ProjetoController.php?acao=favoritar" method="POST">
                <input type="hidden" name="projeto-id-favorito" value="<?= $id ?>">
                <button title="Favoritar" class="btn-like fa-solid fa-heart <?= $classe ?>"></button>
            </form>
        <?php endif; ?>
    </div>
    <div class="img-projeto">
        <img src="<?= $logo_url ?>">
    </div>
    <div class="info-projeto">
        <h5><?= $nome ?></h5>
        <p><?= $descricao ?></p>
        <div class="barra-doacao">
            <span><?= $barra ?>%</span>
            <div class="barra">
                <div class="barra-verde" style="width: <?= $barra ?>%;"></div>
            </div>
        </div>
    </div>
    <a class="saiba-mais-projeto" href="../projeto/perfil.php?id=<?= $id ?>">Saiba Mais</a>
</div>