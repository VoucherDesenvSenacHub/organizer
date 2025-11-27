<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro de Dependências</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Arial, sans-serif;
            background: #f3f4f7;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 750px;
            margin: 80px auto;
            background: #fff;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #d9534f;
            font-size: 32px;
            margin-bottom: 20px;
        }

        p {
            line-height: 1.7;
            font-size: 16px;
        }

        ol {
            margin-top: 20px;
            font-size: 18px;
        }

        code {
            background: #272822;
            color: #f8f8f2;
            padding: 12px;
            display: block;
            border-radius: 6px;
            font-size: 15px;
            margin-top: 10px;
            white-space: pre-wrap;
        }

        .box {
            background: #fafafa;
            border-left: 5px solid #d9534f;
            padding: 15px 20px;
            margin-top: 25px;
            border-radius: 6px;
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
        <h1>Erro de Dependências</h1>
        <div class="box">
            <p><strong>O sistema não conseguiu carregar as dependências do projeto.</strong></p>
            <p>Isso normalmente acontece quando a pasta <strong>vendor</strong> não existe ou o Composer ainda não foi
                executado.</p>
        </div>
        <p>Para resolver o problema, siga os passos abaixo:</p>
        <ol>
            <li>
                Instale as dependências executando o comando:
                <code>php composer.phar install</code>
            </li>

            <li style="margin-top: 25px;">
                Crie um arquivo <strong>.env</strong> com suas variáveis de ambiente.
                <br>Use o arquivo <strong>.env.example</strong> como modelo.
            </li>
        </ol>
        <div class="footer">
            <a href="visitante/home.php">TENTAR NOVAMENTE</a>
        </div>
    </div>
</body>

</html>