<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análise</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 30px 40px;
            width: 400px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        .icon {
            font-size: 60px;
            color: #e0a800;
            /* amarelo escuro */
            margin-bottom: 10px;
        }

        h1 {
            font-size: 22px;
            margin-bottom: 10px;
            color: #333;
        }

        p {
            font-size: 15px;
            color: #555;
            line-height: 1.5;
        }

        .info {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }

        .btn {
            font-weight: 600;
            font-size: 15px;
            display: inline-block;
            margin-top: 25px;
            padding: 10px 20px;
            background: #004aad;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: 0.2s;
        }

        .btn:hover {
            background: #003a8c;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <div class="container">
        <?php session_start();
        if ($_SESSION['ong_status'] === 'PENDENTE'): ?>
            <div class="icon">⚠️</div>
            <h1>Cadastro em Análise</h1>
            <p>Sua ONG foi cadastrada com sucesso!</p>
            <p>No momento, ela está <strong>aguardando validação</strong> por um administrador.</p>
            <p class="info">
                Assim que for aprovada, você receberá acesso ao sistema.
            </p>
        <?php elseif ($_SESSION['ong_status'] === 'INATIVO'): ?>
            <div class="icon">⛔</div>
            <h1>ONG Banida</h1>
            <p>A sua ONG foi analisada pela nossa equipe.</p>
            <p>No momento, ela está <strong>banida</strong> e não possui acesso ao sistema.</p>
            <p class="info">
                Caso acredite que isso seja um engano ou deseja recorrer, entre em contato com o suporte.
            </p>
        <?php endif; ?>
        <a href="../visitante/acesso.php" class="btn">VOLTAR</a>
    </div>
</body>

</html>