<div class="card-projeto <?= $class ?>">
    <div class="acoes-projeto">
        <button class="btn-share fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
    </div>
    <div class="img-projeto">250x130</div>
    <div class="info-projeto">
        <h5><?= $projeto->nome ?></h5>
        <p><?= $projeto->resumo ?></p>
        <div class="barra-doacao">
            <span>30%</span>
            <div class="barra">
                <div class="barra-verde"></div>
            </div>
        </div>
    </div>
    <a class="saiba-mais-projeto" href="perfil-projeto.php?id=<?= $projeto->codproj ?>">Saiba Mais</a>
</div>