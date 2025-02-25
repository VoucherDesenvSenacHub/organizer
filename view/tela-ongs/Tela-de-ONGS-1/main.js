    // Menu Mobile
    function menu_mobile() {
        const nav_bar = document.getElementById('nav-bar');
        const hamburguer = document.getElementById('hamburguer');
        nav_bar.classList.toggle('active');
        hamburguer.classList.toggle('active');
    }

    // Fechar menu ao redimensionar
    window.addEventListener('resize', () => {
        if(window.innerWidth > 768) {
            const nav_bar = document.getElementById('nav-bar');
            const hamburguer = document.getElementById('hamburguer');
            nav_bar.classList.remove('active');
            hamburguer.classList.remove('active');
        }
    });

    // Botões de Coração
    document.querySelectorAll('.heart-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            this.classList.toggle('active');
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

    // Compartilhar
    document.querySelectorAll('.share-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            // Lógica de compartilhamento
            alert('Recurso de compartilhamento!');
        });
    });

    // Fechar popup ao clicar fora
    document.getElementById('fundo-popup').addEventListener('click', (e) => {
        if(e.target === document.getElementById('fundo-popup')) {
            document.getElementById('fundo-popup').classList.remove('ativo');
        }
    });