// NAV-BAR MOBILE
function menu_mobile() {
    const nav_bar = document.getElementById('nav-bar');
    const hamburguer = document.getElementById('hamburguer');
    nav_bar.classList.toggle('active');
    hamburguer.classList.toggle('active');
}

window.addEventListener('resize', () => {
    const nav_bar = document.getElementById('nav-bar');
    const hamburguer = document.getElementById('hamburguer');
    if (window.innerWidth > 700 && nav_bar.classList.contains('active')) {
        nav_bar.classList.remove('active');
        hamburguer.classList.remove('active');
    }
});


// EFEITO POPUP 
function abrir_popup(popupId) {
    const fundoPopup = document.getElementById(popupId);
    
    if (fundoPopup) {
        fundoPopup.classList.toggle('ativo');

        // Fecha o popup ao clicar fora dele
        fundoPopup.addEventListener('click', (event) => {
            if (event.target === fundoPopup) {
                fundoPopup.classList.remove('ativo');
            }
        });
    } else {
        console.error(`Elemento com ID "${popupId}" não encontrado.`);
    }
}

// FECHAR O POPUP
function fechar_popup(popupId) {
    const fundoPopup = document.getElementById(popupId);
    fundoPopup.classList.remove('ativo');
}


// Copiar o link da ong/projeto no popup de compartilhar
function copiar_link(toast) {
    let input = document.getElementById("link-compartilhar");
    input.select();
    input.setSelectionRange(0, 99999); // Compatibilidade com iOS

    if (navigator.clipboard) {
        navigator.clipboard.writeText(input.value).then(() => {
            mostrar_toast(toast);
            fechar_popup('compartilhar-popup');
        }).catch(() => {
            document.execCommand("copy");
            mostrar_toast(toast);
            fechar_popup('compartilhar-popup');
        });
    } else {
        document.execCommand("copy");
        mostrar_toast(toast);
        fechar_popup('compartilhar-popup');
    }
}


// MOSTRAR UM ALERTA QUE SOME DEPOIS
function mostrar_toast(id) {
    let toast = document.getElementById(id);
    toast.style.right = "0px";
    toast.style.opacity = "1";

    setTimeout(() => {
        toast.style.right = "-300px";
        toast.style.opacity = "0";
    }, 2000);
}

// Recuperar senha dos login
function recuperar_conta(toast, popup) {
    fechar_popup(popup);
    mostrar_toast(toast);
}