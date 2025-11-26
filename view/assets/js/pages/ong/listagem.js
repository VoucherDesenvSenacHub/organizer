// === Limite de Upload de Imagens ===
document.addEventListener("DOMContentLoaded", () => {
    const imagensInput = document.getElementById('imagens') || document.getElementById('fotos');
    const qtImg = document.getElementById('qt-img');

    if (imagensInput && qtImg) {
        imagensInput.addEventListener('change', function () {
            const total = this.files.length;
            qtImg.innerText = `${total}/5`;

            if (total > 5) {
                alert('Você só pode enviar no máximo 5 arquivos!');
                qtImg.innerText = `0/5`;
                this.value = '';
            }
        });
    }

    // === Dropdown Filtro ===
    const drop = document.querySelector("#form-filtro .drop");
    if (drop) {
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
                if (hiddenInput && formFiltro) {
                    hiddenInput.value = item.dataset.value;
                    formFiltro.submit();
                }
            });
        });
    }
});

<<<<<<< HEAD
document.querySelectorAll('.drop').forEach(drop => {

    const title = drop.querySelector('.drop-title');
    const menu = drop.querySelector('.drop-menu');

    // ABRIR AO PASSAR O MOUSE
    drop.addEventListener('mouseenter', () => {
        drop.classList.add('open');
    });

    // FECHAR AO SAIR DO MOUSE
    drop.addEventListener('mouseleave', () => {
        drop.classList.remove('open');
    });

    // FECHA AO CLICAR FORA (mantido)
    document.addEventListener('click', (e) => {
        if (!drop.contains(e.target)) {
            drop.classList.remove('open');
        }
    });
});
=======


>>>>>>> 9a4731129de1a777f4c70b76be2e6ebe4a82f86a
