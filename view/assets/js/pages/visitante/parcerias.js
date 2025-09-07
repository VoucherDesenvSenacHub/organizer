// Máscaras para os campos
document.addEventListener('DOMContentLoaded', function () {
    const cnpjInput = document.getElementById('cnpj');
    const telefoneInput = document.getElementById('telefone');

    // Máscara para CNPJ
    if (cnpjInput) {
        cnpjInput.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, ''); // só números
            value = value.substring(0, 14); // limita a 14 dígitos numéricos

            value = value.replace(/^(\d{2})(\d)/, '$1.$2');
            value = value.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
            value = value.replace(/\.(\d{3})(\d)/, '.$1/$2');
            value = value.replace(/(\d{4})(\d)/, '$1-$2');

            e.target.value = value;
        });
    }

    // Máscara para telefone
    if (telefoneInput) {
        telefoneInput.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            value = value.substring(0, 11); // limita a 11 dígitos

            if (value.length <= 10) {
                value = value.replace(/^(\d{2})(\d)/, '($1) $2');
                value = value.replace(/(\d{4})(\d)/, '$1-$2');
            } else {
                value = value.replace(/^(\d{2})(\d)/, '($1) $2');
                value = value.replace(/(\d{5})(\d)/, '$1-$2');
            }

            e.target.value = value;
        });
    }
});

// Funcionalidade para enviar formulário de parceria
document.querySelector('#parceria-popup form').addEventListener('submit', async function (e) {
    e.preventDefault();

    const data = {
        nome: document.getElementById('nome').value,
        cnpj: document.getElementById('cnpj').value,
        email: document.getElementById('email').value,
        telefone: document.getElementById('telefone').value,
        mensagem: document.getElementById('mensagem').value,
    };

    try {
        const response = await fetch(this.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        });

        const result = await response.json();
        
        if (result.success) {
            // Fechar o popup
            fechar_popup('parceria-popup');
            // Limpar o formulário
            this.reset();
            // Redirecionar para a página de parcerias para mostrar a mensagem de sucesso
            window.location.href = 'parcerias.php';
        } else {
            // Mostrar erro
            alert('Erro: ' + result.error);
        }
    } catch (error) {
        console.error('Erro ao enviar solicitação:', error);
        alert('Erro ao enviar solicitação. Tente novamente.');
    }
});
