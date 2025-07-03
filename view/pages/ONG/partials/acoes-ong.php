<?php
$perfil = $_SESSION['perfil_usuario'] ?? 'visitante';
?>

<div id="acoes">
    <?php if ($perfil === 'doador'): ?>
        <button class="btn" id="btn-voluntario" onclick="abrir_popup('ser-voluntario-popup')">Apoiar esta ONG</button>
    <?php elseif ($perfil === 'ong'): ?>
        <a href="meu-perfil.php">
            <button class="btn" id="btn-editar">
                <i class="fa-solid fa-pen-to-square"></i> Editar
            </button>
        </a>
        <button class="btn" id="btn-inativar">
            <i class="fa-solid fa-trash-can"></i> Inativar
        </button>
    <?php elseif ($perfil === 'adm'): ?>
        <!-- <button class="btn" onclick="abrir_popup('#')">Gerenciar Projeto</button> -->
        <button class="btn" id="btn-editar" onclick="abrir_popup('editar-projeto-popup')">
            <i class="fa-solid fa-pen-to-square"></i> Editar
        </button>
        <button class="btn" id="btn-inativar" onclick="abrir_popup('inativar-projeto-popup')">
            <i class="fa-solid fa-trash-can"></i> Inativar
        </button>
    <?php else: ?>
        <button class="btn" id="btn-voluntario" onclick="abrir_popup('login-obrigatorio-popup')">Apoiar esta ONG</button>
    <?php endif; ?>
</div>