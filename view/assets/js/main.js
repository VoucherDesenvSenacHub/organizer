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
function slider(){
    contador++;
    if (contador > 4) {
        contador=0;
    }
    box.style.transform = `translateX(${-contador * slideWidth}px)`;
}

function editarNoticia() {
    let principal = document.querySelector('#principal');
    let edicao = document.querySelector('#pagina-edicao');
    principal.style.display = 'none';
    edicao.style.display = 'flex';
}

function popConclusao(tipo) {
    let janela = document.querySelector('#pop-conclusao');
    let icone = document.querySelector('#icone-conclusao');
    let texto = document.querySelector('#texto-conclusao');
    janela.style.display = 'block';
    if(tipo == 'edicao'){
        icone.setAttribute('src', '../assets/images/edit-popup.png');
        janela.style.color = '#FFCC00'
        texto.innerHTML = 'Notícia Alterada';
    }else if(tipo == 'delete'){
        icone.setAttribute('src', '../assets/images/delete-popup.png');
        janela.style.color = '#E64545'
        texto.innerHTML = 'Notícia Removida';
    }
    setTimeout(() => {
        janela.style.display = 'none';
    }, 3000);
}

const box = document.querySelector(".fotos-slide");

let contador = 0;
let tela = window.innerWidth;
let slideWidth = 0;
if(tela <= 481){
    slideWidth = 200;
}else{
    slideWidth = 1016;
}
setInterval (slider, 2000);

