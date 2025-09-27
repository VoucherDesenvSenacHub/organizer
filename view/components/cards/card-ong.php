<?php
// Pegar os dados da Ong e tratar possíveis erros
$IdOng = $ong['ong_id'] ?? null;
$FotoOng = $ong['caminho'] ?? '../../assets/images/global/image-placeholder.svg';
$NomeOng = $ong['nome'] ?? 'Nome da ONG';
$DescricaoOng =  mb_strimwidth($ong['descricao'], 0, 215, '...') ?? 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis cumque minus nobis, ipsum delectus!';
$DoacoesOng = $ong['total_doacoes'] ?? '?';
$ProjetosOng = $ong['total_projetos'] ?? '?';
// Verificar se o Doador favoritou a Ong
$jaFavoritada = $jaFavoritada ?? false;
$classe = $jaFavoritada ? 'favorito' : '';
?>

<div class="card-ong">
    <div class="perfil">
        <div class="logo">
            <img src="<?= $FotoOng ?>">
        </div>
        <div class="nome">
            <h2><?= $NomeOng ?></h2>
        </div>
    </div>
    <div class="meio">
        <div class="descricao">
            <p><?= $DescricaoOng ?></p>
        </div>
        <div class="doacao">
            <p><span><?= $ProjetosOng ?> </span>Projetos</p>
            <p><span><?= $DoacoesOng ?> </span>Doações</p>
        </div>
    </div>
    <div class="acoes-ong">
        <a href="../ong/perfil.php?id=<?= $IdOng ?>" class="saiba-mais-ong">Saiba Mais</a>
        <div class="btn-salvar">
            <button title="Compartilhar" class="btn-share fa-solid fa-share-nodes" onclick="compartilhar('compartilhar-popup',<?= $IdOng ?>, 'ong')"></button>
            <?php if (!isset($_SESSION['usuario']['id'])): ?>
                <button title="Favoritar" class="btn-like fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
            <?php elseif (!isset($_SESSION['perfil_usuario']) || $_SESSION['perfil_usuario'] === 'doador'): ?>
                <button data-id="<?= $IdOng ?>" data-tipo="ong" title="Favoritar" class="btn-like fa-solid fa-heart <?= $classe ?>"></button>
            <?php endif; ?>
        </div>
    </div>
</div>