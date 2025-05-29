<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['perfil'];
    $_SESSION['perfil_usuario'] = $usuario;
    header("Location: ../{$usuario}/home.php");
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
            <form class="form-adm" action="#" method="POST">
                <input type="hidden" name="perfil" value="adm">
                <button>
                    <i class="fa-solid fa-user-secret"></i>
                    <p>ADM</p>
                </button>
            </form>
        </div>
        <a href="../../../controller/logout.php">SAIR</a>
    </div>
</body>

</html>