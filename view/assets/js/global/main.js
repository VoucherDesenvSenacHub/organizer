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


// Abrir a dropdown dos filtros
const uls = document.querySelectorAll('.filtro-pesquisa ul');

uls.forEach(ul => {
    const liCount = ul.children.length;
    const firstLi = ul.querySelector('li:first-child');
    const text = firstLi.textContent.trim();

    const closedWidth = text.length * 10 + 40; // largura inicial
    ul.style.width = `${closedWidth}px`;

    // calcula largura do maior li
    let maxWidth = closedWidth;
    Array.from(ul.children).forEach(li => {
        const liText = li.textContent.trim();
        const liWidth = liText.length * 10 + 20; // mesmo cálculo que closedWidth
        if (liWidth > maxWidth) maxWidth = liWidth;
        // alert(`li: ${liWidth} ${li.textContent} - Max: ${maxWidth}`)
    });
    
    ul.addEventListener('mouseenter', () => {
        ul.style.height = `${liCount * 40}px`;
        ul.style.width = `${maxWidth}px`;
    });

    ul.addEventListener('mouseleave', () => {
        ul.style.height = `40px`;
        ul.style.width = `${closedWidth}px`;
    });
});

function copiar_link_aprovar(toast) {
    let input = document.getElementById("link-aprovar");
    input.select();
    input.setSelectionRange(0, 99999); // Compatibilidade com iOS

    if (navigator.clipboard) {
        navigator.clipboard.writeText(input.value).then(() => {
            mostrar_toast(toast);
            fechar_popup('aprovar-popup');
        }).catch(() => {
            document.execCommand("copy");
            mostrar_toast(toast);
            fechar_popup('aprovar-popup');
        });
    } else {
        document.execCommand("copy");
        mostrar_toast(toast);
        fechar_popup('aprovar-popup');
    }
}

function copiar_link_recusar(toast) {
    let input = document.getElementById("link-recusar");
    input.select();
    input.setSelectionRange(0, 99999); // Compatibilidade com iOS

    if (navigator.clipboard) {
        navigator.clipboard.writeText(input.value).then(() => {
            mostrar_toast(toast);
            fechar_popup('recusar-popup');
        }).catch(() => {
            document.execCommand("copy");
            mostrar_toast(toast);
            fechar_popup('recusar-popup');
        });
    } else {
        document.execCommand("copy");
        mostrar_toast(toast);
        fechar_popup('recusar-popup');
    }
}


// EFEITO DE COMPARTILHAR

function compartilhar(popupId, Id, tipo) {
    const fundoPopup = document.getElementById(popupId);
    const input = document.getElementById("link-compartilhar");

    if (tipo === 'projeto') {
        input.value = `http://localhost/organizer/view/pages/projeto/perfil.php?id=${Id}`;
    } else if (tipo === 'ong') {
        input.value = `http://localhost/organizer/view/pages/ong/perfil.php?id=${Id}`;
    } else {
        input.value = `http://localhost/organizer/view/pages/noticia/perfil.php?id=${Id}`;
    }


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


// MOSTRAR UM ALERTA QUE SOME DEPOIS
function mostrar_toast(id) {
    let toast = document.getElementById(id);
    toast.style.right = "0px";
    toast.style.opacity = "1";

    setTimeout(() => {
        toast.style.right = "-300px";
        toast.style.opacity = "0";
    }, 3000);
}

// Recuperar senha dos login
function recuperar_conta(toast, popup) {
    fechar_popup(popup);
    mostrar_toast(toast);
}

function mensagem_enviada(toast, popup) {
    fechar_popup(popup);
    mostrar_toast(toast);
}

function ativar_classe(id) {
    let i = document.getElementById(id);
    i.classList.toggle('active');
}


// ============================ DOADOR ===============================
function abrir_aside() {
    let aside = document.getElementById('aside-container');
    let btn_aside = document.getElementById('btn-aside');
    aside.classList.toggle('active');
    btn_aside.classList.toggle('active');
}



// BLOQUEAR ENVIO DUPLO EM TODOS OS FORMULÁRIOS
document.addEventListener('DOMContentLoaded', () => {
    const formularios = document.querySelectorAll('form');

    formularios.forEach(form => {
        form.addEventListener('submit', (e) => {
            // Bloquear múltiplos envios
            if (form.dataset.enviado === 'true') {
                e.preventDefault();
                return;
            }

            form.dataset.enviado = 'true';

            const botoes = form.querySelectorAll('button[type=submit], input[type=submit]');

            botoes.forEach(botao => {
                if (botao.innerText.trim().length > 0) {
                    botao.dataset.originalText = botao.innerText;
                    botao.innerText = 'Carregando...';
                }

                botao.disabled = true;

                // Reabilitar botão e permitir novo envio após 4 segundos
                setTimeout(() => {
                    botao.disabled = false;
                    if (botao.dataset.originalText) {
                        botao.innerText = botao.dataset.originalText;
                    }
                    form.dataset.enviado = 'false';
                }, 4000);
            });
        });
    });
});



const uploadArea = document.getElementById('uploadAreaDoador');
const inputFile = document.getElementById('foto_usuario');
const previewImg = document.getElementById('preview-foto');
const btnRemover = document.getElementById('btnRemoverDoador');
const uploadText = document.getElementById('uploadTextDoador');

// Mostrar texto de upload se não houver imagem
function updateUploadText() {
    if (!previewImg.src || previewImg.src.includes('sem-foto')) {
        uploadText.style.display = 'block';
        btnRemover.style.display = 'none';
    } else {
        uploadText.style.display = 'none';
        btnRemover.style.display = 'block';
    }
}
updateUploadText();

// Clique para abrir input
uploadArea.onclick = function(e) {
    if (e.target !== btnRemover) inputFile.click();
};

// Preview da imagem
inputFile.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(ev) {
            previewImg.src = ev.target.result;
            updateUploadText();
        }
        reader.readAsDataURL(file);
    }
});

// Drag and drop
uploadArea.addEventListener('dragover', function(e) {
    e.preventDefault();
    uploadArea.style.background = '#e0e0e0';
});
uploadArea.addEventListener('dragleave', function(e) {
    e.preventDefault();
    uploadArea.style.background = '#f3f3f3';
});
uploadArea.addEventListener('drop', function(e) {
    e.preventDefault();
    uploadArea.style.background = '#f3f3f3';
    const file = e.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
        inputFile.files = e.dataTransfer.files;
        const reader = new FileReader();
        reader.onload = function(ev) {
            previewImg.src = ev.target.result;
            updateUploadText();
        }
        reader.readAsDataURL(file);
    }
});

// Remover imagem
btnRemover.onclick = function(e) {
    e.stopPropagation();
    previewImg.src = '../../assets/images/global/user-placeholder.jpg'; // coloque o caminho da imagem padrão
    inputFile.value = '';
    updateUploadText();
};