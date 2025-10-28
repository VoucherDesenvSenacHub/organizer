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

    document.addEventListener("DOMContentLoaded", () => {
        const formFiltros = document.getElementById("form-filtros");
        const btnLimpar = document.querySelector(".limpar-filtro");
        const inputPesquisa = formFiltros.querySelector("input[name='pesquisa']");
        const radios = formFiltros.querySelectorAll("input[type='radio']");
        const spinner = document.getElementById("spinner");
    
        btnLimpar.addEventListener("click", (e) => {
            e.preventDefault();
    
            // Limpa todos os radios
            radios.forEach(radio => radio.checked = false);
    
            // Limpa o campo de pesquisa
            inputPesquisa.value = "";
    
            // Adiciona uma classe de animação (exemplo: botão pisca)
            btnLimpar.classList.add("limpando");
    
            // Mostra o spinner (caso queira um feedback visual)
            spinner.style.display = "block";
    
            // Espera 0.8s antes de recarregar a página
            setTimeout(() => {
                location.reload();
            }, 800);
        });
    });
    
    });



