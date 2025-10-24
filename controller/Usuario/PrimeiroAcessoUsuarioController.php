<!-- PRIMEIRO ACESSO DO USUÁRIO -->
<?php
require_once __DIR__ . '/../../model/UsuarioModel.php';

session_start();

$usuarioModel = new UsuarioModel();

// Obtém a escolha feita pelo usuário (doador ou ong)
$escolhaUsuario = $_POST['escolha'];

if ($escolhaUsuario === 'ong') {
    // Se o usuário escolheu "ong", redireciona para a tela de cadastro de ONG
    header("Location: ../../view/pages/{$escolhaUsuario}/cadastro.php");
    exit;
}

$_SESSION['perfil_usuario'] = $escolhaUsuario;

$_SESSION['usuario']['acessos'][$escolhaUsuario] = true;

// Atualiza no banco de dados que o usuário ativou esse tipo de acesso
$usuarioModel->primeiroAcesso($_SESSION['usuario']['id'], $escolhaUsuario);

// Redireciona o usuário para a home do perfil escolhido
header("Location: ../../view/pages/{$escolhaUsuario}/home.php");
exit;
