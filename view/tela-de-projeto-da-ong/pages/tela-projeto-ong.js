// Animação de slides e paginação de forma independente de cada slide
document.addEventListener('DOMContentLoaded', () => {
    let slides = document.querySelectorAll('.slide');
    let btns = document.querySelectorAll('.btns-slider button');
    let indexCorreto = 0;

    function showSlide(index) {
        slides[indexCorreto].classList.remove('active');
        btns[indexCorreto].classList.remove('active');
        indexCorreto = index;
        slides[indexCorreto].classList.add('active');
        btns[indexCorreto].classList.add('active');
    }

    btns.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            showSlide(index);
        });
    });

    function paginacao(index) {
        let activeSlide = slides[indexCorreto];
        let activePaginaBtns = activeSlide.querySelectorAll('.pagina-button');
        activePaginaBtns.forEach((btn, btnIndex) => {
            btn.classList.remove('active');
            if (btnIndex === index) {
                btn.classList.add('active');
            }
        });
    }

    slides.forEach((slide, slideIndex) => {
        let paginaBtns = slide.querySelectorAll('.pagina-button');
        paginaBtns.forEach((btn, btnIndex) => {
            btn.addEventListener('click', () => {
                if (slide.classList.contains('active')) {
                    paginacao(btnIndex);
                }
            });
        });
    });

    showSlide(0);
});
function mudaMenu() {
    let hbgMenu = document.querySelector('#hamburger-menu');
    let btnHamburger = document.querySelector("#botao-hamburger");
    hbgMenu.style.display = 'flex';
    hbgMenu.id = 'hamburger-menu-slide';
    btnHamburger.style.opacity = 0;
}


function esqueciSenha() {
    let painelSenha = document.querySelector('#password-recovery');
    painelSenha.style.display = 'flex';
}

//Carousel//

let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;

function changeSlide() {
    currentIndex = (currentIndex + 1) % totalItems;
    const offset = -currentIndex * 100;

    document.querySelector('.carousel-imgs').style.transform = `translateX(${offset}%)`; // Corrigido aqui
}

setInterval(changeSlide, 3000);

//fim carousel//