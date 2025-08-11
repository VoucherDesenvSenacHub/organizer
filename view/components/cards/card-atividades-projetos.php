<?php 
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