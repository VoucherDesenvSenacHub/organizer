<?php
$perfil = $_SESSION['perfil_usuario'] ?? 'visitante';
?>

<?php if ($perfil === 'ong'): ?>
    <div id="toast-projeto" class="toast">
        <i class="fa-regular fa-circle-check"></i>
        Projeto salvo com sucesso!
    </div>
    <div id="toast-projeto-erro" class="toast erro">
        <i class="fa-solid fa-triangle-exclamation"></i>
        Falha ao salvar Projeto!
    </div>
<?php elseif ($perfil === 'doador'): ?>
    <div id="toast-doacao" class="toast">
        <i class="fa-regular fa-circle-check"></i>
        Doação realizada com sucesso!
    </div>
    <div id="toast-apoio" class="toast apoio">
        <i class="fa-regular fa-circle-check"></i>
        Projeto apoiado com sucesso!
    </div>
    <div id="toast-desapoio" class="toast apoio">
        <i class="fa-solid fa-triangle-exclamation"></i>
        Você não apoia mais este Projeto
    </div>
<?php endif; ?>