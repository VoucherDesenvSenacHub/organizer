<?php
$perfil = $_SESSION['perfil_usuario'] ?? 'visitante';
?>

<div id="acoes">
    <?php if ($perfil === 'doador'): ?>
        <button class="btn" id="btn-doacao" onclick="abrir_popup('doacao-popup')">Fazer uma doação</button>
        <button class="btn" id="btn-apoio">Apoiar Projeto</button>
    <?php elseif ($perfil === 'ong'): ?>
        <button class="btn" id="btn-editar" onclick="abrir_popup('editar-projeto-popup')">
            <i class="fa-solid fa-pen-to-square"></i> Editar
        </button>
        <button class="btn" id="btn-inativar" onclick="abrir_popup('inativar-projeto-popup')">
            <i class="fa-solid fa-trash-can"></i> Inativar
        </button>
    <?php elseif ($perfil === 'adm'): ?>
        <button class="btn" onclick="abrir_popup('#')">Gerenciar Projeto</button>
        <!-- <button class="btn" id="btn-editar" onclick="abrir_popup('editar-projeto-popup')">
            <i class="fa-solid fa-pen-to-square"></i> Editar
        </button>
        <button class="btn" id="btn-inativar" onclick="abrir_popup('inativar-projeto-popup')">
            <i class="fa-solid fa-trash-can"></i> Inativar
        </button> -->
    <?php else: ?>
        <button class="btn" id="btn-doacao" onclick="abrir_popup('login-obrigatorio-popup')">Fazer uma doação</button>
        <button class="btn" id="btn-voluntario" onclick="abrir_popup('login-obrigatorio-popup')">Ser Voluntário</button>
    <?php endif; ?>
</div>