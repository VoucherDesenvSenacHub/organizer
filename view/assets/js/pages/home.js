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
    aside.style.right= "-230px"
}

function meu_perfil() {
    const meuPerfil = document.getElementById('meu-perfil');
    meuPerfil.classList.add('ativo');

    meuPerfil.addEventListener('click', (event) => {
        if (event.target === meuPerfil) {
            meuPerfil.classList.remove('ativo');
        }
    });
}

function confirmacao(){
    const confirmacao = document.getElementById('fundo-confirmacao');
    confirmacao.classList.add('ativo');

    confirmacao.addEventListener('click', (event) => {
        if (event.target === confirmacao) {
            confirmacao.classList.remove('ativo');
        }
    });
}

function fechar_confirmacao(){
    const confirmacao = document.getElementById('fundo-confirmacao');
    confirmacao.classList.remove('ativo');
}