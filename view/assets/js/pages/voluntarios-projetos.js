const btnCard = document.querySelectorAll('.cards-container');
const telaAtivoPendentesVoluntario = document.getElementById('tela-voluntario-ativo-solicitacao');
const btnAtivos = document.getElementById('v-ativos');
const telaVoluntariosAtivos = document.getElementById('tela-voluntarios-ativos');
const btnDeleteVoluntario = document.querySelectorAll('.btn-inativar-voluntario');
const telaVoluntariosDelete = document.getElementById('tela-voluntario-delete');

btnCard.forEach(card => {
    card.addEventListener('click', function () { telaAtivoPendentesVoluntario.style.display = "block"; })
});

btnAtivos.onclick = function() {
    telaVoluntariosAtivos.style.display = "block";
}

btnDeleteVoluntario.forEach( card => {
    card.addEventListener('click', function () { telaVoluntariosDelete.style.display = "block"; })
});

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
    
}