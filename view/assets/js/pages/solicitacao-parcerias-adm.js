const btnAceitaSolicitacao = document.querySelectorAll('.btn-aceitar');
const telaConfirmaSolicitacao = document.getElementById('tela-confirma-solicitacao');
const btnRecusaSolicitacao = document.querySelectorAll('.btn-recusar');
const telaRecusaSolicitacao = document.getElementById('tela-recusa-solicitacao');
const btnVisualizaSolicitacao = document.querySelectorAll('.icon-visible');
const telaVisualizaSolicitacao = document.getElementById('tela-visualiza-solicitacao');



btnAceitaSolicitacao.forEach(button => {
    button.addEventListener('click', function () { telaConfirmaSolicitacao.style.display = "block"; })
});


btnRecusaSolicitacao.forEach(button => {
    button.addEventListener('click', function () { telaRecusaSolicitacao.style.display = "block"; })
});

btnVisualizaSolicitacao.forEach(button => {
    button.addEventListener('click', function () { telaVisualizaSolicitacao.style.display = "block"; })
});



window.onclick = function (event) {
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