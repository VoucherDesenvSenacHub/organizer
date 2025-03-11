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

function meu_perfil(){
    let perfil = document.getElementById("perfil");
    perfil.style.right= "-2000px"
}