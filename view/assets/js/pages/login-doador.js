// document.addEventListener("DOMContentLoaded", function () {
//     if (sessionStorage.getItem("cadastro_sucesso")) {
//         sessionStorage.removeItem("cadastro_sucesso");
//         mostrar_toast("toast-sucesso-cadastro");
//     }
// });

function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

function verificarMensagem() {
    const mensagem = getQueryParam('msg');

    if (mensagem === 'cadsucesso') {
        mostrar_toast("toast-sucesso-cadastro");
    }
    else if (mensagem === 'logerro') {
        mostrar_toast("toast-login-erro")
    }
    else if (mensagem === 'login') {
        mostrar_toast("toast-login")
    }
}

window.onload = function () {
    verificarMensagem();
};