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
            <button class="btn" id="btn-doacao" onclick="abrir_popup('doacao-popup')"><i class="fa-solid fa-hand-holding-dollar"></i> Quero Doar</button>
            <button class="btn" id="btn-apoio" onclick="abrir_popup('apoiar-popup')"><?= $textoApoio ?> <?= $iconApoio ?></button>
        <?php break;
        case 'ong': if ( $PerfilProjeto['ong_id'] === $_SESSION['ong_id']): ?>
            <button class="btn" id="btn-editar" onclick="abrir_popup('editar-projeto-popup')"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
            <button class="btn" id="btn-concluir" onclick="abrir_popup('inativar-projeto-popup')"><img src="../../assets/images/icons/meta.png"> Finalizar</button>
        <?php endif; break;
        case 'adm': ?>
            <button class="btn adm-inativar" id="btn-concluir" onclick="abrir_popup('inativar-projeto-popup')"><img src="../../assets/images/icons/meta.png"> Finalizar</button>
        <?php break;
        default: ?>
            <button class="btn" id="btn-doacao" onclick="abrir_popup('login-obrigatorio-popup')"><i class="fa-solid fa-hand-holding-dollar"></i> Quero Doar</button>
            <button class="btn" id="btn-apoio" onclick="abrir_popup('login-obrigatorio-popup')">Quero Apoiar <i class="fa-solid fa-hand-holding-heart"></i></button>
    <?php endswitch; ?>
</div>