<?php
session_start();

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

require_once '../../../config/database.php';

global $pdo;

$sql = "SELECT * FROM usuarios
        WHERE reset_token_hash = ?";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(1, $token_hash, PDO::PARAM_STR);

$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user === null) {
    $_SESSION['mensagem_toast'] = ['error', 'Token não encontrado'];
    header('Location: login.php');
    exit;
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    $_SESSION['mensagem_toast'] = ['error', 'Token expirado'];
    header('Location: login.php');
    exit;
}

$acesso = 'visitante';
$tituloPagina = 'Redefinir Senha | Organizer';
$cssPagina = ['visitante/login.css'];
require_once '../../components/layout/base-inicio.php';
?>

<main>
    <div id="container-login" class="container">
        <form method="post" action="../../../controller/Usuario/ProcessResetPasswordController.php">
            <h1>REDEFINIR SENHA</h1>
            <p>Digite sua nova senha abaixo:</p>
            
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
            
            <div class="input-group">
                <div class="input-item">
                    <label for="password">Nova Senha<span>*</span></label>
                    <input type="password" id="password" name="password" minlength="8" maxlength="20" placeholder="********" required>
                    <i id="togglePassword" class="fas fa-eye"></i>
                </div>
                <div class="input-item">
                    <label for="password_confirmation">Confirmar Senha<span>*</span></label>
                    <input type="password" id="password_confirmation" name="password_confirmation" minlength="8" maxlength="20" placeholder="********" required>
                    <i id="togglePasswordConfirm" class="fas fa-eye"></i>
                </div>
            </div>
            
            <button class="btn" type="submit">ATUALIZAR SENHA</button>
            <span><a href="login.php">Voltar para o login</a></span>
        </form>
        
        <div class="img">
            <img src="../../assets/images/pages/visitante/celular-usuario.png">
        </div>
    </div>
</main>

<?php
$jsPagina = ['usuario/login.js'];
require_once '../../components/layout/footer/footer-visitante.php';
?>