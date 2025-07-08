<?php
$perfil = $_SESSION['perfil_usuario'] ?? 'visitante';
$textoApoio = $jaApoiou ? 'Apoiando' : 'Quero Apoiar';
$iconApoio = $jaApoiou ? '<i class="fa-solid fa-heart-circle-check"></i>' : '<i class="fa-solid fa-hand-holding-heart"></i>';
?>

<div id="acoes">
    <?php if ($perfil === 'doador'): ?>
        <button class="btn" id="btn-doacao" onclick="abrir_popup('doacao-popup')"><i class="fa-solid fa-hand-holding-dollar"></i> Quero Doar</button>
        <button class="btn" id="btn-apoio" onclick="abrir_popup('apoiar-popup')"><?= $textoApoio ?> <?= $iconApoio ?></button>
    <?php elseif ($perfil === 'ong'): ?>
        <button class="btn" id="btn-editar" onclick="abrir_popup('editar-projeto-popup')">
            <i class="fa-solid fa-pen-to-square"></i> Editar
        </button>
        <button class="btn" id="btn-inativar" onclick="abrir_popup('inativar-projeto-popup')">
            <i class="fa-solid fa-ban"></i> Inativar
        </button>
    <?php elseif ($perfil === 'adm'): ?>
        <!-- <button class="btn" id="btn-editar" onclick="abrir_popup('editar-projeto-popup')">
            <i class="fa-solid fa-pen-to-square"></i> Editar
        </button> -->
        <button class="btn adm-inativar" id="btn-inativar" onclick="abrir_popup('inativar-projeto-popup')">
            <i class="fa-solid fa-ban"></i> Inativar
        </button>
    <?php else: ?>
        <button class="btn" id="btn-doacao" onclick="abrir_popup('login-obrigatorio-popup')"><i class="fa-solid fa-hand-holding-dollar"></i> Quero Doar</button>
        <button class="btn" id="btn-apoio" onclick="abrir_popup('login-obrigatorio-popup')">Quero Apoiar <i class="fa-solid fa-hand-holding-heart"></i></button>
    <?php endif; ?>
</div>