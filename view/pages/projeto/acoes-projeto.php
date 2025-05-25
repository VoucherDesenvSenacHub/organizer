<?php
$perfil = $_SESSION['perfil_usuario'] ?? 'visitante';
?>

<div id="acoes">
    <?php if ($perfil === 'doador'): ?>
        <button class="btn" id="btn-doacao" onclick="abrir_popup('doacao-popup')">Fazer uma doação</button>
        <button class="btn" id="btn-voluntario" onclick="abrir_popup('ser-voluntario-popup')">Ser Voluntário</button>
    <?php elseif ($perfil === 'ong'): ?>
        <button class="btn" onclick="abrir_popup('popup-editar-projeto')">Editar Projeto</button>
        <button class="btn" onclick="abrir_popup('popup-excluir-projeto')">Excluir Projeto</button>
    <?php elseif ($perfil === 'admin'): ?>
        <button class="btn" onclick="abrir_popup('popup-gerenciar')">Gerenciar Projeto</button>
    <?php else: ?>
        <button class="btn" id="btn-doacao" onclick="abrir_popup('login-obrigatorio-popup')">Fazer uma doação</button>
        <button class="btn" id="btn-voluntario" onclick="abrir_popup('login-obrigatorio-popup')">Ser Voluntário</button>
    <?php endif; ?>
</div>