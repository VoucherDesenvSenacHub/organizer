document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("input").forEach(input => {
        input.addEventListener("keypress", function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
            }
        });
    });
});

const form = document.getElementById('form');

// Mover formulario ao clicar na bolinha
let circle_1 = document.getElementById('circle-1');
circle_1.addEventListener('click', (event) => {
    form.style.transform = `translateX(-0px)`;
    bolinha[0].classList.add('active');
    linha.style.width = '0%';
    bolinha[1].classList.remove('active');
    bolinha[2].classList.remove('active');
});

let circle_2 = document.getElementById('circle-2');
circle_2.addEventListener('click', (event) => {
    bolinha[1].classList.add('active');
    linha.style.width = '33%';
    bolinha[0].classList.remove('active');
    bolinha[2].classList.remove('active');
    if (window.innerWidth > 750) {
        form.style.transform = `translateX(-660px)`;
    }
    else {
        form.style.transform = `translateX(-330px)`;
    }
    
});

let circle_3 = document.getElementById('circle-3');
circle_3.addEventListener('click', (event) => {
    bolinha[2].classList.add('active')
    linha.style.width = '67%'
    bolinha[0].classList.remove('active');
    bolinha[1].classList.remove('active');
    if (window.innerWidth > 750) {
        form.style.transform = `translateX(-1320px)`;
    }
    else {
        form.style.transform = `translateX(-660px)`;
    }
    
});



const linha = document.getElementById('linhaAzul');
let visor = document.getElementsByClassName('visor');
let bolinha = document.getElementsByClassName('item');
let check = document.getElementsByClassName('circle');
const icon = '<i class="fas fa-exclamation-triangle"></i>';
let move = 0;
function proximo(x) {
    const largura = window.innerWidth;
    var deslocamento = largura > 750 ? 660 : 330;
    if (x == 1) {
        // Validar Nome
        let nome = document.getElementById('nome');
        if (nome.value == '') {
            visor[0].innerHTML = icon + 'Não deixe este campo vazio';
            nome.focus();
            return false;
        } else {
            visor[0].innerHTML = '';
        }
        // Validar Telefone
        let telefone = document.getElementById('telefone');
        if (telefone.value.length <= 9) {
            visor[1].innerHTML = icon + 'Digite seu número corretamente';
            telefone.focus();
            return false;
        } else {
            visor[1].innerHTML = '';
        }
        // Validar CPF
        let cpf = document.getElementById('cpf');
        if (cpf.value.length != 14) {
            visor[2].innerHTML = icon + 'CPF Inválido';
            // alert(cpf.value.length)
            cpf.focus();
            return false;
        } else {
            visor[2].innerHTML = '';
        }
        // Validar Data
        let data = document.getElementById('data');
        if (data.value == '') {
            visor[3].innerHTML = icon + 'Informe uma data';
            data.focus();
            return false;
        } else {
            visor[3].innerHTML = '';
            move += deslocamento;
            form.style.transform = `translateX(-${move}px)`;
            linha.style.width = '33%'
            bolinha[1].classList.add('active')
            check[0].style.color = 'aliceblue'
        }
    } else if (x == 2) {
        // Validar Nome Cartão
        let nome_cartao = document.getElementById('nome_cartao');
        if (nome_cartao.value == '') {
            visor[4].innerHTML = icon + 'Não deixe este campo vazio';
            nome_cartao.focus();
            return false;
        } else {
            visor[4].innerHTML = '';
        }
        // Validar Número Cartão
        let num_cartao = document.getElementById('num_cartao');
        if (num_cartao.value.length < 12) {
            visor[5].innerHTML = icon + 'Insira um número válido';
            num_cartao.focus();
            return false;
        } else {
            visor[5].innerHTML = '';
        }
        // Validar Data Cartão
        let data_cartao = document.getElementById('data_cartao');
        if (data_cartao.value == '') {
            visor[6].innerHTML = icon + 'Informe a data do cartão';
            data_cartao.focus();
            return false;
        } else {
            visor[6].innerHTML = '';
        }
        // Validar CVV Cartão
        let code_cartao = document.getElementById('code_cartao');
        if (code_cartao.value.length != 3) {
            visor[7].innerHTML = icon + 'Digite o CVV corretamente';
            code_cartao.focus();
            return false;
        } else {
            visor[7].innerHTML = '';
            move += deslocamento;
            form.style.transform = `translateX(-${move}px)`;
            linha.style.width = '67%'
            bolinha[2].classList.add('active')
            check[1].style.color = 'aliceblue'
        }
    } else if (x == 3) {
        // Validar Email
        let email = document.getElementById('email');
        if (email.value.length < 7) {
            visor[8].innerHTML = icon + 'Digite o email corretamente';
            email.focus();
            return false;
        } else {
            visor[8].innerHTML = '';
        }
        // Validar Senha
        let senha = document.getElementById('senha');
        if (senha.value.length < 8 || senha.value.length > 20) {
            visor[9].innerHTML = icon + 'Insira a senha entre 8-20 caracteres';
            senha.focus();
            return false;
        } else {
            visor[9].innerHTML = '';
        }
        // Validar Outra Senha
        let confirm_senha = document.getElementById('confirm_senha');
        if (confirm_senha.value != senha.value) {
            visor[10].innerHTML = icon + 'As senhas não coincidem';
            confirm_senha.focus();
            return false;
        } else {
            visor[10].innerHTML = '';
            check[2].style.color = 'aliceblue'
        }
    }
}

function voltar(x) {
    if (x == 1) {
        form.style.transform = 'translateX(0)';
        move = 0
        linha.style.width = '0%'
        bolinha[1].classList.remove('active')
        check[0].style.color = 'transparent'
    } else if (x == 2) {
        const largura = window.innerWidth;
        move = largura > 750 ? 660 : 330
        form.style.transform = `translateX(-${move}px)`
        linha.style.width = '33%'
        bolinha[2].classList.remove('active')
        check[1].style.color = 'transparent'
    }
}