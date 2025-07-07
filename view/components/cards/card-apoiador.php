<div class="card-apoiador">
    <div class="foto">
        <!-- <img src="" alt=""> -->
        <?= mb_substr($apoiador->nome, 0, 1); ?>
    </div>
    <div class="dados">
        <h4><?= explode(' ', $apoiador->nome)[0] ?></h4>
        <p>Desde <?= date('d/m/Y', strtotime($apoiador->data_apoio)); ?></p>
    </div>
</div>