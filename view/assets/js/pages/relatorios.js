function clicar() {
    let animacao = document.getElementById ("download")
    animacao.style.display = 'flex'
    setTimeout(function() {
        animacao.style.display = 'none'
      }, 2500);
}

function loginPopup() {
  const fundoPopup = document.getElementById('fundo-popup');
  fundoPopup.classList.add('ativo');

}

function tamanhoGraficos() {
  let tela = window.innerWidth;
  let width = 600;
  let height = 320;
  if(tela < 700){
    width = 200;
    height = 150;
  }else{
    width = 600;
    height = 320;
  }
  let largura = document.getElementById("largura");
  let altura = document.getElementById("altura");
  largura.value = width;
  altura.value = height;
  document.getElementById("capturar-tamanho-tela").submit();
}

window.onload = tamanhoGraficos();
