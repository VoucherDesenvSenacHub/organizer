const btnCard = document.querySelectorAll('.cards-container');
const telaAtivoPendentesVoluntario = document.getElementById('tela-voluntario-ativo-solicitacao');

const cardVoluntarioAtivoSolicitacoes = document.getElementById('card-voluntario-ativo-solicitacao');

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
    card.addEventListener('click', function () {
        telaAtivoPendentesVoluntario.style.display = "block";
        cardVoluntarioAtivoSolicitacoes.classList.add('ativo');
        telaAtivoPendentesVoluntario.classList.add('ativo');
    });
});

btnAtivos.onclick = function () {
    telaVoluntariosAtivos.style.display = "block";
    telaVoluntariosAtivos.classList.add('ativo');

}

btnDeleteVoluntario.forEach(card => {
    card.addEventListener('click', function () { 
        telaVoluntariosDelete.style.display = "block";
        telaVoluntariosDelete.classList.add('ativo');
    })
});

btnSolicitacoes.onclick = function () {
    telaVoluntariosSolicitacoes.style.display = "block";
    telaVoluntariosSolicitacoes.classList.add('ativo');
}

btnVerSolicitacao.forEach(card => {
    card.addEventListener('click', function () {
        telaSolicitacaoVoluntario.style.display = "block";
        telaSolicitacaoVoluntario.classList.add('ativo');
    })
});

btnAceitar.onclick = function () {
    telaAceitar.style.display = "block";
    telaAceitar.classList.add('ativo');
}

btnRecusar.onclick = function () {
    telaRecusar.style.display = "block";
    telaRecusar.classList.add('ativo');
}

window.onclick = function (event) {
    if (event.target == telaAtivoPendentesVoluntario) {
        telaAtivoPendentesVoluntario.classList.remove('ativo');
    }
    if (event.target == telaVoluntariosAtivos) {
        telaVoluntariosAtivos.classList.remove('ativo');
    }
    if (event.target == telaVoluntariosDelete) {
        telaVoluntariosDelete.classList.remove('ativo');
    }
    if (event.target == telaVoluntariosSolicitacoes) {
        telaVoluntariosSolicitacoes.classList.remove('ativo');
    }
    if (event.target == telaSolicitacaoVoluntario) {
        telaSolicitacaoVoluntario.classList.remove('ativo');
    }
    if (event.target == telaAceitar) {
        telaAceitar.classList.remove('ativo');
        telaSolicitacaoVoluntario.classList.remove('ativo');
        

    }
    if (event.target == telaRecusar) {
        telaRecusar.classList.remove('ativo');
        telaSolicitacaoVoluntario.classList.remove('ativo');
    }
}