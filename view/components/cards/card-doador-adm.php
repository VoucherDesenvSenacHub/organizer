<?php
$NomeUsuario = $doador['nome'] ?? 'Nome do Usuário';
$EmailUsuario = $doador['email'] ?? 'usuario@email.com';
$DataCadastro = date('d/m/Y H:i', strtotime($doador['data_cadastro'])) ?? '00/00/0000';
$IdUsuario = $doador['usuario_id'];
$FotoUsuario = $doador['caminho'] ?? '../../assets/images/global/user-placeholder.jpg';
?>
<div class="card-doadores">
    <div class="dados">
        <div class="img">
            <img src="<?= $FotoUsuario ?>">
        </div>
        <div class="info">
            <p><?= $NomeUsuario ?></p>
            <span><?= $EmailUsuario ?></span>
        </div>
    </div>
    <small><?= $DataCadastro ?></small>
    <form action="usuarios.php" method="GET">
        <input type="hidden" name="id" value="<?= $IdUsuario ?>">
        <button type="submit">
            <i class="fa-solid fa-eye"></i>
        </button>
    </form>
</div>