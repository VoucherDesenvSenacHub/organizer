<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro .env - Configuração de Email</title>

    <style>
        body {
            font-family: "Segoe UI", Tahoma, Arial, sans-serif;
            background: #eef1f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 780px;
            margin: 80px auto;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            text-align: center;
            color: #c9302c;
            font-size: 32px;
            margin-bottom: 10px;
        }

        h2 {
            color: #444;
            margin-top: 30px;
            font-size: 22px;
            border-bottom: 2px solid #eee;
            padding-bottom: 5px;
        }

        p {
            font-size: 16px;
            color: #555;
            line-height: 1.7;
        }

        .alert-box {
            background: #fcebea;
            border-left: 6px solid #d43f3a;
            padding: 15px 20px;
            border-radius: 6px;
            margin-bottom: 25px;
        }

        code {
            background: #272822;
            color: #f8f8f2;
            padding: 12px;
            display: block;
            border-radius: 5px;
            font-size: 15px;
            margin: 10px 0;
            white-space: pre-wrap;
        }

        .missing-key {
            background: #fff4d6;
            border-left: 6px solid #f0ad4e;
            padding: 12px 16px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .footer {
            display: flex;
            justify-content: center;
            margin-top: 35px;
        }

        .footer a {
            display: block;
            width: fit-content;
            float: 0 auto inline-end;
            background-color: #E3B652;
            font-size: 14px;
            letter-spacing: 1px;
            color: aliceblue;
            text-decoration: none;
            font-weight: 600;
            border-radius: 5px;
            padding: 10px 20px;
            transition: .3s;
        }

        .footer a:hover {
            transform: translateY(-1px);
            filter: brightness(1.1);
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Arquivo .env não configurado</h1>

        <div class="alert-box">
            <p><strong>O sistema não conseguiu carregar as configurações de e-mail do arquivo
                    <code>.env</code></strong></p>
            <p>Para que os envios de e-mail funcionem, você precisa configurar corretamente as variáveis do servidor
                SMTP.</p>
        </div>

        <h2>1. Crie ou edite o arquivo <code>.env</code></h2>
        <p>O arquivo deve estar na raiz do projeto e seguir o modelo do arquivo <code>.env.example</code>.</p>

        <h2>2. Configure as variáveis necessárias</h2>

        <p>Estas variáveis são obrigatórias:</p>

        <code>
EMAIL_HOST=smtp.seuprovedor.com  
EMAIL_USERNAME=seuemail@dominio.com  
EMAIL_PASSWORD=suasenha  
EMAIL_SMTP_SECURE=tls  
EMAIL_PORT=587  
EMAIL_FROM_NAME="Organizer Exemplo"
        </code>
        <div class="missing-key">
            <?php if (isset($_GET['missing'])): ?>
                <strong>Variável ausente:</strong> <?= htmlspecialchars($_GET['missing']) ?><br>
                Adicione essa variável ao arquivo <code>.env</code>.
            <?php else: ?>
                Verifique se todas as variáveis acima estão presentes no arquivo <code>.env</code>
            <?php endif; ?>
        </div>
        <div class="footer">
            <a href="visitante/home.php">VOLTAR</a>
        </div>
    </div>
</body>

</html>