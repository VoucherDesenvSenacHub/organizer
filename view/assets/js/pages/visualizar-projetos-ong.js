const editarprojeto = document.getElementById('editarprojeto');
const telaDeEdicaoProjeto = document.getElementById('tela-de-edicao-projeto');
const salvarAlteracaoProjeto = document.getElementById('salvar-alteracao-projeto');
const telaDeEdicao = document.getElementById('tela-confirma-edicao');
const inativarProjeto = document.getElementById('inativar-projeto');
const TelaInativaProjeto = document.getElementById('tela-inativa-projeto');
const btnInativa = document.getElementById('btn-inativa');
const confirmacaoInativa = document.getElementById('confirmacao-inativa');



editarprojeto.onclick = function() {
    telaDeEdicaoProjeto.style.display = "block";
}

salvarAlteracaoProjeto.onclick = function() {
    telaDeEdicao.style.display = "block";
}

inativarProjeto.onclick = function(){
    TelaInativaProjeto.style.display = "block";
}

btnInativa.onclick = function() {
    confirmacaoInativa.style.display = "block";
}

window.onclick = function(event) {
    if (event.target == telaDeEdicaoProjeto) {
        telaDeEdicaoProjeto.style.display = "none";
    }
    if (event.target == telaDeEdicao) {
        telaDeEdicao.style.display = "none";
    }
    if (event.target == TelaInativaProjeto) {
        TelaInativaProjeto.style.display = "none";
    }
    if (event.target == confirmacaoInativa) {
        confirmacaoInativa.style.display = "none";
        TelaInativaProjeto.style.display = "none";
    }
}