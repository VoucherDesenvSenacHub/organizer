document.getElementById('imagens').addEventListener('change', function () {
  let qt_img = document.getElementById('qt-img');
  qt_img.innerText = `${this.files.length}/5`;
  if (this.files.length > 5) {
    alert('Você só pode enviar no máximo 5 arquivos!');
    qt_img.innerText = `0/5`;
    this.value = '';
  }
});