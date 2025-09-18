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

document.addEventListener("DOMContentLoaded", () => {
    const drop = document.querySelector("#form-filtro .drop");
    const dropTitle = drop.querySelector(".drop-title");
    const dropMenu = drop.querySelector(".drop-menu");
    const hiddenInput = document.querySelector("#status-hidden");
    const formFiltro = document.querySelector("#form-filtro");

    dropTitle.addEventListener("click", () => {
        drop.classList.toggle("open");
    });

    document.addEventListener("click", (e) => {
        if (!drop.contains(e.target)) {
            drop.classList.remove("open");
        }
    });

    dropMenu.querySelectorAll(".item").forEach(item => {
        item.addEventListener("click", () => {
            hiddenInput.value = item.dataset.value;
            formFiltro.submit();
        });
    });
});
