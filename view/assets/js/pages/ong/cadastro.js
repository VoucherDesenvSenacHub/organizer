iniciarEventos(25)

function proximo(indice) {
    const input = document.querySelectorAll('.inputBox > input');
    const select = document.querySelectorAll('.inputBox > select');
     
    if (indice == 1) {
        if (
            !validarCampo(input[0], 0, 'Digite o nome inteiro.', 5) ||
            !validarCampo(input[1], 1, 'Insira um número válido.', 15) ||
            !validarCampo(input[2], 2, 'Insira um CNPJ válido.', 18) ||
            !validarEmail(input[3], 3, 'Digite um email válido.')
        ) {
            check[0].classList.remove('input-valid');
            return false;
        }
        check[0].classList.add('input-valid');
        moverPara(indice, 25);
    }
    else if (indice == 2) {
        if (
            !validarCampo(document.querySelector('#descricao'), 4, 'Descrição deve ter mais de 30 caracteres.', 30)
        ) {
            check[1].classList.remove('input-valid');
            return false;
        }
        check[1].classList.add('input-valid');
        moverPara(indice, 25);
    }
    else if (indice == 3) {
        if (
            !validarCampo(input[4], 5, 'Digite um CEP válido.', 8) ||
            !validarCampo(input[5], 6, 'Digite sua rua.', 5) ||
            !validarCampo(input[6], 7, 'Digite seu bairro.', 5) ||
            !validarCampo(input[7], 8, 'Digite sua cidade.', 5)
        ) {
            check[2].classList.remove('input-valid');
            return false;
        }
        check[2].classList.add('input-valid');
        moverPara(indice, 25);
    }
    // else if (indice == 4) {
    //     if (
    //         !validarCampo(input[8], 9, 'Digite o nome completo do responsável.', 8) ||
    //         !validarCampo(input[9], 10, 'Digite um CPF válido.', 14) ||
    //         !validarCampo(input[10], 11, 'Digite um telefone válido.', 15) ||
    //         !validarEmail(input[11], 12, 'Digite um email válido.')
    //     ) {
    //         check[3].classList.remove('input-valid');
    //         return false;
    //     }
    //     check[3].classList.add('input-valid');
    //     moverPara(indice, 16);
    // }
    else if (indice == 4) {
        if (
            // !validarCampo(input[8], 9, 'Digite a agência corretamente.', 6) ||
            // !validarCampo(input[9], 10, 'Escolha o tipo de Conta.') ||
            !validarSelect(select[0], 9, 'Escolha um banco.') ||
            !validarSelect(select[1], 10, 'Escolha o tipo da conta.') ||
            !validarCampo(input[8], 11, 'Digite a agência corretamente.', 6) ||
            !validarCampo(input[9], 12, 'Digite a conta corretamente.', 8)
        ) {
            check[3].classList.remove('input-valid');
            return false;
        }
        check[3].classList.add('input-valid');
        // moverPara(indice, 16);
        cadastrar_ong()
        return true;
    }
    // else if (indice == 6) {
    //     if (
    //         !validarEmail(input[16], 17, 'Digite um email válido.') ||
    //         !validarCampo(input[17], 18, 'Insira a senha entre 8-20 caracteres.', 8) ||
    //         !validarSenha(input[17], input[18], 19, 'As senhas não coincidem.')
    //     ) {
    //         check[5].classList.remove('input-valid');
    //         return false;
    //     }
    //     check[5].classList.add('input-valid');
    //     cadastrar_ong()
    //     return true;
    // }
}

function cadastrar_ong() {
    sessionStorage.setItem("cadastro_sucesso", "true");
    window.location.href = "login.php";
}

$("#form").submit(function(event) {
    // Remover máscara dos campos antes de enviar
    $("#telefone").unmask();
    $("#cnpj").unmask();
});