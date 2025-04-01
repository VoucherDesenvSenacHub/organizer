document.addEventListener('DOMContentLoaded', function() {
    // ============ Configuração dos Popups ============
    const popupExcluir = document.getElementById('popup-excluir-cartao');
    const popupSucesso = document.getElementById('popup-exclusao-sucesso');
    
    // ============ Lógica dos Cartões ============
    const cartoes = document.querySelectorAll('.cartao');
    
    cartoes.forEach(cartao => {
        cartao.addEventListener('click', function(e) {
            popupExcluir.dataset.cartaoSelecionado = this.dataset.cartaoId;
            popupExcluir.style.display = 'flex';
            e.stopPropagation();
        });
    });

    // ============ Botões dos Popups ============
    document.getElementById('btnNo')?.addEventListener('click', function() {
        popupExcluir.style.display = 'none';
    });

    document.getElementById('btnYes')?.addEventListener('click', function() {
        const cartaoId = popupExcluir.dataset.cartaoSelecionado;
        popupExcluir.style.display = 'none';
        popupSucesso.style.display = 'flex';
    });

    document.getElementById('btnBack')?.addEventListener('click', function() {
        popupSucesso.style.display = 'none';
    });

    // ============ Fechar Popups ao Clicar Fora ============
    [popupExcluir, popupSucesso].forEach(popup => {
        popup.addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
            }
        });
    });

    // ============ Lógica Aprimorada do Botão Adicionar ============
    const addButton = document.getElementById('addButton');
    if (addButton) {
        addButton.addEventListener('click', async function(e) {
            e.preventDefault();
            
            const button = this;
            const buttonText = button.querySelector('.button-text');
            const loader = button.querySelector('.loader');
            const checkmark = button.querySelector('.checkmark');
            
            // Validação dos campos do formulário
            const cardNumber = document.querySelector('.card-number').value;
            const cardDate = document.querySelector('input[placeholder="MM/AA"]').value;
            const cardCVV = document.querySelector('.cvv').value;
            const cardName = document.querySelector('input[placeholder="Nome Completo"]').value;
            
            if (!cardNumber || !cardDate || !cardCVV || !cardName) {
                alert('Por favor, preencha todos os campos!');
                return;
            }
            
            // Estado de carregamento
            button.disabled = true;
            buttonText.classList.add('hidden');
            loader.classList.remove('hidden');
            
            try {
                // Simulação de requisição (substitua por sua API real)
                await new Promise(resolve => setTimeout(resolve, 2000));
                
                // Sucesso - Mostrar checkmark
                loader.classList.add('hidden');
                checkmark.classList.remove('hidden');
                button.classList.add('success');
                
                // Reset após 2 segundos
                setTimeout(() => {
                    checkmark.classList.add('hidden');
                    buttonText.classList.remove('hidden');
                    button.classList.remove('success');
                    button.disabled = false;
                    
                    // Fechar popup e recarregar cartões (opcional)
                    fecharPopup('popup-adicionar-cartao');
                    // location.reload(); // Se precisar recarregar a página
                }, 2000);
                
            } catch (error) {
                // Tratamento de erro
                console.error('Erro ao adicionar cartão:', error);
                loader.classList.add('hidden');
                buttonText.classList.remove('hidden');
                button.disabled = false;
                alert('Erro ao adicionar cartão. Tente novamente.');
            }
        });
    }
});

// Funções auxiliares
function abrir_popup(id) {
    document.getElementById(id).style.display = 'flex';
}

function fecharPopup(id) {
    document.getElementById(id).style.display = 'none';
}

function confirmarExclusao() {
    const popupExcluir = document.getElementById('popup-excluir-cartao');
    const popupSucesso = document.getElementById('popup-exclusao-sucesso');
    
    // Simulação de exclusão (substitua por sua lógica real)
    const cartaoId = popupExcluir.dataset.cartaoSelecionado;
    document.querySelector(`.cartao[data-cartao-id="${cartaoId}"]`)?.remove();
    
    popupExcluir.style.display = 'none';
    popupSucesso.style.display = 'flex';
}

const response = await fetch('sua-api-aqui', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
        numero: cardNumber,
        validade: cardDate,
        cvv: cardCVV,
        titular: cardName
    })
});

if (!response.ok) throw new Error('Falha ao adicionar cartão');