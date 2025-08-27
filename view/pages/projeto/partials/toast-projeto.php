<?php
$perfil = $_SESSION['perfil_usuario'] ?? 'visitante';
switch ($perfil):
    case 'ong': ?>
        <!-- Toast para 'Criar ou Editar um Projeto' -->
        <div id="toast-projeto" class="toast">
            <i class="fa-regular fa-circle-check"></i>
            Projeto salvo com sucesso!
        </div>
        <div id="toast-projeto-erro" class="toast erro">
            <i class="fa-solid fa-triangle-exclamation"></i>
            Falha ao salvar Projeto!
        </div>
    <?php break;

    case 'doador': ?>
        <!-- Toast para 'Doação do Projeto' -->
        <div id="toast-doacao" class="toast">
            <i class="fa-regular fa-circle-check"></i>
            Doação realizada com sucesso!
        </div>
        <div id="toast-doacao-erro" class="toast erro">
            <i class="fa-solid fa-triangle-exclamation"></i>
            Falha ao processar doação!
        </div>

        <!-- Toast para 'Favoritar um Projeto' -->
        <div id="toast-favorito" class="toast">
            <i class="fa-solid fa-heart"></i>
            Adicionado aos favoritos!
        </div>
        <div id="toast-remover-favorito" class="toast erro">
            <i class="fa-solid fa-heart-crack"></i>
            Removido dos favoritos!
        </div>

        <!-- Toast para 'Apoiar um Projeto' -->
        <div id="toast-apoio" class="toast apoio">
            <i class="fa-regular fa-circle-check"></i>
            Projeto apoiado com sucesso!
        </div>
        <div id="toast-desapoio" class="toast apoio">
            <i class="fa-solid fa-triangle-exclamation"></i>
            Você não apoia mais este Projeto!
        </div>
<?php break;
endswitch;
?>