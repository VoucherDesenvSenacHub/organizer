function asidebar(){
    let aside = document.getElementById("aside");
    aside.style.right= "0px"
}

function fechar_aside(){
    let aside = document.getElementById("aside");
    aside.style.right= "-230px"
}

function fechar_confirmacao(){
    const confirmacao = document.getElementById('fundo-confirmacao');
    confirmacao.classList.remove('ativo');
}

function abrir_popup_confirmacao(id){
    const confirmacao_aside = document.getElementById(id);
    confirmacao_aside.classList.add('ativo');

    confirmacao_aside.addEventListener('click', (event) => {
        if (event.target === confirmacao_aside) {
            confirmacao_aside.classList.remove('ativo');
        }
    });
}

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