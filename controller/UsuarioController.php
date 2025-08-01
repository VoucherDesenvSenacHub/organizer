<?php
require_once __DIR__ . '/../model/UsuarioModel.php';

session_start();

$usuarioModel = new Usuario();

$acao = $_GET['acao'] ?? $_POST['acao'] ?? null;

switch ($acao) {
    //========= LOGIN DO USUÁRIO ==========
    case 'login':
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $contaUsuario = $usuarioModel->login($email);

        if ($contaUsuario && password_verify($senha, $contaUsuario['senha'])) {
            // Guardar dados do usuário na sessão de forma organizada
            $_SESSION['usuario'] = [
                'id'    => $contaUsuario['usuario_id'],
                'nome'  => $contaUsuario['nome'],
                'foto'  => $contaUsuario['foto_perfil'] ?? '../../assets/images/global/user-placeholder.jpg',
                'acessos' => [
                    'doador' => (bool) $contaUsuario['doador'],
                    'ong'    => (bool) $contaUsuario['ong'],
                    'adm'    => (bool) $contaUsuario['adm'],
                ]
            ];

            $acessosUsuario = array_filter($_SESSION['usuario']['acessos']);
            $quantidadeAcessos = count($acessosUsuario);

            // Se o usuário escolheu ser ong, mas ainda não fez o cadastro
            if (array_key_first($acessosUsuario) === 'ong' && !$usuarioModel->buscarOngUsuario($_SESSION['usuario']['id'])) {
                header("Location: ../view/pages/ong/cadastro.php");
                exit;
            }

            $_SESSION['ong_id'] = $usuarioModel->buscarOngUsuario($_SESSION['usuario']['id']);

            if ($quantidadeAcessos === 1) {
                // Se o usuário tiver apenas 1 acesso, vai direto para home
                $perfil = array_key_first($acessosUsuario);
                $_SESSION['perfil_usuario'] = $perfil;
                header("Location: ../view/pages/{$perfil}/home.php");
                exit;
            } elseif ($quantidadeAcessos > 1) {
                header('Location: ../view/pages/visitante/acesso.php'); // Deixa ele escolher
                exit;
            } else {
                header('Location: ../view/pages/visitante/primeiro-acesso.php'); // Ainda não escolheu nenhum
                exit;
            }
        }

        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?msg=logerro');
        exit;

        //========== CADASTRO DO USUÁRIO ==========
    case 'cadastro':
        $dados = [
            'nome'  => $_POST['nome'],
            'telefone' => $_POST['telefone'],
            'cpf' => $_POST['cpf'],
            'data_nascimento' => $_POST['data_nascimento'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha']
        ];
        $cadastroUsuario = $usuarioModel->cadastro($dados);
        if ($cadastroUsuario) {
            header('Location: ../view/pages/visitante/login.php?msg=cadsucesso');
        } else {
            header('Location: ../view/pages/visitante/cadastro.php?cadastro=erro');
        }
        exit;

        //========== PRIMEIRO ACESSO DO USUÁRIO ==========
    case 'primeiro-acesso':
        $escolhaUsuario = $_POST['escolha'];
        if ($escolhaUsuario === 'ong') {
            header("Location: ../view/pages/{$escolhaUsuario}/cadastro.php");
            exit;
        }
        $_SESSION['perfil_usuario'] = $escolhaUsuario;
        $_SESSION['usuario']['acessos'][$escolhaUsuario] = true;
        $usuarioModel->primeiroAcesso($_SESSION['usuario']['id'], $escolhaUsuario);
        header("Location: ../view/pages/{$escolhaUsuario}/home.php");
        exit;

    case 'acesso':
        $perfilUsuario = $_POST['perfil'];

        // Verificar se o usuário tem uma ONG
        if ($perfilUsuario === 'ong') {
            $ongExiste = $usuarioModel->buscarOngUsuario($_SESSION['usuario']['id']);
            if (!$ongExiste) {
                header("Location: ../view/pages/ong/cadastro.php");
                exit;
            }
            $_SESSION['ong_id'] = $ongExiste;
        }

        // Leva para home do acesso escolhido
        $_SESSION['perfil_usuario'] = $perfilUsuario;
        header("Location: ../view/pages/{$perfilUsuario}/home.php");
        exit;

    default:
        header('Location: ../view/pages/visitante/home.php');
        exit;
}
