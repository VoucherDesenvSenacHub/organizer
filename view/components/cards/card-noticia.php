<?php
$id = $noticia['noticia_id'];
$titulo = $noticia['titulo'] ?? 'Titulo Da Matéria';
$texto = mb_strimwidth($noticia['texto'], 0, 150, '...') ?? 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit, explicabo magni? Laboriosam possimus voluptas recusandae blanditiis architecto dolorem tenetur odio, nisi molestiae facere quia facilis officia cumque dicta impedit minima.';
$ong_nome = $noticia['nome'] ?? 'Ong Tal';
$data = date('d/m/Y', strtotime($noticia['data_cadastro'])) ?? '01/01/2025';
$logo_url = $noticia['logo_url'] ?? '../../assets/images/global/image-placeholder.svg';

?>
<div class="card-noticia">
    <a href="../noticia/perfil.php?id=<?= $id ?>" class="card-noticia">
        <div class="textos">
            <h3><?= $titulo ?></h3>
            <p><?= $texto ?></p>
            <div class="info">
                <p><i class="fa-solid fa-house-flag"></i> <?= $ong_nome ?></p>
                <p><i class="fa-regular fa-clock"></i> <?= $data ?></p>
            </div>
        </div>
        <div class="imagem-noticia">
            <img src="<?= $logo_url ?>">
        </div>
    </a>
    <div class="acoes-noticia">
        <button class="btn-share fa-solid fa-share-nodes"
            onclick="compartilhar('compartilhar-popup', <?= $id ?>, 'noticia')"></button>
    </div>
</div>