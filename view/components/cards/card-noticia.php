<?php

// Pegar os dados da Notícia e tratar possíveis erros

$IdNoticia = $noticia['noticia_id'] ?? null;
$TituloNoticia = $noticia['titulo'] ?? 'Titulo Da Matéria';
$TextoNoticia = (isset($noticia) && is_array($noticia) && isset($noticia['texto']))
    ? mb_strimwidth($noticia['texto'], 0, 150, '...')
    : 'Lorem ipsum...';
$NomeOng = $noticia['ong_nome'] ?? 'Nome da Ong';
$DataNoticia = $noticia['data_cadastro'] ?? '00/00/0000';

// Buscar a primeira imagem da notícia
$imagens = $noticiaModel->buscarImagensNoticia($IdNoticia);
$FotoNoticia = $imagens[0]['caminho'] ?? '../../assets/images/global/image-placeholder.svg';
?>


<div class="card-noticia">
    <a href="../noticia/perfil.php?id=<?= $IdNoticia ?>" class="card-noticia">
        <div class="textos">
            <h3><?= $TituloNoticia ?></h3>
            <p><?= $TextoNoticia ?></p>
            <div class="info">
                <p><i class="fa-solid fa-house-flag"></i> <?= $NomeOng ?></p>
                <p><i class="fa-regular fa-clock"></i> <?= date('d/m/Y', strtotime($DataNoticia)) ?></p>
            </div>
        </div>
        <div class="imagem-noticia">
            <img src="<?= $FotoNoticia ?>">
        </div>
    </a>
    <div class="acoes-noticia">
        <button title="Compartilhar" class="btn-share fa-solid fa-share-nodes" onclick="compartilhar('compartilhar-popup', <?= $IdNoticia ?>, 'noticia')"></button>
    </div>
</div>