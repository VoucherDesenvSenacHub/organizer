document.addEventListener("DOMContentLoaded", () => {
    const formFiltros = document.getElementById("form-filtros");
    const btnLimpar = document.querySelector(".limpar-filtro");
    const inputPesquisa = formFiltros.querySelector("input[name='pesquisa']");
    const radios = formFiltros.querySelectorAll("input[type='radio']");
    const spinner = document.getElementById("spinner");

    btnLimpar.addEventListener("click", (e) => {
        e.preventDefault();

        // Verifica se há algum filtro selecionado ou pesquisa digitada
        const algumFiltroAtivo = Array.from(radios).some(radio => radio.checked);
        const pesquisaPreenchida = inputPesquisa.value.trim() !== "";

        // Só limpa se houver filtro ou texto
        if (algumFiltroAtivo || pesquisaPreenchida) {
            radios.forEach(radio => radio.checked = false);
            inputPesquisa.value = "";

            btnLimpar.classList.add("limpando");
            spinner.style.display = "block";

            setTimeout(() => {
                location.reload();
            }, 800);
        } else {
            // Mostra um aviso rápido (opcional)
            btnLimpar.classList.add("shake");
            setTimeout(() => btnLimpar.classList.remove("shake"), 500);
        }
    });
});
