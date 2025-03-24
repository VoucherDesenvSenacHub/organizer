document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("input").forEach(input => {
        input.addEventListener("keypress", function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
            }
        });
    });
});

const form = document.querySelector('#form');
const div_item = document.querySelectorAll(".item");
const linha = document.querySelector("#linhaAzul");
const check = document.querySelectorAll('.circle');
const visor = document.querySelectorAll('.visor');
const icon = '<i class="fas fa-exclamation-triangle"></i>';

// MOVER AO CLICAR NA BOLINHA
function iniciarEventos(style) {
    div_item.forEach((circle, index) => {
        circle.addEventListener("click", () => moverPara(index, style));
    });
}

// FUNÇÃO DE MOVER
function moverPara(indice, style) {
    const deslocamento = window.innerWidth > 750 ? 660 : 330;
    move = indice * deslocamento;
    form.style.transform = `translateX(-${move}px)`;
    linha.style.width = `${indice * style}%`;

    div_item.forEach((item, i) => {
        item.classList.toggle("active", i === indice);
    });
}

// VALIDAR OS INPUTS
function validarCampo(campo, indice, mensagem, tamanho) {
    if (!campo.value ||campo.value.length < tamanho) {
        visor[indice].innerHTML = `${icon} ${mensagem}`;
        campo.focus();
        return false;
    }
    visor[indice].innerHTML = '';
    return true;
}

function validarEmail(campo, indice, mensagem) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (!campo.value) {
        visor[indice].innerHTML = `${icon} O campo de email não pode estar vazio.`;
        campo.focus();
        return false;
    }
    if (!emailRegex.test(campo.value)) {
        visor[indice].innerHTML = `${icon} ${mensagem}`;
        campo.focus();
        return false;
    }
    visor[indice].innerHTML = '';
    return true;
}

function validarSenha(senha, outraSenha, indice, mensagem) {
    if (senha.value != outraSenha.value) {
        visor[indice].innerHTML = `${icon} ${mensagem}`;
        outraSenha.focus();
        return false;
    }
    visor[indice].innerHTML = '';
    return true;
}