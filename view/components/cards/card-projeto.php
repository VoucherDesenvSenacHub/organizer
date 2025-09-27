<?php
// Pegar os dados do Projeto e tratar possíveis erros
$IdProjeto = $projeto['projeto_id'] ?? null;
$NomeProjeto = $projeto['nome'] ?? 'Nome do Projeto';
$DescricaoProjeto =  mb_strimwidth($projeto['descricao'], 0, 220, '...') ?? 'Lorem ipsum...';
$StatusProjeto = $projeto['status'] ?? 'ATIVO';
$CategoriaProjeto = $projeto['categoria'] ?? 'Indefinido';
$CorCategoria = $projeto['cor'] ?? '#9E9E9E';
$BarraProjeto = $projeto['barra'] ?? '30';
$FotoProjeto = $projeto['caminho']
    ? '../../../' . $projeto['caminho']
    : '../../assets/images/global/image-placeholder.svg';
// Verificar se o Doador favoritou o Projeto
$jaFavoritado = in_array($IdProjeto, $projetosFavoritos ?? []) ?? false;
$classe = $jaFavoritado ? 'favorito' : '';
?>

<div class="card-projeto">
    <span class="categoria" style="background-color: <?= $CorCategoria ?>;"><?= $CategoriaProjeto ?></span>
    <?php if ($StatusProjeto == 'INATIVO'): ?>
        <span class="status inativo">Inativo <i class="fa-solid fa-ban"></i></span>
    <?php elseif ($StatusProjeto == 'FINALIZADO'): ?>
        <span class="status finalizado">Finalizado <img src="../../assets/images/icons/meta.png"></span>
    <?php endif; ?>
    <div class="acoes-projeto">
        <button title="Compartilhar" class="btn-share fa-solid fa-share-nodes" onclick="compartilhar('compartilhar-popup', <?= $IdProjeto ?>, 'projeto')"></button>
        <?php if (!isset($_SESSION['usuario']['id'])): ?>
            <button title="Favoritar" class="btn-like fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
        <?php elseif (!isset($_SESSION['perfil_usuario']) || $_SESSION['perfil_usuario'] === 'doador'): ?>
            <button data-id="<?= $IdProjeto ?>" data-tipo="projeto" title="Favoritar" class="btn-like fa-solid fa-heart <?= $classe ?>"></button>
        <?php endif; ?>
    </div>
    <div class="img-projeto">
        <img src="<?= $FotoProjeto ?>">
    </div>
    <div class="info-projeto">
        <h5><?= $NomeProjeto ?></h5>
        <p><?= $DescricaoProjeto ?></p>
        <div class="barra-doacao">
            <span><?= $BarraProjeto ?>%</span>
            <div class="barra">
                <div class="barra-verde" style="width: <?= $BarraProjeto ?>%;"></div>
            </div>
        </div>
    </div>
    <a class="saiba-mais-projeto" href="../projeto/perfil.php?id=<?= $IdProjeto ?>">Saiba Mais</a>
</div>