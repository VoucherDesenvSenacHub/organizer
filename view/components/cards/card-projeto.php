<?php 
function mostrarCardProjeto($id, $nome, $resumo, $tipo) {
    switch ($tipo) {
        case "ong":
            $class = "tp-ong";
            break;
        default:
            $class = "tp-doador";
            break;
    }


    return "<div class='card-projeto $class'>
        <div class='acoes-projeto'>
            <button class='btn-share fa-solid fa-share-nodes' onclick='abrir_popup(\"compartilhar-popup\")'></button>
            <button class='btn-like fa-solid fa-heart' onclick='abrir_popup(\"login-obrigatorio-popup\")'></button>
        </div>
        <div class='img-projeto'>250x130</div>
        <div class='info-projeto'>
            <h5>$nome</h5>
            <p>$resumo</p>
            <div class='barra-doacao'>
                <span>30%</span>
                <div class='barra'>
                    <div class='barra-verde'></div>
                </div>
            </div>
        </div>
        <a class='saiba-mais-projeto' href='perfil-projeto.php?id=$id'>Saiba Mais</a>
    </div>";
}
?>
