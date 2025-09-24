// function exibir_toast(id) {
//     let toast = document.getElementById(id);
//     toast.style.right = "0px";
//     toast.style.opacity = "1";

//     setTimeout(() => {
//         toast.style.right = "-300px";
//         toast.style.opacity = "0";
//     }, 3000);
// }

// MOSTRAR UM ALERTA QUE SOME DEPOIS
export function exibir_toast(tipo, mensagem) {
    const toast = document.getElementById("toast");
    const icon = document.getElementById("toast-icon");
    const msg = document.getElementById("toast-msg");

    // Define classe de cor
    toast.className = "toast " + tipo;

    // Define ícone conforme tipo
    switch (tipo) {
        case "sucesso":
            icon.className = "fa-regular fa-circle-check";
            break;
        case "erro":
            icon.className = "fa-solid fa-triangle-exclamation";
            break;
        case "info":
            icon.className = "fa-solid fa-circle-info";
            break;
        default:
            icon.className = "fa-regular fa-comment";
    }

    // Define mensagem
    msg.textContent = mensagem;

    // Exibe e oculta com animação
    setTimeout(() => {
        toast.style.right = "0px";
        toast.style.opacity = "1";

        setTimeout(() => {
            toast.style.right = "-300px";
            toast.style.opacity = "0";
        }, 3000);
    }, 50);
}