document.getElementById('fotos').addEventListener('change', function () {
  let qt_img = document.getElementById('qt-img');
  qt_img.innerText = `${this.files.length}/5`;
  if (this.files.length > 5) {
    alert('Você só pode enviar no máximo 5 arquivos!');
    qt_img.innerText = `0/5`;
    this.value = '';
  }
});

function getQueryParam(param) {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get(param);
}

function verificarMensagem() {
  const mensagem = getQueryParam('msg');

  if (mensagem === 'sucesso') {
    mostrar_toast("toast-projeto");
  }
  else if (mensagem === 'erro') {
    mostrar_toast("toast-projeto-erro");
  }
}

window.onload = function () {
  verificarMensagem();
};