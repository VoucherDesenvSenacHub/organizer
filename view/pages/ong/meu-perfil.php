<?php
ob_start();
$acesso = 'ong';
$tituloPagina = 'Meu Perfil | Organizer';
$cssPagina = ['adm/validar-ong.css'];
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';

$ongModel = new Ong();
$bancoModel = new BancoModel();
$lista_banco = $bancoModel->listar();
$perfil = $ongModel->buscarId($_SESSION['ong_id']);
ob_end_flush();
?>
<!-- Toast do Update -->
<div id="toast-ong-sucesso" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    ONG atualizada com Sucesso!
</div>
<div id="toast-ong-erro" class="toast erro">
    <i class="fa-solid fa-triangle-exclamation"></i>
    Falha ao atualizar ONG!
</div>
<!-- Inicio do Container -->
<main class="container">
    <form id="form" class="dados-ong" action="../../../controller/Ong/GerenciarOngController.php" method="POST"
        onsubmit="return confirm('Tem certeza que deseja alterar esses dados da ONG?')">
        <input type="hidden" name="ong-id" value="<?= $_SESSION['ong_id'] ?>">
        <fieldset>
            <legend><i class="fa-solid fa-house-flag"></i> DADOS DA ONG</legend>
            <div class="form">
                <label>
                    <span>Nome da ONG</span>
                    <input id="nome" name="nome" type="text" required value="<?= $perfil['nome'] ?>">
                </label>
                <label>
                    <span>CPNJ</span>
                    <input name="cnpj" id="cnpj" type="text" required value="<?= $perfil['cnpj'] ?>">
                </label>
                <label>
                    <span>Telefone</span>
                    <input name="telefone" id="telefone" type="text" required value="<?= $perfil['telefone'] ?>">
                </label>
                <label>
                    <span>Email</span>
                    <input name="email" type="text" required value="<?= $perfil['email'] ?>">
                </label>
            </div>
            <div class="form form-descricao">
                <label>
                    <span>Descrição</span>
                    <textarea name="descricao" required><?= $perfil['descricao'] ?></textarea>
                </label>
                <!-- <div class="checkbox">
                    <span>Áreas de Atuação</span>
                    <small><input type="checkbox">Saúde</small>
                    <small><input type="checkbox">Esporte</small>
                    <small><input type="checkbox">Meio Ambiente</small>
                    <small><input type="checkbox">Tecnologia</small>
                    <small><input type="checkbox">Educação</small>
                    <small><input type="checkbox">Cultura</small>
                    <small><input type="checkbox">Proteção Animal</small>
                </div> -->
            </div>
        </fieldset>
        <fieldset>
            <legend><i class="fa-solid fa-location-dot"></i> DADOS DE ENDEREÇO</legend>
            <div class="form">
                <label>
                    <span>CEP</span>
                    <input name="cep" id="cep" type="text" required value="<?= $perfil['cep'] ?>">
                </label>
                <label>
                    <span>Rua</span>
                    <input name="rua" id="rua" type="text" required readonly value="<?= $perfil['rua'] ?>">
                </label>
                <label class="label-short">
                    <span>Nº</span>
                    <input name="numero" id="numero" type="text" required value="<?= $perfil['numero'] ?>">
                </label>
                <label>
                    <span>Bairro</span>
                    <input id="bairro" name="bairro" type="text" required readonly value="<?= $perfil['bairro'] ?>">
                </label>
                <label>
                    <span>Cidade</span>
                    <input id="cidade" name="cidade" type="text" required readonly value="<?= $perfil['cidade'] ?>">
                </label>
                <label class="label-short">
                    <span>Estado</span>
                    <input id="estado" name="estado" type="text" required readonly value="<?= $perfil['estado'] ?>">
                </label>
            </div>
        </fieldset>
        <fieldset>
            <legend><i class="fa-solid fa-building-columns"></i> DADOS BANCÁRIOS</legend>
            <div class="form">
                <label>
                    <span>Banco</span>
                    <select name="banco">
                        <?php foreach ($lista_banco as $banco): ?>
                            <option value="<?= $banco['banco_id'] ?>" <?= ($perfil['banco_id'] === $banco['banco_id']) ? 'selected' : '' ?>>
                                <?= $banco['nome']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label><span>Agência</span><input name="agencia" id="agencia" type="text" required
                        value="<?= $perfil['agencia'] ?>"></label>
                <label><span>Número da conta</span><input name="conta" id="conta" type="text" required
                        value="<?= $perfil['conta_numero'] ?>"></label>
                <label>
                    <span>Tipo de Conta</span>
                    <select name="tipo_conta">
                        <option value="POUPANÇA" <?= ($perfil['tipo_conta'] === 'POUPANÇA') ? 'selected' : '' ?>>Poupança
                        </option>
                        <option value="CORRENTE" <?= ($perfil['tipo_conta'] === 'CORRENTE') ? 'selected' : '' ?>>Corrente
                        </option>
                    </select>
                </label>
            </div>
        </fieldset>
        <!-- <fieldset>
                <legend><i class="fa-solid fa-user-shield"></i> RESPONSÁVEL</legend>
                <div class="form">
                    <label><span>Nome</span><input type="text"></label>
                    <label><span>CPF</span><input type="text"></label>
                    <label><span>Telefone</span><input type="text"></label>
                </div>
            </fieldset> -->
        <div class="btn-acoes">
            <button class="btn" type="submit">SALVAR ALTERAÇÕES <i class="fa-solid fa-floppy-disk"></i></button>
            <button class="btn" type="button">INATIVAR MINHA ONG <i class="fa-solid fa-ban"></i></button>
        </div>
    </form>
</main>
<!-- Mascaras -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="../../assets/js/pages/ong/cep.js"></script>
<script type="text/javascript">
    $("#telefone").mask("(00) 00000-0000");
    $("#cnpj").mask("00.000.000/0000-00");
    $("#cep").mask("00000-000");
    // $("#agencia").mask("0000-0");
    // $("#conta").mask("00000-0");
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
<?php
$jsPagina = ['ong/conta.js'];
require_once '../../components/layout/footer/footer-logado.php';
?>