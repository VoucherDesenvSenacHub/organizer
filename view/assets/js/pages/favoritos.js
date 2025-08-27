const cards = document.querySelector('#control-box');
const btn = document.querySelector('#buttons')
let box = document.querySelectorAll('.box-ongs');

function trocarAba(index) {
    const altura = box[index].offsetHeight;
    const deslocamento = index * (cards.offsetWidth + 30);
    cards.style.transform = `translateX(-${deslocamento}px)`;
    cards.style.height = `${altura}px`;
    index == 1 ? btn.classList.add('active') : btn.classList.remove('active');
};

// Chama assim que a página carregar
window.addEventListener('DOMContentLoaded', () => {
    trocarAba(0);
});