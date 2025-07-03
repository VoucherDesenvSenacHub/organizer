<?php
session_start();
$_SESSION['perfil_usuario'] = null;
require_once __DIR__ . '/../../../autoload.php';
$ongModel = new Ong();
$ong = $ongModel->verificarExistenciaOng($_SESSION['usuario_id']);

if (isset($ong) && $ong) {
    $_SESSION['ong_id'] = $ong;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $perfil_usuario = $_POST['perfil'];
    if ($perfil_usuario == 'ong' && !$ong) {
        header("Location: ../ong/cadastro.php?msg=conta");
        exit;
    }
    $_SESSION['perfil_usuario'] = $perfil_usuario;
    header("Location: ../{$perfil_usuario}/home.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso | Organizer</title>
    <link rel="stylesheet" href="../../assets/css/global/style.css">
    <link rel="stylesheet" href="../../assets/css/pages/visitante/acesso.css">
</head>

<body>
    <div class="container">
        <h1>Olá, <?= explode(' ', $_SESSION['usuario_nome'])[0] ?></h1>
        <p>Escolha qual acesso você deseja:</p>
        <div class="forms">
            <form class="form-doador" action="#" method="POST">
                <input type="hidden" name="perfil" value="doador">
                <button>
                    <i class="fa-solid fa-user"></i>
                    <p>DOADOR</p>
                </button>
            </form>
            <form class="form-ong" action="#" method="POST">
                <input type="hidden" name="perfil" value="ong">
                <button>
                    <i class="fa-solid fa-house-flag"></i>
                    <p>ONG</p>
                </button>
            </form>
            <?php if ($_SESSION['usuario_adm']): ?>
                <form class="form-adm" action="#" method="POST">
                    <input type="hidden" name="perfil" value="adm">
                    <button>
                        <i class="fa-solid fa-user-secret"></i>
                        <p>ADM</p>
                    </button>
                </form>
            <?php endif; ?>
        </div>
        <a href="../../../controller/logout.php">SAIR</a>
    </div>
</body>

</html>