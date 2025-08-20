// Ativar os toast com base nos parametros
window.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const upd = params.get('upd');

    if (upd === 'sucesso') {
        mostrar_toast('toast-ong-sucesso');
    } else if (upd === 'erro') {
        mostrar_toast('toast-ong-erro');
    }
});

// Aplicar máscaras aos campos
$(document).ready(function() {
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
});

// Remover máscara dos campos antes de enviar
$("#form").submit(function(event) {
    $("#telefone").unmask();
    $("#cnpj").unmask();
});

$("#agencia").on("input", function () {
    let valor = $(this).val().toUpperCase().replace(/[^0-9X]/g, "");

    // Limita o valor a 5 caracteres (4 dígitos + 1 verificador)
    if (valor.length > 5) valor = valor.slice(0, 5);

    // Formata para 0000-X
    if (valor.length === 5) {
        valor = valor.slice(0, 4) + '-' + valor[4];
    }

    $(this).val(valor);
});

$("#conta").on("input", function () {
    let valor = $(this).val().toUpperCase().replace(/[^0-9X]/g, "");

    
    if (valor.length > 12) valor = valor.slice(0, 12);

    
    if (valor.length === 12) {
        valor = valor.slice(0, 11) + '-' + valor[11];
    }

    $(this).val(valor);
});

// Função para inativar ONG
function inativarOng() {
    if (confirm('ATENÇÃO: Tem certeza que deseja INATIVAR sua ONG? Esta ação irá desativar sua conta permanentemente e você não poderá mais acessar o sistema. Esta ação não pode ser desfeita.')) {
        // Criar formulário para enviar requisição POST
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '../../../controller/Ong/InativarOngController.php';
        
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'inativar-ong';
        input.value = 'true';
        
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }
}

