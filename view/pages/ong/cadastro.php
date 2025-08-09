<?php
session_start();

require_once __DIR__ . '/../../../autoload.php';

$usuarioModel = new Usuario();
$ongExiste = $usuarioModel->buscarOngUsuario($_SESSION['usuario']['id']);
if ($ongExiste) {
    header("Location: ../visitante/acesso.php");
    exit;
};

$ongModel = new Ong();
$bancoModel = new BancoModel();
$lista_banco = $bancoModel->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro da ONG | Organizer</title>
    <link rel="stylesheet" href="../../assets/css/global/style.css">
    <link rel="stylesheet" href="../../assets/css/pages/ong/cadastro.css">
</head>

<body>
    <!-- Mostrar toast se o cadastro falhar -->
    <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] == 'erro'): ?>
        <script>
            window.onload = function() {
                mostrar_toast('toast-cadastro-erro');
            };
        </script>
    <?php endif; ?>
    <div id="toast-cadastro-erro" class="toast erro">
        <i class="fa-solid fa-triangle-exclamation"></i>
        Falha ao realizar cadastro!
    </div>

    <main>
        <section>
            <div class="container">
                <h1>CADASTRE SUA ONG</h1>
                <div class="line">
                    <div id="linhaClara"></div>
                    <div id="linhaAzul"></div>
                    <div class="item active">
                        <div class="circle"><i class="fa-solid fa-check"></i></div>
                        <p>Dados da ONG</p>
                    </div>
                    <div class="item">
                        <div class="circle"><i class="fa-solid fa-check"></i></div>
                        <p>Descrição</p>
                    </div>
                    <div class="item">
                        <div class="circle"><i class="fa-solid fa-check"></i></div>
                        <p>Endereço</p>
                    </div>
                    <div class="item">
                        <div class="circle"><i class="fa-solid fa-check"></i></div>
                        <p>Banco</p>
                    </div>
                </div>
                <form id="form" action="../../../controller/OngController.php?acao=cadastrar" method="POST">
                    <div class="formBox">
                        <div class="inputBox">
                            <label for="nome">Razão Social<span>*</span></label>
                            <input name="nome" id="nome" type="text" placeholder="Digite um nome">
                            <span class="visor"></span>
                        </div>
                        <div class="inputBox">
                            <label for="telefone">Telefone da ONG<span>*</span></label>
                            <input name="telefone" id="telefone" type="text" placeholder="(00) 00000-0000">
                            <span class="visor"></span>
                        </div>
                        <div class="inputBox">
                            <label for="cnpj">CNPJ<span>*</span></label>
                            <input name="cnpj" id="cnpj" type="text" placeholder="00.000.000/0000-00">
                            <span class="visor"></span>
                        </div>
                        <div class="inputBox">
                            <label for="email-ong">Email da ONG<span>*</span></label>
                            <input name="email" id="email-ong" type="email" placeholder="ong@conta.com" required>
                            <span class="visor"></span>
                        </div>
                        <div class="btnNext">
                            <button class="btn" type="button" onclick="return proximo(1)">Próximo</button>
                        </div>
                    </div>
                    <div class="formBox">
                        <div class="inputBox">
                            <label for="descricao">Descrição<span>*</span></label>
                            <textarea name="descricao" id="descricao"></textarea>
                            <span class="visor"></span>
                        </div>
                        <div class="btnNextBack">
                            <button class="btn btnVoltar" type="button" onclick="moverPara(0, 0)">Voltar</button>
                            <button class="btn" type="button" onclick="return proximo(2)">Próximo</button>
                        </div>
                    </div>
                    <div class="formBox busca-cep">
                        <div class="inputBox">
                            <label for="cep">CEP<span>*</span></label>
                            <input name="cep" id="cep" type="text" placeholder="00000-000">
                            <span class="visor"></span>
                        </div>
                        <div class="inputBox">
                            <label for="rua">Rua<span>*</span></label>
                            <input name="rua" id="rua" type="text" placeholder="Ex: Rui Barbosa" readonly>
                            <span class="visor"></span>
                        </div>
                        <div class="inputBox">
                            <label for="numero">Nº<span>*</span></label>
                            <input name="numero" id="numero" type="text">
                            <span class="visor"></span>
                        </div>
                        <div class="inputBox">
                            <label for="bairro">Bairro<span>*</span></label>
                            <input name="bairro" id="bairro" type="text" placeholder="Ex: Centro" readonly>
                            <span class="visor"></span>
                        </div>
                        <div class="inputBox">
                            <label for="cidade">Cidade<span>*</span></label>
                            <input name="cidade" id="cidade" type="text" placeholder="Campo Grande" readonly>
                            <span class="visor"></span>
                        </div>
                        <div class="inputBox">
                            <label for="estado">Estado<span>*</span></label>
                            <input name="estado" id="estado" type="text" placeholder="MS" readonly>
                            <span class="visor"></span>
                        </div>
                        <div class="btnNextBack">
                            <button class="btn btnVoltar" type="button" onclick="moverPara(1, 25)">Voltar</button>
                            <button class="btn" type="button" onclick="return proximo(3)">Próximo</button>
                        </div>
                    </div>
                    <div class="formBox">
                        <div class="inputBox">
                            <label for="banco">Banco<span>*</span></label>
                            <select name="banco">
                                <option value="" disabled selected>Escolha</option>
                                <?php foreach ($lista_banco as $banco): ?>
                                    <option value="<?= $banco->banco_id ?>"><?= $banco->nome ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="visor"></span>
                        </div>

                        <div class="inputBox">
                            <label for="tipo-conta">Tipo<span>*</span></label>
                            <select name="tipo_conta">
                                <option value="" disabled selected>Escolha</option>
                                <option value="CORRENTE">Corrente</option>
                                <option value="POUPANÇA">Poupança</option>
                            </select>
                            <span class="visor"></span>
                        </div>
                        <div class="inputBox">
                            <label for="agencia">Agência<span>*</span></label>
                            <input name="agencia" id="agencia" type="text" placeholder="0000-0">
                            <span class="visor"></span>
                        </div>
                        <div class="inputBox">
                            <label for="conta">Conta<span>*</span></label>
                            <input name="conta" id="conta" type="text" placeholder="00000-00">
                            <span class="visor"></span>
                        </div>
                        <div class="btnNextBack">
                            <button class="btn btnVoltar" type="button" onclick="moverPara(2, 25)">Voltar</button>
                            <button class="btn" type="submit" onclick="return proximo(4)">CADASTRAR ONG</button>
                        </div>
                    </div>
                </form>
            </div>
            <a class="msg-sair" href="../visitante/acesso.php">
                CADASTRAR DEPOIS
            </a>
        </section>
    </main>

    <script src="../../assets/js/global/main.js"></script>
    <script src="../../assets/js/global/cadastro.js"></script>
    <script src="../../assets/js/pages/ong/cadastro.js"></script>
    <script src="../../assets/js/pages/ong/cep.js"></script>

    <!-- Scripts de Mascaras -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $("#telefone").mask("(00) 00000-0000");
        $("#cnpj").mask("00.000.000/0000-00");
        $("#cep").mask("00000-000");
        $("#cpf-resp").mask("000.000.000-00");
        $("#telefone-resp").mask("(00) 00000-0000");
        $("#agencia").mask("0000-0");
        $("#conta").mask("00000-00");
        $("#nome").on("input", function() {
            var valor = $(this).val();
            $(this).val(valor.replace(/[^a-zA-ZÀ-ÿ\s]/g, ""));
        });
        $("#bairro").on("input", function() {
            var valor = $(this).val();
            $(this).val(valor.replace(/[^a-zA-ZÀ-ÿ\s]/g, ""));
        });
        $("#cidade").on("input", function() {
            var valor = $(this).val();
            $(this).val(valor.replace(/[^a-zA-ZÀ-ÿ\s]/g, ""));
        });
    </script>
</body>

</html>