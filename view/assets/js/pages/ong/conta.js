// Ativar os toast com base nos parametros
window.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const upd = params.get('upd');

    if (upd === 'sucesso') {
        mostrar_toast('toast-ong-sucesso');
    } else if (upd === 'erro') {
        mostrar_toast('toast-ong-erro');
    }
});

// Remover máscara dos campos antes de enviar
$("#form").submit(function(event) {
    $("#telefone").unmask();
    $("#cnpj").unmask();
});


const inputLogo = document.getElementById('logo_url');
const previewImg = document.getElementById('preview-logo');

inputLogo.addEventListener('change', function() {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();

    reader.addEventListener('load', function() {
      previewImg.setAttribute('src', this.result);
    });

    reader.readAsDataURL(file);
  }
});
