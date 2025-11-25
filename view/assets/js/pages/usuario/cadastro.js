iniciarEventos(33)

function proximo(indice) {
    const input = document.querySelectorAll('.inputBox > input');

    if (indice == 1) {
        if (
            !validarCampo(input[0], 0, 'Digite seu nome completo.', 5) ||
            !validarCampo(input[1], 1, 'Insira um número válido.', 15) ||
            !validarCampo(input[2], 2, 'Insira um CPF válido.', 14) ||
            !validarCampo(input[3], 3, 'Insira uma data.')
        ) {
            check[0].classList.remove('input-valid')
            return false;
        }
        check[0].classList.add('input-valid')
        moverPara(indice, 33);
    }
    else if (indice == 2) {
        if (
            !validarCampo(input[4], 4, 'Digite um CEP válido.', 9) ||
            !validarCampo(input[5], 5, 'Digite sua rua.', 5) ||
            !validarCampo(input[6], 6, 'Obrigatório.', 1) ||

            !validarCampo(input[7], 7, 'Digite seu bairro.', 5) ||
            !validarCampo(input[8], 8, 'Digite sua cidade.', 5) ||
            !validarCampo(input[9], 9, 'Digite seu estado.', 2)
        ) {
            check[1].classList.remove('input-valid');
            return false;
        }
        check[1].classList.add('input-valid');
        moverPara(indice, 33);
    }
    else if (indice === 3) {
        // VALIDAR TODOS OS CAMPOS ANTERIORES
        if (
            !validarCampo(input[0], 0, 'Digite seu nome completo.', 5) ||
            !validarCampo(input[1], 1, 'Insira um número válido.', 15) ||
            !validarCampo(input[2], 2, 'Insira um CPF válido.', 14) ||
            !validarCampo(input[3], 3, 'Insira uma data.')
        ) {
            check[0].classList.remove('input-valid')
            moverPara(0, 33);
            return false;
        }

        if (
            !validarCampo(input[4], 4, 'Digite um CEP válido.', 9) ||
            !validarCampo(input[5], 5, 'Digite sua rua.', 5) ||
            !validarCampo(input[6], 6, 'Obrigatório.', 1) ||

            !validarCampo(input[7], 7, 'Digite seu bairro.', 5) ||
            !validarCampo(input[8], 8, 'Digite sua cidade.', 5) ||
            !validarCampo(input[9], 9, 'Digite seu estado.', 2)
        ) {
            check[1].classList.remove('input-valid');
            moverPara(1, 33);
            return false;
        }

        if (
            !validarEmail(input[4], 4, 'Digite um email válido.') ||
            !validarCampo(input[5], 5, 'Insira a senha entre 8-20 caracteres.', 8) ||
            !validarSenha(input[5], input[6], 6, 'As senhas não coincidem.')
        ) {
            moverPara(1, 33);
            check[1].classList.remove('input-valid');
            return false;
        }

        check[0].classList.add('input-valid');
        check[1].classList.add('input-valid');
        check[2].classList.add('input-valid');

        return true;
    }
}