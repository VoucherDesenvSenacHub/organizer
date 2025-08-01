<?php
$id = $ong->ong_id ?? 'Erro';
$class = $class ?? '';
$nome = $ong->nome ?? 'Nome da ONG';
$descricao =  mb_strimwidth($ong->descricao, 0, 215, '...') ?? 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis cumque minus nobis, ipsum delectus!';
$total_doacoes = $ong->total_doacoes ?? '?';
$total_projetos = $ong->total_projetos ?? '?';
$jaFavoritada = $jaFavoritada ?? false;
$classe = $jaFavoritada ? 'favoritado' : '';
$logo_url = $ong->logo_url ?? '../../assets/images/global/image-placeholder.svg';
?>

<div class="card-ong <?= $class ?>">
    <div class="perfil">
        <div class="logo">
            <img src="<?= $logo_url ?>">
        </div>
        <div class="nome">
            <h2><?= $nome ?></h2>
        </div>
    </div>
    <div class="meio">
        <div class="descricao">
            <p><?= $descricao ?></p>
        </div>
        <div class="doacao">
            <p><span><?= $total_projetos ?> </span>Projetos</p>
            <p><span><?= $total_doacoes ?> </span>Doações</p>
        </div>
    </div>
    <div class="acoes-ong">
        <a href="../ong/perfil.php?id=<?= $ong->ong_id ?>" class="saiba-mais-ong">Saiba Mais</a>
        <div class="btn-salvar">
            <button title="Compartilhar" id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
            <?php if (!isset($_SESSION['usuario']['id'])): ?>
                <button title="Favoritar" id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
            <?php else: ?>
                <form action="../.././../controller/OngController.php?acao=favoritar" method="POST">
                    <input type="hidden" name="ong-id-favorito" value="<?= $id ?>">
                    <button title="Favoritar" id="like" class="fa-solid fa-heart <?= $classe ?>"></button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>