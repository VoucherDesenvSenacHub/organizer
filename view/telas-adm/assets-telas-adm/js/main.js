function menu_mobile() {
    const nav_bar = document.getElementById('nav-bar');
    const hamburguer = document.getElementById('hamburguer');
    nav_bar.classList.toggle('active');
    hamburguer.classList.toggle('active');
}

window.addEventListener('resize', () => {
    const nav_bar = document.getElementById('nav-bar');
    const hamburguer = document.getElementById('hamburguer');
    if (window.innerWidth > 700 && nav_bar.classList.contains('active')) {
        nav_bar.classList.remove('active');
        hamburguer.classList.remove('active');
    }
});

function loginPopup() {
    const fundoPopup = document.getElementById('login-popup');
    const btnNao = document.getElementById('btn-nao')
    fundoPopup.classList.add('ativo');

    fundoPopup.addEventListener('click', (event) => {
        if (event.target === fundoPopup) {
            fundoPopup.classList.remove('ativo');
        }
    });

    fundoPopup.addEventListener('click', (event) => {
        if (event.target === btnNao) {
            fundoPopup.classList.remove('ativo');
        }
    });
}

function blockpopup() {
    const fundoPopupBlock = document.getElementById('login-popup');
    const fundoPopup = document.getElementById('block-popup')
    fundoPopup.classList.add('ativo');

    fundoPopup.addEventListener('click', (event) => {
        if (event.target === fundoPopup) {
            fundoPopupBlock.classList.remove('ativo');
            fundoPopup.classList.remove('ativo');
        }
    });
}
