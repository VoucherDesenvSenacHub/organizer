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

    // Limpa o parâmetro da URL
    if (window.history.replaceState) {
        const urlSemParams = window.location.protocol + "//" + window.location.host + window.location.pathname;
        window.history.replaceState({}, document.title, urlSemParams);
    }
}

window.onload = function () {
    verificarMensagem();
};


// Ocultar e visualizar senha
const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#senha");

togglePassword.addEventListener("click", function () {
    const type = password.type === "password" ? "text" : "password";

    password.type = type;

    // this -> elemento
    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
});