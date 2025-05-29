<?php 
$class = $class ?? '';
$nome = $projeto->nome ?? 'Nome do Projeto';
$descricao = $projeto->descricao ?? 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit, explicabo magni? Laboriosam possimus voluptas recusandae blanditiis architecto dolorem tenetur odio, nisi molestiae facere quia facilis officia cumque dicta impedit minima.';
$barra = $projeto->barra ?? '30';
?>

<div class="card-projeto <?= $class ?>">
    <div class="acoes-projeto">
        <button class="btn-share fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
        <button class="btn-like fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
    </div>
    <div class="img-projeto">250x130</div>
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
    <a class="saiba-mais-projeto" href="../projeto/perfil.php?id=<?= $projeto->projeto_id ?>">Saiba Mais</a>
</div>