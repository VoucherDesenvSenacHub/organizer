const openPopup = document.getElementById('btn-login');
const fundoPopup = document.getElementById('fundo-popup');

openPopup.addEventListener('click', () => {
    fundoPopup.classList.add('ativo');
});

fundoPopup.addEventListener('click', (event) => {
    if (event.target === fundoPopup) {
        fundoPopup.classList.remove('ativo');
    }
});

function mudaMenu() {
    let hbgMenu = document.querySelector('#hamburger-menu');
    let btnHamburger = document.querySelector("#botao-hamburger");
    hbgMenu.style.display = 'flex';
    hbgMenu.id = 'hamburger-menu-slide';
    btnHamburger.style.opacity = 0;
}