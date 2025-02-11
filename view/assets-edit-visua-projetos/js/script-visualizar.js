const novoProjetoBtn = document.getElementById('novoProjetoBtn');
const telaDeCriacao = document.getElementById('tela-de-criacao-projeto');
const salvarProjeto = document.getElementById('salvarprojeto');
const telaDeConfirmacao = document.getElementById('tela-confirma-criacao');



novoProjetoBtn.onclick = function() {
    telaDeCriacao.style.display = "block";
}


salvarProjeto.onclick = function() {
    telaDeConfirmacao.style.display = "block";
}




window.onclick = function(event) {
    if (event.target == telaDeCriacao) {
        telaDeCriacao.style.display = "none";
    }
    if (event.target == telaDeConfirmacao) {
        telaDeConfirmacao.style.display = "none";
    }
}



