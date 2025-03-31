iniciarEventos(33.3)

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
        moverPara(indice, 33.3);
    }
    else if (indice == 2) {
        if (
            !validarCampo(input[4], 4, 'Digite o nome do titular.', 5) ||
            !validarCampo(input[5], 5, 'Insira um número válido.', 19) ||
            !validarCampo(input[6], 6, 'Insira uma data.') ||
            !validarCampo(input[7], 7, 'Digite o CVV corretamente', 3)
        ) {
            check[1].classList.remove('input-valid');
            return false;
        }
        check[1].classList.add('input-valid');
        moverPara(indice, 33.3);
    }
    else if (indice == 3) {
        if (
            !validarEmail(input[8], 8, 'Digite um email válido.') ||
            !validarCampo(input[9], 9, 'Insira a senha entre 8-20 caracteres.', 8) ||
            !validarSenha(input[9], input[10], 10, 'As senhas não coincidem.')
        ) {
            check[2].classList.remove('input-valid');
            return false;
        }
        check[2].classList.add('input-valid');
        cadastrar_doador()
        return true;
    }
}

function cadastrar_doador() {
    sessionStorage.setItem("cadastro_sucesso", "true");
    window.location.href = "login.php";
}
