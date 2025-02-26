

// !!!!! COPIAR ESSA PARTE ABAIXO

// NAV-BAR MOBILE
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

function asidebar(){
    let aside = document.getElementById("aside");
    aside.style.right= "0px"
}

function fechar_aside(){
    let aside = document.getElementById("aside");
    aside.style.right= "-200px"
}
// ============== ATÉ AQUI===============











// EFEITO POUP

function loginPopup() {
    const fundoPopup = document.getElementById('fundo-popup');
    fundoPopup.classList.add('ativo');

    fundoPopup.addEventListener('click', (event) => {
        if (event.target === fundoPopup) {
            fundoPopup.classList.remove('ativo');
        }
    });
}
