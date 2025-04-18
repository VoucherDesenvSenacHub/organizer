<?php 
    require_once __DIR__ . '/../../../model/DoadorModel.php';
    $doadorModel = new Doador();
    $doador = $doadorModel->buscar_perfil($_SESSION['doador_id'])
?>

<div class="popup-fundo" id="perfil-doador-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('perfil-doador-popup')"></button>
        <div id="left" class="box">
            <div id="perfil">
                <img src="../../assets/images/pages/perfil_julia.png">
                <p><?= $_SESSION['doador_nome'] ?></p>
                <!-- <p>email@blabla.com</p> -->
            </div>
            <button class="btn" title="Sair" onclick="abrir_popup('sair-da-conta-popup')">
                <i class="fa-solid fa-right-from-bracket"></i>
                Sair
            </button>
        </div>
        <div id="right" class="box">
            <h1>PERFIL</h1>
            <div class="input-group">
                <div class="input-box">
                    <label for="nome">Nome</label>
                    <input id="nome" type="text" value="<?= $doador->nome ?>">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-box inputM">
                    <label for="telefone">Telefone</label>
                    <input id="telefone" type="tel" value="<?= $doador->telefone ?>">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="input-box inputM">
                    <label for="cpf">CPF</label>
                    <input id="cpf" type="number" value="<?= $doador->cpf ?>">
                    <i class="fa-regular fa-address-card"></i>
                </div>
                <div class="input-box">
                    <label for="datan">Data de Nascimento</label>
                    <input id="datan" type="date" value="<?= $doador->data_nascimento ?>">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
            </div>
            <h1>LOGIN</h1>
            <div class="input-box">
                <label for="email">Email</label>
                <input id="email" type="email" value="<?= $doador->email ?>">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div id="acoes-perfil">
                <button class="btn">
                    <i class="fa-solid fa-key"></i>
                    Alterar Senha
                </button>
                <button class="btn"><i class="fa-solid fa-floppy-disk"></i>Salvar</button>
            </div>
        </div>
    </div>
</div>