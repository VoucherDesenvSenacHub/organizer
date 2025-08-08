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

