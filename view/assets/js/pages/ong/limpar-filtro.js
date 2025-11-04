document.addEventListener("DOMContentLoaded", () => {
    const formFiltros = document.getElementById("form-filtros");
    const btnLimpar = document.querySelector(".limpar-filtro");
    const inputPesquisa = formFiltros.querySelector("input[name='pesquisa']");
    const radios = formFiltros.querySelectorAll("input[type='radio']");
    const spinner = document.getElementById("spinner");

    function verificarFiltros() {
        const algoDigitado = inputPesquisa.value.trim() !== "";
        const algumSelecionado = Array.from(radios).some(radio => radio.checked);

        if (algoDigitado || algumSelecionado) {
            // Mostrar com animação
            btnLimpar.style.display = "inline-block";
            btnLimpar.classList.add("animar-entrada");

            // Remove a classe depois da animação pra poder reutilizar depois
            setTimeout(() => {
                btnLimpar.classList.remove("animar-entrada");
            }, 400);
        } else {
            // Oculta com transição suave
            btnLimpar.classList.add("animar-saida");
            setTimeout(() => {
                btnLimpar.style.display = "none";
                btnLimpar.classList.remove("animar-saida");
            }, 300);
        }
    }

    inputPesquisa.addEventListener("input", verificarFiltros);
    radios.forEach(radio => radio.addEventListener("change", verificarFiltros));

    verificarFiltros();

    btnLimpar.addEventListener("click", (e) => {
        e.preventDefault();

        const algoDigitado = inputPesquisa.value.trim() !== "";
        const algumSelecionado = Array.from(radios).some(radio => radio.checked);

        if (!algoDigitado && !algumSelecionado) return;

        radios.forEach(radio => radio.checked = false);
        inputPesquisa.value = "";

        btnLimpar.classList.add("limpando");
        spinner.style.display = "block";

        setTimeout(() => {
            location.reload();
        }, 800);
    });
});
