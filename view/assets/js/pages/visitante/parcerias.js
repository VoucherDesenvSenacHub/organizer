// Máscaras, validação e envio do formulário
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-solicitacao-parceria');
    const inputNome = document.getElementById('nome');
    const inputCnpj = document.getElementById('cnpj');
    const inputEmail = document.getElementById('email');
    const inputTelefone = document.getElementById('telefone');
    const inputMensagem = document.getElementById('mensagem');

    const erroNome = document.getElementById('erro-nome');
    const erroCnpj = document.getElementById('erro-cnpj');
    const erroEmail = document.getElementById('erro-email');
    const erroTelefone = document.getElementById('erro-telefone');
    const erroMensagem = document.getElementById('erro-mensagem');

    // Mensagens de erro
    function setErro(campo, msgEl, mensagem) {
        msgEl.textContent = mensagem || '';
        if (mensagem) {
            campo.classList.add('input-error');
            campo.setAttribute('aria-invalid', 'true');
        } else {
            campo.classList.remove('input-error');
            campo.setAttribute('aria-invalid', 'false');
        }
    }

    // Máscara para CNPJ
    if (inputCnpj) {
        inputCnpj.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '').substring(0, 14);
            value = value.replace(/^(\d{2})(\d)/, '$1.$2')
                         .replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3')
                         .replace(/\.(\d{3})(\d)/, '.$1/$2')
                         .replace(/(\d{4})(\d)/, '$1-$2');
            e.target.value = value;
        });
    }

    // Máscara para telefone
    if (inputTelefone) {
        inputTelefone.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '').substring(0, 11);
            value = value.replace(/^(\d{2})(\d)/, '($1) $2');
            value = value.length <= 10
                ? value.replace(/(\d{4})(\d)/, '$1-$2')
                : value.replace(/(\d{5})(\d)/, '$1-$2');
            e.target.value = value;
        });
    }

    if (!form) return;

    function validarNome() {
        const valor = (inputNome.value || '').trim();
        if (valor.length < 2) {
            setErro(inputNome, erroNome, 'Informe o nome da empresa.');
            return false;
        }
        setErro(inputNome, erroNome, '');
        return true;
    }

    function validarCnpj() {
        const valor = (inputCnpj.value || '').replace(/\D/g, '');
        if (!/^\d{14}$/.test(valor)) {
            setErro(inputCnpj, erroCnpj, 'CNPJ inválido. Use 14 dígitos (ex.: 00.000.000/0000-00).');
            return false;
        }
        setErro(inputCnpj, erroCnpj, '');
        return true;
    }

    function validarEmail() {
        const valor = (inputEmail.value || '').trim();
        const padrao = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
        if (!padrao.test(valor)) {
            setErro(inputEmail, erroEmail, 'Email inválido.');
            return false;
        }
        setErro(inputEmail, erroEmail, '');
        return true;
    }

    function validarTelefone() {
        const numeros = (inputTelefone.value || '').replace(/\D/g, '');
        if (!(numeros.length === 10 || numeros.length === 11)) {
            setErro(inputTelefone, erroTelefone, 'Telefone inválido. Use DDD + número.');
            return false;
        }
        setErro(inputTelefone, erroTelefone, '');
        return true;
    }

    function validarMensagem() {
        const valor = (inputMensagem.value || '').trim();
        if (valor.length < 30) {
            setErro(inputMensagem, erroMensagem, 'Descreva sua proposta em pelo menos 30 caracteres.');
            return false;
        }
        setErro(inputMensagem, erroMensagem, '');
        return true;
    }

    function validarFormulario() {
        const okNome = validarNome();
        const okCnpj = validarCnpj();
        const okEmail = validarEmail();
        const okTelefone = validarTelefone();
        const okMensagem = validarMensagem();
        return okNome && okCnpj && okEmail && okTelefone && okMensagem;
    }

    // Validação no submit
    form.addEventListener('submit', function(e) {
        if (!validarFormulario()) {
            e.preventDefault();
            e.stopImmediatePropagation();
        }
    }, true);

    // Validação em tempo real (blur) — limpa apenas o campo atual
    inputNome && inputNome.addEventListener('blur', validarNome);
    inputCnpj && inputCnpj.addEventListener('blur', validarCnpj);
    inputEmail && inputEmail.addEventListener('blur', validarEmail);
    inputTelefone && inputTelefone.addEventListener('blur', validarTelefone);
    inputMensagem && inputMensagem.addEventListener('blur', validarMensagem);

    // Envio via fetch (opcional) — só vincula se o form existir
    const formNoPopup = document.querySelector('#parceria-popup form');
    if (formNoPopup) {
        formNoPopup.addEventListener('submit', async function (e) {
            if (!validarFormulario()) return; // já prevenido acima
            e.preventDefault();

            const data = {
                nome: inputNome.value,
                cnpj: inputCnpj.value,
                email: inputEmail.value,
                telefone: inputTelefone.value,
                mensagem: inputMensagem.value,
            };

            try {
                const response = await fetch(this.action, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data),
                });

                const result = await response.json();
                if (result.success) {
                    fechar_popup('parceria-popup');
                    this.reset();
                    window.location.href = 'parcerias.php';
                } else {
                    alert('Erro: ' + (result.error || 'Falha ao enviar.'));
                }
            } catch (error) {
                console.error('Erro ao enviar solicitação:', error);
                alert('Erro ao enviar solicitação. Tente novamente.');
            }
        });
    }
});
