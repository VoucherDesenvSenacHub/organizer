document.addEventListener("DOMContentLoaded", function () {
    if (sessionStorage.getItem("cadastro_sucesso")) {
        sessionStorage.removeItem("cadastro_sucesso");
        mostrar_toast("toast-sucesso-cadastro");
    }
});