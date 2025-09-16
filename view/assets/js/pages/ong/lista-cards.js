/**
 * Função para transformar checkboxes em comportamento de radio
 * @param {string} containerId - id do <ul> que contém os checkboxes
 */
function checkboxRadio(containerId) {
    const checkboxes = document.querySelectorAll(`#${containerId} input[type="checkbox"]`);
    checkboxes.forEach(cb => {
        cb.addEventListener('change', () => {
            if (cb.checked) {
                checkboxes.forEach(other => {
                    if (other !== cb) other.checked = false;
                });
            }
        });
    });
}

// Aplicar nos grupos
checkboxRadio('esc-q-projetos'); // quantidade de projetos
checkboxRadio('esc-status'); // ordenação (mais recentes/antigos)