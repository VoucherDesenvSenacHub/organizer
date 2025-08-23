<?php if ($teste['projeto_id']) :?>
    <div class="card-acoes">
        <div class="icon tp-doacao">
            <img src="../../assets/images/icons/icon-projeto.png">
        </div>
        <div class="acoes-text">
            <h4>Projeto Criado</h4>
            <p>Você criou o projeto <?= $teste['nome'] ?></p>
            <span><?= $teste['p_data'] ?></span>
        </div>
    </div>
<?php elseif ($teste['noticia_id']) : ?>
    <div class="card-acoes">
        <div class="icon tp-noticia">
            <img src="../../assets/images/icons/icon-noticia.png">
        </div>
        <div class="acoes-text">
            <h4>Notícia Publicada</h4>
            <p>Você publicou a notícia “<?= $teste['titulo'] ?>"</p>
            <span><?= $teste['n_data'] ?></span>
        </div>
    </div>
<?php endif; ?>