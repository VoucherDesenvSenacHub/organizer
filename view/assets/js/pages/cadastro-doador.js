iniciarEventos(50)

function proximo(indice) {
    const input = document.querySelectorAll('.inputBox > input');

    if (indice == 1) {
        if (
            !validarCampo(input[0], 0, 'Digite seu nome completo.', 5) ||
            !validarCampo(input[1], 1, 'Insira um número válido.', 16) ||
            !validarCampo(input[2], 2, 'Insira um CPF válido.', 14) ||
            !validarCampo(input[3], 3, 'Insira uma data.')
        ) {
            check[0].classList.remove('input-valid')
            return false;
        }
        check[0].classList.add('input-valid')
        moverPara(indice, 50);
    }
    else if (indice == 2) {
        if (
            !validarEmail(input[4], 4, 'Digite um email válido.') ||
            !validarCampo(input[5], 5, 'Insira a senha entre 8-20 caracteres.', 8) ||
            !validarSenha(input[5], input[6], 6, 'As senhas não coincidem.')
        ) {
            check[1].classList.remove('input-valid');
            return false;
        }
        check[1].classList.add('input-valid');
        // cadastrar_doador()
        return true;
    }
}

$("#form").submit(function(event) {
    // Remover máscara dos campos antes de enviar
    $("#telefone").unmask();
    $("#cpf").unmask();
    $("#num_cartao").unmask();
    $("#code_cartao").unmask();
});

function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

function verificarMensagem() {
    const mensagem = getQueryParam('cadastro');

    if (mensagem === 'erro') {
        mostrar_toast("toast-cadastro-erro");
    }
}

window.onload = function () {
    verificarMensagem();
};

// function cadastrar_doador() {
//     sessionStorage.setItem("cadastro_sucesso", "true");
//     window.location.href = "login.php";
// }
