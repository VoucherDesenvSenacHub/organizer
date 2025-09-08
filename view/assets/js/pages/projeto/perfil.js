document.addEventListener('DOMContentLoaded', () => {
    const inputTexto = document.querySelector('#input-value input[type="number"]');
    const radioOutroValor = document.querySelector('#input-value input[type="radio"]');

    if (inputTexto && radioOutroValor) {
        inputTexto.addEventListener('focus', () => {
            radioOutroValor.checked = true;
            radioOutroValor.dispatchEvent(new Event('change'));
        });
    }

    let btns = document.querySelectorAll('#btns-group .icon-title');
    let container = document.querySelectorAll('.container-painel');
    const div = document.querySelector('#control-painel');

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

            // Atualiza a altura da div e o valor de 'transform' no clique
            let altura = container[index].offsetHeight;
            let tamanho = div.offsetWidth + 10;
            div.style.transform = `translate(-${tamanho * index}px)`;
            div.style.height = `${altura}px`;
        });
    });
});


// CARROSSEL

//Carousel//

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
    document.getElementById("carousel-imgs").addEventListener("click", function () {
        abrir_popup('carousel-popup');
    });
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
const fotosInput = document.getElementById('fotos');
const qtImg = document.getElementById('qt-img');

if (fotosInput && qtImg) {
    fotosInput.addEventListener('change', function () {
        qtImg.innerText = `${this.files.length}/5`;
        if (this.files.length > 5) {
            alert('Você só pode enviar no máximo 5 arquivos!');
            qtImg.innerText = `0/5`;
            this.value = '';
        }
    });
}




// FINALIZAR O PROJETO

const outroMotivoRadio = document.getElementById('outro-motivo');
const boxMotivo = document.querySelector('.box-motivo');
const textareaMotivo = document.getElementById('motivo');
const radios = document.querySelectorAll('input[name="motivo-finalizar"]');

radios.forEach(radio => {
    radio.addEventListener('change', () => {
        if (outroMotivoRadio.checked) {
            boxMotivo.style.display = 'block';
            textareaMotivo.setAttribute('required', 'required');
        } else {
            boxMotivo.style.display = 'none';
            textareaMotivo.removeAttribute('required');
        }
    });
});
