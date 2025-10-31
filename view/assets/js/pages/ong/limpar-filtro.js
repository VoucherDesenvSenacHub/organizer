document.addEventListener("DOMContentLoaded", () => {
    const formFiltros = document.getElementById("form-filtros");
    const btnLimpar = document.querySelector(".limpar-filtro");
    const inputPesquisa = formFiltros.querySelector("input[name='pesquisa']");
    const radios = formFiltros.querySelectorAll("input[type='radio']");
    const spinner = document.getElementById("spinner");

    btnLimpar.addEventListener("click", (e) => {
        e.preventDefault();

        // Verifica se há algo digitado ou algum radio selecionado
        const algoDigitado = inputPesquisa.value.trim() !== "";
        const algumSelecionado = Array.from(radios).some(radio => radio.checked);

        if (!algoDigitado && !algumSelecionado) {
            // Nenhum filtro ativo → não faz nada
            return;
        }

        // Se houver algo, limpa tudo normalmente
        radios.forEach(radio => radio.checked = false);
        inputPesquisa.value = "";

        btnLimpar.classList.add("limpando");
        spinner.style.display = "block";

        setTimeout(() => {
            location.reload();
        }, 800);
    });
});
