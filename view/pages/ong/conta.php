<?php
ob_start();
$acesso = 'ong';
$tituloPagina = 'Meu Perfil | Organizer';
$cssPagina = ['shared/conta-ong.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../controller/Ong/EditarPerfilController.php';
$controller = new EditarPerfilController();
$dados = $controller->buscarDados();
$perfil = $dados['perfil'];
$lista_banco = $dados['bancos'];

ob_end_flush();
?>
<main class="container conteudo-principal">
    <section>
        <form id="form" class="dados-ong" action="../../../controller/Ong/EditarPerfilController.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="atualizar-ong" value="true">
            <fieldset>
                <legend><i class="fa-solid fa-image"></i> FOTO DA ONG</legend>
                <div class="form-foto-perfil">
                    <div class="upload-area" id="uploadArea">
                        <input type="file" id="fotoPerfil" name="foto_perfil" accept="image/*" style="display: none;">
                        <i class="fa-solid fa-cloud-upload-alt"></i>
                        <p>Clique para escolher uma foto ou arraste aqui</p>
                    </div>
                    <div class="foto-preview" id="fotoPreview" style="display: none;">
                        <img id="previewImage" src="" alt="Preview da foto">
                        <button type="button" class="btn-remover" id="btnRemover">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </div>
            </fieldset>
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
                    <label><span>Número da conta</span><input name="conta_numero" id="conta" type="text" required
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
                <button class="btn" type="button" onclick="inativarOng()">INATIVAR MINHA ONG <i class="fa-solid fa-ban"></i></button>
            </div>
        </form>
    </section>
</main>

<!-- Toast da Inativação -->
<div id="toast-inativar-sucesso" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    ONG inativada com Sucesso!
</div>
<div id="toast-inativar-erro" class="toast erro">
    <i class="fa-solid fa-triangle-exclamation"></i>
    Falha ao inativar ONG!
</div>

<!-- Toasts -->
<div id="toast-ong-sucesso" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    ONG atualizada com Sucesso!
</div>
<div id="toast-ong-erro" class="toast erro">
    <i class="fa-solid fa-triangle-exclamation"></i>
    Falha ao atualizar ONG!
</div>

<!-- Modal de Inativação -->
<?php require_once '../../components/popup/inativar-ong.php'; ?>
<!-- Modal de Confirmação de Edição -->
<?php require_once '../../components/popup/confirmar-edicao-ong.php'; ?>

<?php
$jsPagina = ['ong/conta.js', 'ong/cep.js'];
require_once '../../components/layout/footer/footer-logado.php';
?>