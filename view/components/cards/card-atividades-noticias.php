<?php 
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
                    <p>Você publicou a notícia “<?=$nome?>”</p>
                    <span><?=$data?></span>
                </div>
            </div>