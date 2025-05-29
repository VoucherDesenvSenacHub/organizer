function abrirPopupEdicao(button, tipo) {
    const row = button.closest('tr');
    const popup = document.getElementById('edit-popup');
    const formFields = document.getElementById('form-fields');
    const popupTitle = document.getElementById('popup-title');
    
    // Configura título baseado no tipo
    popupTitle.textContent = tipo === 'ong' ? 'VISUALIZAR INFORMAÇÕES' : 'EDITAR PROJETO';
    
    // Gera campos dinamicamente
    let fieldsHTML = '';
    
    if (tipo === 'ong') {
        fieldsHTML = `
            <div class="form-group">
                <label>Nome</label>
                <input type="text" value="${row.querySelector('td[data-label="NOME"]').textContent}" readonly>
            </div>
            <div class="form-group">
                <label>Número de Projetos</label>
                <input type="text" value="${row.querySelector('td[data-label="PROJETOS"]').textContent}" readonly>
            </div>
            <div class="form-group">
                <label>Data de Criação</label>
                <input type="text" value="${row.querySelector('td[data-label="CRIADO"]').textContent}" readonly>
            </div>
        `;
    } else {
        fieldsHTML = `
            <div class="form-group">
                <label>Nome*</label>
                <input type="text" value="${row.querySelector('td[data-label="NOME"]').textContent}">
            </div>
            <div class="form-group">
                <label>Meta de Doação*</label>
                <input type="text" value="150000,00">
            </div>
            <div class="form-group">
                <label>Resumo*</label>
                <textarea>Iniciativa para instalar sistemas de purificação...</textarea>
            </div>
            <div class="form-group">
                <label>Sobre*</label>
                <textarea>O Projeto Água Limpa visa impactar positivamente...</textarea>
            </div>
        `;
    }
    
    formFields.innerHTML = fieldsHTML;
    popup.style.display = 'flex';
    document.body.classList.add('popup-aberto');
}

// Fechar popup
document.getElementById('close-popup').addEventListener('click', function() {
    document.getElementById('edit-popup').style.display = 'none';
    document.body.classList.remove('popup-aberto');
});

// Fechar ao clicar no overlay
document.getElementById('edit-popup').addEventListener('click', function(e) {
    if (e.target === this) {
        this.style.display = 'none';
        document.body.classList.remove('popup-aberto');
    }
});