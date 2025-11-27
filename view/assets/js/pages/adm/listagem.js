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
    