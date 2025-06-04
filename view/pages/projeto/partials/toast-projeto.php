<?php
$perfil = $_SESSION['perfil_usuario'] ?? 'visitante';
?>

<?php if ($perfil === 'ong'): ?>
    <div id="toast-projeto" class="toast">
        <i class="fa-regular fa-circle-check"></i>
        Projeto salvo com Sucesso!
    </div>
    <div id="toast-projeto-erro" class="toast erro">
        <i class="fa-solid fa-triangle-exclamation"></i>
        Falha ao salvar Projeto!
    </div>
<?php endif; ?>