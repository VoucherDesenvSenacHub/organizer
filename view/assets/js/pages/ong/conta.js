// Ativar os toast com base nos parametros
window.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const upd = params.get('upd');
    const inativar = params.get('inativar');

    if (upd === 'sucesso') {
        mostrar_toast('toast-ong-sucesso');
    } else if (upd === 'erro') {
        mostrar_toast('toast-ong-erro');
    }
    
    if (inativar === 'sucesso') {
        mostrar_toast('toast-inativar-sucesso');
    } else if (inativar === 'erro') {
        mostrar_toast('toast-inativar-erro');
    }
});

// Aguardar jQuery e aplicar máscaras aos campos
document.addEventListener('DOMContentLoaded', function() {
    // quando jQuery estiver disponível
    const waitForJQuery = setInterval(function() {
        if (typeof $ !== 'undefined') {
            clearInterval(waitForJQuery);
            
            $("#telefone").mask("(00) 00000-0000");
            $("#cnpj").mask("00.000.000/0000-00");
            $("#cep").mask("00000-000");
            
            // Validações para campos de texto (apenas letras)
            $("#nome").on("input", function() {
                var valor = $(this).val();
                $(this).val(valor.replace(/[^a-zA-ZÀ-ÿ\s]/g, ""));
            });
            
            $("#bairro").on("input", function() {
                var valor = $(this).val();
                $(this).val(valor.replace(/[^a-zA-ZÀ-ÿ\s]/g, ""));
            });
            
            $("#cidade").on("input", function() {
                var valor = $(this).val();
                $(this).val(valor.replace(/[^a-zA-ZÀ-ÿ\s]/g, ""));
            });

            // Máscara para agência
            $("#agencia").on("input", function () {
                let valor = $(this).val().toUpperCase().replace(/[^0-9X]/g, "");

                if (valor.length > 5) valor = valor.slice(0, 5);

                if (valor.length === 5) {
                    valor = valor.slice(0, 4) + '-' + valor[4];
                }

                $(this).val(valor);
            });

            // Máscara para conta
            $("#conta").on("input", function () {
                let valor = $(this).val().toUpperCase().replace(/[^0-9X]/g, "");
                
                if (valor.length > 12) valor = valor.slice(0, 12);
                
                if (valor.length === 12) {
                    valor = valor.slice(0, 11) + '-' + valor[11];
                }

                $(this).val(valor);
            });
        }
    }, 50);

    // Interceptar submit do form para mostrar modal de confirmação
    const form = document.getElementById('form');
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            console.log('Form submit interceptado - abrindo modal');
            abrir_popup('confirmar-edicao-popup');
            return false;
        });
    }
});

// Função para confirmar edição
function confirmarEdicao() {
    // Remover máscara dos campos antes de enviar
    if (typeof $ !== 'undefined') {
        $("#telefone").unmask();
        $("#cnpj").unmask();
    }
    
    // Fechar modal
    fechar_popup('confirmar-edicao-popup');
    
    // Submeter form sem interceptação
    const form = document.getElementById('form');
    if (form) {
        form.removeEventListener('submit', arguments.callee);
        form.submit();
    }
}

// Função para abrir modal de inativação da ONG
function inativarOng() {
    abrir_popup('inativar-ong-popup');
}

