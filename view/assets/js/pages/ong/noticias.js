// UPLOAD DE FOTOS NO CADASTRO - (SÓ PODE ENVIAR 5 IMAGENS)
const fotosInput = document.getElementById('fotos');
const qtImg = document.getElementById('qt-img');

if (fotosInput && qtImg) {
    fotosInput.addEventListener('change', function () {
        qtImg.innerText = `${this.files.length}/5`;
        if (this.files.length > 5) {
            alert('Você só pode enviar no máximo 5 arquivos!');
            qtImg.innerText = `0/5`;
            this.value = '';
        }
    });
}

// Ativar os toast com base nos parametros
window.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const msg = params.get('msg');

    if (msg === 'sucesso') {
        mostrar_toast('toast-noticia');
    } else if (msg === 'erro') {
        mostrar_toast('toast-noticia-erro');
    }
});