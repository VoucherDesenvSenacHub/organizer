<?php

$tipo = $tipo;

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
                    <p>Você criou o Projeto “<?=$nome?>”</p>
                    <span><?=$data?></span>
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
                <p>Você doou R$ <?= $dvalor?> para o Projeto “<?=$nomeProjeto?>”</p>
                <span><?=$data?></span>
            </div>
            
        </div>
<?php  endif?>

