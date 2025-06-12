<?php
$nome = $doador->nome ?? 'Nome do Usuário';
$email = $doador->email ?? 'usuario@email.com';
$data = $doador->data_cadastro ?? '01/01/2025';
$id = $doador->usuario_id;
?>
<div class="card-doadores">
    <div class="dados">
        <div class="img">
            <img src="../../assets/images/pages/perfil_julia.png">
        </div>
        <div class="info">
            <p><?= $nome ?></p>
            <span><?= $email ?></span>
        </div>
    </div>
    <small><?= $data ?></small>
    <form action="doadores.php" method="GET">
        <input type="hidden" name="id" value="<?= $id ?>">
        <button type="submit">
            <i class="fa-solid fa-eye"></i>
            <p>Ver Perfil</p>
        </button>
    </form>
</div>