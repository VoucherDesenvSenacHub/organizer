/**
 * home-parceria.js
 * Funcionalidade para enviar formulário de parceria na home do visitante
 */

// Funções para controlar os popups
function abrir_popup_empresas(id){
    const popup_empresas = document.getElementById(id);
    popup_empresas.classList.add('ativo');

    popup_empresas.addEventListener('click', (event) => {
        if (event.target === popup_empresas) {
            popup_empresas.classList.remove('ativo');
        }
    });
}

function abrir_popup_form(id){
    const form_empresas = document.getElementById(id);
    form_empresas.classList.add('ativo');

    form_empresas.addEventListener('click', (event) => {
        if (event.target === form_empresas) {
            form_empresas.classList.remove('ativo');
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formParceiro');
    
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            enviarSolicitacaoParceria();
        });
    }

    const telefoneInput = document.getElementById('telefone');
    const cnpjInput = document.getElementById('cnpj');
    
    if (telefoneInput) {
        telefoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 10) {
                value = value.replace(/(\d{2})(\d{4,5})(\d{4})/, '($1)$2-$3');
            }
            e.target.value = value;
        });
    }
    
    if (cnpjInput) {
        cnpjInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length === 14) {
                value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
            }
            e.target.value = value;
        });
    }
});

function enviarSolicitacaoParceria() {
    const form = document.getElementById('formParceiro');
    const submitButton = form.querySelector('button[type="submit"]');
    
    const originalText = submitButton.textContent;
    submitButton.disabled = true;
    submitButton.textContent = 'ENVIANDO...';
    
    const dados = {
        nome: document.getElementById('nome').value.trim(),
        email: document.getElementById('email').value.trim(),
        telefone: document.getElementById('telefone').value.trim(),
        cnpj: document.getElementById('cnpj').value.trim(),
        mensagem: document.getElementById('mensagem').value.trim()
    };
    
    if (!dados.nome || !dados.email || !dados.telefone || !dados.cnpj || !dados.mensagem) {
        mostrarErro('Por favor, preencha todos os campos obrigatórios.');
        reabilitarBotao(submitButton, originalText);
        return;
    }
    
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(dados.email)) {
        mostrarErro('Por favor, insira um email válido.');
        reabilitarBotao(submitButton, originalText);
        return;
    }
    
    fetch('../../controller/ParceriaController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dados)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            mostrarSucesso();
            form.reset();

            setTimeout(() => {
                if (typeof fechar_popup === 'function') {
                    fechar_popup('body-forma');
                }
            }, 2000);
        } else {
            mostrarErro(data.error || 'Erro ao enviar solicitação. Tente novamente.');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        mostrarErro('Erro de conexão. Verifique sua internet e tente novamente.');
    })
    .finally(() => {
        reabilitarBotao(submitButton, originalText);
    });
}

function mostrarSucesso() {
    const toast = document.getElementById('toast-mensagem-enviada');
    if (toast) {
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 4000);
    }
}

function mostrarErro(mensagem) {
    const toast = document.getElementById('toast-erro');
    const mensagemSpan = document.getElementById('erro-mensagem');
    
    if (toast && mensagemSpan) {
        mensagemSpan.textContent = mensagem;
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 4000);
    } else {
        alert(mensagem);
    }
}

function reabilitarBotao(button, originalText) {
    button.disabled = false;
    button.textContent = originalText;
}
