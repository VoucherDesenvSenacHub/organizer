const novoProjetoBtn = document.getElementById('novoProjetoBtn');
const telaDeCriacao = document.getElementById('tela-de-criacao-projeto');


novoProjetoBtn.onclick = function() {
    telaDeCriacao.style.display = "block";
}


window.onclick = function(event) {
    if (event.target == telaDeCriacao) {
        telaDeCriacao.style.display = "none";
    }
}
