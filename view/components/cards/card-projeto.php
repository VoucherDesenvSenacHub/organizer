<div class="card-projeto <?= $class ?>">
    <div class="acoes-projeto">
        <button class="btn-share fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
        <button class="btn-like fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
    </div>
    <div class="img-projeto">250x130</div>
    <div class="info-projeto">
        <h5><?= $projeto->nome ?></h5>
        <p><?= $projeto->resumo ?></p>
        <div class="barra-doacao">
            <span><?= $barra ?>%</span>
            <div class="barra">
                <div class="barra-verde" style="width: <?= $barra ?>%;"></div>
            </div>
        </div>
    </div>
    <a class="saiba-mais-projeto" href="perfil-projeto.php?id=<?= $projeto->codproj ?>">Saiba Mais</a>
</div>