<?php
$perfil = $_SESSION['perfil_usuario'] ?? 'visitante';
?>

<?php if ($perfil === 'ong' && $_SESSION['ong_id'] === $_GET['id']): ?>
    <div id="acoes">
        <a href="meu-perfil.php"><button class="btn" id="btn-editar"><i class="fa-solid fa-pen-to-square"></i> Editar</button></a>
        <button class="btn" id="btn-inativar"><i class="fa-solid fa-ban"></i> Inativar</button>
    </div>
<?php elseif ($perfil === 'adm'): ?>
    <div id="acoes">
        <button class="btn adm-inativar" id="btn-inativar"><i class="fa-solid fa-ban"></i> Inativar</button>
    </div>
<?php endif; ?>