const btnAceitaSolicitacao = document.getElementById('btn-aceita-solicitacao');
const telaConfirmaSolicitacao = document.getElementById('tela-confirma-solicitacao');
const btnRecusaSolicitacao = document.getElementById('btn-recusa-solicitacao');
const telaRecusaSolicitacao = document.getElementById('tela-recusa-solicitacao');
const btnVisualizaSolicitacao = document.getElementById('visualiza-solicitacao');
const telaVisualizaSolicitacao = document.getElementById('tela-visualiza-solicitacao');

btnAceitaSolicitacao.onclick = function() {
    telaConfirmaSolicitacao.style.display = "block";
}

btnRecusaSolicitacao.onclick = function() {
    telaRecusaSolicitacao.style.display = "block";
}

btnVisualizaSolicitacao.onclick = function() {
    telaVisualizaSolicitacao.style.display = "block";
}



window.onclick = function(event) {
    if (event.target == telaConfirmaSolicitacao) {
        telaConfirmaSolicitacao.style.display = "none";
    }
    if (event.target == telaRecusaSolicitacao) {
        telaRecusaSolicitacao.style.display = "none";
    }
    if (event.target == telaVisualizaSolicitacao) {
        telaVisualizaSolicitacao.style.display = "none";
    }
}