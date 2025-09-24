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
            !validarCampo(input[0], 0, 'Digite seu nome completo.', 5) ||
            !validarCampo(input[1], 1, 'Insira um número válido.', 16) ||
            !validarCampo(input[2], 2, 'Insira um CPF válido.', 14) ||
            !validarCampo(input[3], 3, 'Insira uma data.')
        ) {
            moverPara(0, 0);
            check[0].classList.remove('input-valid')
            return false;
        }

        if (
            !validarEmail(input[4], 4, 'Digite um email válido.') ||
            !validarCampo(input[5], 5, 'Insira a senha entre 8-20 caracteres.', 8) ||
            !validarSenha(input[5], input[6], 6, 'As senhas não coincidem.')
        ) {
            check[1].classList.remove('input-valid');
            return false;
        }

        check[1].classList.add('input-valid');
        return true;
    }

}

// Remover máscara dos campos antes de enviar
$("#form").submit(function (event) {
    $("#telefone").unmask();
    $("#cpf").unmask();
    $("#num_cartao").unmask();
    $("#code_cartao").unmask();
});