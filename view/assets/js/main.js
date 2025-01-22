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

const box = document.querySelector(".fotos-slide");
// const imagens = document.querySelectorAll(".fotos-slide img");

let contador = 0;
let tela = window.innerWidth;
let slideWidth = 0;
if(tela <= 481){
    slideWidth = 200;
}else{
    slideWidth = 1016;
}
function slider(){
    contador++;
    if (contador > 4) {
        contador=0;
    }
    box.style.transform = `translateX(${-contador * slideWidth}px)`;
}


setInterval (slider, 3000);