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


// Inportar esse código da linha 17 até a linha 41 para que os gráficos funcionem em desktop e celular
function tamanhoGraficos() {
  load = true;
  let width = 600;
  let height = 320;
  if(tela < 700){
    width = 240;
    height = 160;
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
var tela = window.innerWidth;
if(!load){
  tamanhoGraficos();
}
window.addEventListener('resize', function(){
  tela = window.innerWidth;
  tamanhoGraficos();
})
