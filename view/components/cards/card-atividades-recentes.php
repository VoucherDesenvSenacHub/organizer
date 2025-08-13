<?php

$tipo;

if ($tipo == "projeto"):
    $id = $projeto->projeto_id ?? 'Erro';
    $nome = $projeto->nome ?? 'Nome do Projeto';
    $data = $projeto->data_cadastro ?? 'Data de Cadastro';
    ?>

    <div class="card-acoes">
        <div class="icon tp-doacao">
            <img src="../../assets/images/icons/icon-projeto.png">
        </div>
        <div class="acoes-text">
            <h4>Projeto Criado</h4>
            <p>Você criou o Projeto “<?= $nome ?>”</p>
            <span><?= $data ?></span>
        </div>
    </div>

<?php elseif ($tipo == "noticia"):
    $id = $noticia->noticia_id ?? 'Erro';
    $nome = $noticia->titulo ?? 'titulo da noticia';
    $data = $noticia->data_cadastro ?? 'Data de Cadastro';
    ?>

    <div class="card-acoes">
        <div class="icon tp-noticia">
            <img src="../../assets/images/icons/icon-noticia.png">
        </div>
        <div class="acoes-text">
            <h4>Notícia Publicada</h4>
            <p>Você publicou a notícia “<?= $nome ?>”</p>
            <span><?= $data ?></span>
        </div>
    </div>
<?php elseif ($tipo == "doacao"):
    $id = $doacao->id ?? 'Erro';
    $valor = $doacao->valor ?? 'Valor da Doação';
    $nomeProjeto = $doacao->nome_projeto ?? 'Nome do Projeto';
    $data = $doacao->data_doacao ?? 'Data da doação';


    ?>
    <div class="card-acoes">
        <div class="icon tp-doacao">
            <img src="../../assets/images/icons/icon-dinheiro.png">
        </div>
        <div class="acoes-text">
            <h4>Doação realizada</h4>
            <p>Você doou R$ <?= $valor ?> para o Projeto “<?= $nomeProjeto ?>”</p>
            <span><?= $data ?></span>
        </div>

    </div>
<?php elseif ($tipo == "projeto_salvo"):
    $id = $favoritos->id ?? 'Erro';
    $nomeProjeto = $favoritos->nome_projeto ?? 'Nome do Projeto';
    $data = $favoritos->data_favoritado ?? 'Data do Favorito';
    ?>
    <div class="card-acoes">
        <div class="icon tp-salvar">
            <img src="../../assets/images/icons/icon-coracao.png">
        </div>
        <div class="acoes-text">
            <h4>Projeto Salvo</h4>
            <p>Você favoritou o Projeto “<?= $nomeProjeto ?>”</p>
            <span><?= $data ?></span>
        </div>
    </div>
<?php elseif ($tipo == "apoiador"):
    $id = $apoiador->id ?? 'Erro';
    $nomeProjeto = $apoiador->nome_projeto ?? 'Nome do Projeto';
    $data = $apoiador->data_apoio ?? 'Data do Apoio';
    ?>
    <div class="card-acoes">
        <div class="icon tp-apoiar">
            <img src="../../assets/images/icons/icon-abraco.png">
        </div>
        <div class="acoes-text">
            <h4>Projeto Apoiado</h4>
            <p>Você apoiou o Projeto “<?= $nomeProjeto ?>”</p>
            <span><?= $data ?></span>
        </div>
    </div>
<?php elseif ($tipo == "ong_salva"):
    $id = $ong->id ?? 'Erro';
    $nomeOng = $ong->nome_ong ?? 'Nome da ONG';
    $data = $ong->data_favoritado ?? 'Data da ONG Salva';
    ?>
    <div class="card-acoes">
        <div class="icon tp-salvar">
            <img src="../../assets/images/icons/icon-coracao.png">
        </div>
        <div class="acoes-text">
            <h4>ONG Salva</h4>
            <p>Você favoritou a ONG “<?= $nomeOng ?>”</p>
            <span><?= $data ?></span>
        </div>
    </div>
<?php endif ?>