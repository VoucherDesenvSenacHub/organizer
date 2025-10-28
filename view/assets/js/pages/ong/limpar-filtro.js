    document.addEventListener("DOMContentLoaded", () => {
        const formFiltros = document.getElementById("form-filtros");
        const btnLimpar = document.querySelector(".limpar-filtro");
        const inputPesquisa = formFiltros.querySelector("input[name='pesquisa']");
        const radios = formFiltros.querySelectorAll("input[type='radio']");
        const spinner = document.getElementById("spinner");
    
        btnLimpar.addEventListener("click", (e) => {
            e.preventDefault();
    
            radios.forEach(radio => radio.checked = false);
    
            inputPesquisa.value = "";
            
                btnLimpar.classList.add("limpando");
    
            spinner.style.display = "block";
    
            setTimeout(() => {
                location.reload();
            }, 800);
        });
    });
