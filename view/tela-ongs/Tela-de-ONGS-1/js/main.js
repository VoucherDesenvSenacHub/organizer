// Menu Mobile
function menuMobile() {
    const navBar = document.getElementById('nav-bar');
    const hamburguer = document.getElementById('hamburguer');
    navBar.classList.toggle('active');
    hamburguer.classList.toggle('active');
}

// Fechar menu ao redimensionar a tela
window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
        const navBar = document.getElementById('nav-bar');
        const hamburguer = document.getElementById('hamburguer');
        navBar.classList.remove('active');
        hamburguer.classList.remove('active');
    }
});

// Botões de Coração
document.querySelectorAll('.heart-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        this.classList.toggle('.active');
    });
});

// Popup de Login
function loginPopup() {
    const fundo = document.getElementById('fundo-popup');
    fundo.classList.add('ativo');
}

// Fechar Popup
document.querySelector('.close-btn').addEventListener('click', () => {
    document.getElementById('fundo-popup').classList.remove('ativo');
});

// Fechar popup ao clicar fora
document.getElementById('fundo-popup').addEventListener('click', (e) => {
    if (e.target === document.getElementById('fundo-popup')) {
        document.getElementById('fundo-popup').classList.remove('ativo');
    }
});

// Modal de Compartilhamento
function openShareModal() {
    document.getElementById('share-modal').classList.add('active');
}

function closeShareModal() {
    document.getElementById('share-modal').classList.remove('active');
}

// Copiar link de compartilhamento
function copyLink() {
    const linkInput = document.getElementById('share-link');
    linkInput.select();
    linkInput.setSelectionRange(0, linkInput.value.length);
    document.execCommand('copy');

    const copyButton = document.getElementById('copy-button');
    const originalText = copyButton.textContent;
    copyButton.textContent = 'COPIADO!';

    setTimeout(() => {
        copyButton.textContent = originalText;
    }, 2000);
}

document.addEventListener('DOMContentLoaded', function () {
    // Menu Mobile
    const hamburguer = document.getElementById('hamburguer');
    if (hamburguer) {
        hamburguer.addEventListener('click', menuMobile);
    }

    // Botões de Coração
    document.querySelectorAll('.heart-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            this.classList.toggle('active');
        });
    });

    // Popup de Login
    const loginButton = document.getElementById('login-button'); // Adicione um ID ao botão de login no HTML
    if (loginButton) {
        loginButton.addEventListener('click', loginPopup);
    }

    // Modal de Compartilhamento
    document.querySelectorAll('.share-btn').forEach(btn => {
        btn.addEventListener('click', openShareModal);
    });

    document.querySelector('.share-close-btn').addEventListener('click', closeShareModal);

    document.getElementById('copy-button').addEventListener('click', copyLink);

    document.getElementById('share-modal').addEventListener('click', function (e) {
        if (e.target === this) {
            closeShareModal();
        }
    });
});