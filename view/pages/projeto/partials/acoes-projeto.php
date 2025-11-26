<?php
$perfil = $_SESSION['perfil_usuario'] ?? 'visitante';

// Para o doador - Botão de Apoiar ou Desapoiar
if (isset($jaApoiou)) {
    $textoApoio = $jaApoiou ? 'Apoiando' : 'Quero Apoiar';
    $iconApoio = $jaApoiou ? '<i class="fa-solid fa-heart-circle-check"></i>' : '<i class="fa-solid fa-hand-holding-heart"></i>';
}
?>

<div id="acoes">
    <?php switch ($perfil):
        case 'doador': ?>
            <?php if ($PerfilProjeto['status'] === 'ATIVO'): ?>
                <button class="btn" id="btn-doacao" onclick="abrir_popup('doacao-popup')"><i class="fa-solid fa-hand-holding-dollar"></i> Quero Doar</button>
            <?php endif; ?>
            <?php if ($PerfilProjeto['status'] <> 'INATIVO'): ?>
                <button class="btn" id="btn-apoio" onclick="abrir_popup('apoiar-popup')"><?= $textoApoio ?> <?= $iconApoio ?></button>
            <?php endif; ?>
            <?php break;
        case 'ong':
            if ($PerfilProjeto['ong_id'] === $_SESSION['ong_id'] && $PerfilProjeto['status'] === 'ATIVO'): ?>
                <button class="btn" id="btn-editar" onclick="abrir_popup('editar-projeto-popup')"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                <button class="btn" id="btn-finalizar" onclick="abrir_popup('finalizar-projeto-popup')"><img src="../../assets/images/icons/meta.png"> Finalizar</button>
            <?php endif;
            break;
        case 'adm': ?>
            <?php if ($PerfilProjeto['status'] !== 'INATIVO'): ?>
                <button class="btn adm-inativar" id="btn-inativar" onclick="abrir_popup('inativar-projeto-popup')"><i class="fa-solid fa-ban"></i> Inativar</button>
            <?php endif; ?>
        <?php break;
        default: ?>
            <button class="btn" id="btn-doacao" onclick="abrir_popup('login-obrigatorio-popup')"><i class="fa-solid fa-hand-holding-dollar"></i> Quero Doar</button>
            <button class="btn" id="btn-apoio" onclick="abrir_popup('login-obrigatorio-popup')">Quero Apoiar <i class="fa-solid fa-hand-holding-heart"></i></button>
    <?php endswitch; ?>
</div>