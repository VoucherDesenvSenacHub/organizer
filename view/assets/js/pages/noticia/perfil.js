let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;
const divNoticia = document.querySelector('#carousel-imgs');

function changeSlide() {
    // Recalcular a largura atual da div
    const larguraAtual = divNoticia.getBoundingClientRect().width + 30;

    currentIndex = (currentIndex + 1) % totalItems;
    const offset = -currentIndex * larguraAtual;

    divNoticia.style.transform = `translateX(${offset}px)`;
}

setInterval(changeSlide, 2500);

// Atualizar o slide atual ao redimensionar a janela
window.addEventListener('resize', () => {
    // Opcional: reposiciona o slide atual na nova largura
    const larguraAtual = divNoticia.getBoundingClientRect().width + 30;
    const offset = -currentIndex * larguraAtual;
    divNoticia.style.transform = `translateX(${offset}px)`;
});

// Ativar os toast com base nos parametros
window.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const upd = params.get('upd');

    if (upd === 'sucesso') {
        mostrar_toast('toast-noticia');
    } else if (upd === 'erro') {
        mostrar_toast('toast-noticia-erro');
    }
});