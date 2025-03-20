function mudaMenu() {
    let hbgMenu = document.querySelector('#hamburger-menu');
    let btnHamburger = document.querySelector("#botao-hamburger");
    hbgMenu.style.display = 'flex';
    hbgMenu.id = 'hamburger-menu-slide';
    btnHamburger.style.opacity = 0;
}

// Link para card direta do cadastro
function targetPage(target, actual){
    let cards = ['cadastro', 'atuacao', 'endereco','responsavel','dados-bancarios','criar-login'];
    if(target>actual){
        for(let i=actual; i<target; i++){
            mudaPagina(cards[i], false);
        }
    }
    if(target<actual){
        for(let i=actual; i>=target; i--){
            mudaPagina(cards[i], true);
        }
    }
}

// Virar páginas gerais do cadastro
function mudaPagina(p, action) {
    let pagina = document.getElementById(p);
    // action ? pagina.style.display = "flex" : pagina.style.display = "none";
    if (!action){
        pagina.style.animation = "vira-pagina 1s forwards";
    }else {
        pagina.style.animation = "volta-pagina 1s forwards";
    }
}

// Exibe e oculta senha digitada

function showHide(campo, id){
    const senha = document.getElementById(campo);
    const icone = document.getElementById(id);
    if(senha.type === 'password'){
        senha.type = 'text';
        icone.innerHTML = 'visibility_off';
    }else {
        senha.type = 'password';
        icone.innerHTML = 'visibility';
    }
}

function esqueciSenha(status) {
    let painelSenha = document.querySelector('#password-recovery');
    if(status){
        painelSenha.style.display = 'flex';
    }else {
        painelSenha.style.display = 'none';
    }
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
        icone.setAttribute('src', '../../assets/images/edit-popup.png');
        janela.style.color = '#FFCC00'
        texto.innerHTML = 'Notícia Alterada';
    }else if(tipo == 'delete'){
        icone.setAttribute('src', '../../assets/images/delete-popup.png');
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

