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
    let aside = document.getElementById("aside");
    aside.style.right= "-230px"
    confirmacao_aside.addEventListener('click', (event) => {
        if (event.target === confirmacao_aside) {
            confirmacao_aside.classList.remove('ativo');
        }
    });
}