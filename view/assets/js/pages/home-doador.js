function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

function verificarMensagem() {
    const mensagem = getQueryParam('msg');

    if (mensagem === 'volte') {
        mostrar_toast("toast-volte-sempre");
    }
}

window.onload = function () {
    verificarMensagem();
};


function abrir_popup_empresas(id){
    const popup_empresas = document.getElementById(id);
    popup_empresas.classList.add('ativo');

    popup_empresas.addEventListener('click', (event) => {
        if (event.target === popup_empresas) {
            popup_empresas.classList.remove('ativo');
        }
    });
}

function abrir_popup_form(id){
    const form_empresas = document.getElementById(id);
    form_empresas.classList.add('ativo');

    form_empresas.addEventListener('click', (event) => {
        if (event.target === form_empresas) {
            form_empresas.classList.remove('ativo');
        }
    });
}

function msg_enviada(id){
    const msg_enviada = document.getElementById(id);
    msg_enviada.classList.add('ativo');

    msg_enviada.addEventListener('click', (event) => {
        if (event.target === msg_enviada) {
            msg_enviada.classList.remove('ativo');
        }
    });
}