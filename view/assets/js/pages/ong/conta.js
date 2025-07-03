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