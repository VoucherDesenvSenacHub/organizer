
function abrir_popup(id) {
    document.getElementById(id).style.display = 'flex';
}

function fechar_popup(id) {
    document.getElementById(id).style.display = 'none';
}

// Fechar popup clicando fora dele
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('popup-fundo')) {
        e.target.style.display = 'none';
    }
});
