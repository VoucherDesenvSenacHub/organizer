<div class="card-doador">
    <div class="perfil">
        <div class="foto">
            <!-- <img src="" alt=""> -->
            <?= mb_substr($doador->nome, 0, 1);?>
        </div>
        <h4><?= explode(' ', $doador->nome)[0] ?></h4>
    </div>
    <p>R$ <?= number_format($doador->valor_doado, 0, ',', '.'); ?></p>
</div>