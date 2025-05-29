// Função para abrir popup
function abrir_popup(id) {
    const popup = document.getElementById(id);
    if (popup) {
        popup.style.display = 'flex';
        document.body.style.overflow = 'hidden'; // Impede rolagem da página enquanto popup está aberto
    }
}

// Função para fechar popup
function fechar_popup(id) {
    const popup = document.getElementById(id);
    if (popup) {
        popup.style.display = 'none';
        document.body.style.overflow = 'auto'; // Restaura rolagem da página
    }
}

// Adicionar evento para fechar popups ao clicar fora deles
document.addEventListener('DOMContentLoaded', () => {
    // Código existente do DOMContentLoaded
    const inputTexto = document.querySelector('#input-value input[type="number"]');
    const radioOutroValor = document.querySelector('#input-value input[type="radio"]');

    inputTexto.addEventListener('focus', () => {
        radioOutroValor.checked = true;
        // opcional: disparar evento de change, se precisar
        radioOutroValor.dispatchEvent(new Event('change'));
    });

    let btns = document.querySelectorAll('#btns-group .icon-title');
    let container = document.querySelectorAll('.container-painel');
    const div = document.querySelector('#control-painel');

    if (btns.length > 0 && container.length > 0 && div) {
        // Definir a altura inicial do painel com o primeiro container
        let alturaInicial = container[0].offsetHeight;
        div.style.height = `${alturaInicial}px`; // Ajusta a altura na carga da página

        // Configuração de clique nos botões
        btns.forEach((item, index) => {
            item.addEventListener('click', () => {
                // Remove a classe 'active' de todos os botões e containers
                btns.forEach(i => i.classList.remove('active'));
                container.forEach(i => i.classList.remove('active'));

                // Adiciona 'active' ao item clicado e ao container correspondente
                item.classList.add('active');
                container[index].classList.add('active');

                // Atualiza a altura da div e o valor de 'transform' no clique
                let altura = container[index].offsetHeight;
                let tamanho = div.offsetWidth + 10;
                div.style.transform = `translate(-${tamanho * index}px)`;
                div.style.height = `${altura}px`;
            });
        });
    }

    // Adicionar evento para fechar popups quando clicar fora deles
    const popups = document.querySelectorAll('.popup');
    popups.forEach(popup => {
        popup.addEventListener('click', (e) => {
            if (e.target === popup) {
                popup.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
    });
});

// CARROSSEL
// Código existente do carrossel
let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;

function changeSlide() {
    currentIndex = (currentIndex + 1) % totalItems;
    const offset = -currentIndex * 410;

    document.querySelector('#carousel-imgs').style.transform = `translateX(${offset}px)`;
}

setInterval(changeSlide, 2500);

// Abrir carrossel grande
if (window.innerWidth > 700) {
    const carouselImgs = document.getElementById("carousel-imgs");
    if (carouselImgs) {
        carouselImgs.addEventListener("click", function () {
            abrir_popup('carousel-popup');
        });
    }
}

let Indexbig = 0;
const itemsBig = document.querySelectorAll('.carousel-item-big');
const totalItemsBig = itemsBig.length;

function changeSlideBig() {
    Indexbig = (Indexbig + 1) % totalItemsBig;
    const offset = -Indexbig * 610;

    document.querySelector('#carousel-big-imgs').style.transform = `translateX(${offset}px)`;
}

setInterval(changeSlideBig, 2500);

// UPLOAD DE FOTOS NO CADASTRO - (SÓ PODE ENVIAR 5 IMAGENS)

document.getElementById('fotos').addEventListener('change', function () {
    let qt_img = document.getElementById('qt-img');
    qt_img.innerText = `${this.files.length}/5`;
    if (this.files.length > 5) {
        alert('Você só pode enviar no máximo 5 arquivos!');
        qt_img.innerText = `0/5`;
        this.value = '';
    }
});



function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

function verificarMensagem() {
    const mensagem = getQueryParam('msg');

    if (mensagem === 'sucesso') {
        mostrar_toast("toast-projeto");
    }
    else if (mensagem === 'erro') {
        mostrar_toast("toast-projeto-erro");
    }
    else if (mensagem === 'doacao') {
        mostrar_toast("toast-doacao-sucesso");
    }
}

window.onload = function () {
    verificarMensagem();
};
