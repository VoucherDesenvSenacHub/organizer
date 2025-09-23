const cards = document.querySelector('#control-box');
const btn = document.querySelector('#buttons')
let box = document.querySelectorAll('.box-ongs');

function definirAbaInicial(index) {
    const altura = box[index].offsetHeight;
    const deslocamento = index * (cards.offsetWidth + 30);
    cards.style.transform = `translateX(-${deslocamento}px)`;
    cards.style.height = `${altura}px`;
    cards.style.transition = 'none'; // Remove transição para posicionamento inicial
    
    // Remove transição do pseudo-elemento ::after dos botões
    const style = document.createElement('style');
    style.textContent = '#buttons::after { transition: none !important; }';
    document.head.appendChild(style);
    
    // Define estado visual dos botões sem animação
    if (index == 1) {
        btn.classList.add('active');
    } else {
        btn.classList.remove('active');
    }
    
    // Restaura as transições após um pequeno delay
    setTimeout(() => {
        cards.style.transition = '';
        document.head.removeChild(style);
    }, 50);
}

function trocarAba(index) {
    const altura = box[index].offsetHeight;
    const deslocamento = index * (cards.offsetWidth + 30);
    cards.style.transform = `translateX(-${deslocamento}px)`;
    cards.style.height = `${altura}px`;
    index == 1 ? btn.classList.add('active') : btn.classList.remove('active');
}