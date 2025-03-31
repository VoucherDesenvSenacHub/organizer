const btnCard = document.querySelectorAll('.cards-container');
const telaAtivoPendentesVoluntario = document.getElementById('tela-voluntario-ativo-solicitacao');
const btnAtivos = document.getElementById('v-ativos');
const telaVoluntariosAtivos = document.getElementById('tela-voluntarios-ativos');
const btnDeleteVoluntario = document.querySelectorAll('.btn-inativar-voluntario');
const telaVoluntariosDelete = document.getElementById('tela-voluntario-delete');
const btnSolicitacoes = document.getElementById('v-solicitacoes');
const telaVoluntariosSolicitacoes = document.getElementById('tela-voluntarios-solicitacoes');
const btnVerSolicitacao = document.querySelectorAll('.btn-ver-solicitacao');
const telaSolicitacaoVoluntario = document.getElementById('tela-solicitacao-voluntario');
const btnAceitar = document.getElementById('aceitar');
const telaAceitar = document.getElementById('tela-aceitar');
const btnRecusar = document.getElementById('recusar');
const telaRecusar = document.getElementById('tela-recusar');

btnCard.forEach(card => {
    card.addEventListener('click', function () { telaAtivoPendentesVoluntario.style.display = "block"; })
});

btnAtivos.onclick = function() {
    telaVoluntariosAtivos.style.display = "block";
}

btnDeleteVoluntario.forEach( card => {
    card.addEventListener('click', function () { telaVoluntariosDelete.style.display = "block"; })
});

btnSolicitacoes.onclick = function() {
    telaVoluntariosSolicitacoes.style.display = "block";
}

btnVerSolicitacao.forEach( card => {
    card.addEventListener('click', function () { telaSolicitacaoVoluntario.style.display = "block";
     })
});

btnAceitar.onclick = function() {
    telaAceitar.style.display = "block";
}

btnRecusar.onclick = function() {
    telaRecusar.style.display = "block";
}

window.onclick = function (event) {
    if (event.target == telaAtivoPendentesVoluntario) {
        telaAtivoPendentesVoluntario.style.display = "none";
    }
    if (event.target == telaVoluntariosAtivos) {
        telaVoluntariosAtivos.style.display = "none";
    }
    if (event.target == telaVoluntariosDelete) {
        telaVoluntariosDelete.style.display = "none";
    }
    if (event.target == telaVoluntariosSolicitacoes) {
        telaVoluntariosSolicitacoes.style.display = "none";
    }
    if (event.target == telaSolicitacaoVoluntario) {
        telaSolicitacaoVoluntario.style.display = "none";
    }
    if (event.target == telaAceitar) {
        telaAceitar.style.display = "none";
        telaSolicitacaoVoluntario.style.display = "none";
        
    }
    if (event.target == telaRecusar) {
        telaRecusar.style.display = "none";
        telaSolicitacaoVoluntario.style.display = "none";
    }
}