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

//EFEITO DO TOAST
function exibir_toast(tipo, mensagem) {
    let toastTimeout;
    const toast = document.getElementById("toast");
    const icon = document.getElementById("toast-icon");
    const msg = document.getElementById("toast-msg");

    // Cancela qualquer animação anterior
    clearTimeout(toastTimeout);

    // Define classe de cor
    toast.className = "toast " + tipo;

    // Define ícone conforme tipo
    switch (tipo) {
        case "sucesso":
            icon.className = "fa-regular fa-circle-check";
            break;
        case "erro":
            icon.className = "fa-solid fa-triangle-exclamation";
            break;
        case "favorito":
            icon.className = "fa-solid fa-heart";
            break;
        case "desfavorito":
            icon.className = "fa-solid fa-heart-crack";
            break;
        case "info":
            icon.className = "fa-solid fa-circle-info";
            break;
        default:
            icon.className = "fa-regular fa-comment";
    }

    // Define mensagem
    msg.textContent = mensagem;

    // Exibe o toast
    toast.style.right = "0px";
    toast.style.opacity = "1";

    // Oculta após 3 segundos
    toastTimeout = setTimeout(() => {
        toast.style.right = "-300px";
        toast.style.opacity = "0";
    }, 3000);
};


// Copiar o link da ong/projeto no popup de compartilhar
function copiar_link(toast) {
    let input = document.getElementById("link-compartilhar");
    input.select();
    input.setSelectionRange(0, 99999); // Compatibilidade com iOS

    if (navigator.clipboard) {
        navigator.clipboard.writeText(input.value).then(() => {
            exibir_toast('sucesso', 'Link copiado com sucesso!')
            fechar_popup('compartilhar-popup');
        }).catch(() => {
            document.execCommand("copy");
            exibir_toast('sucesso', 'Link copiado com sucesso!')
            fechar_popup('compartilhar-popup');
        });
    } else {
        document.execCommand("copy");
        exibir_toast('sucesso', 'Link copiado com sucesso!')
        fechar_popup('compartilhar-popup');
    }
}


const uls = document.querySelectorAll('.filtro-pesquisa ul');

uls.forEach(ul => {
    const lis = Array.from(ul.children);
    const firstLi = lis[0];
    const padding = 30;

    // Medir largura real do primeiro <li> com clone invisível
    const closedWidth = getNaturalWidth(firstLi);
    ul.style.width = `${closedWidth + padding}px`;

    // Medir largura real do maior <li> com clones invisíveis
    let maxWidth = closedWidth;
    lis.forEach(li => {
        const liWidth = getNaturalWidth(li);
        if (liWidth > maxWidth) maxWidth = liWidth;
    });

    ul.addEventListener('mouseenter', () => {
        ul.style.height = `${lis.length * 40}px`;
        ul.style.width = `${maxWidth + padding}px`;
    });

    ul.addEventListener('mouseleave', () => {
        ul.style.height = '40px';
        ul.style.width = `${closedWidth + padding}px`;
    });
});

function getNaturalWidth(element) {
    const clone = element.cloneNode(true);
    clone.style.width = 'auto';
    clone.style.position = 'absolute';
    clone.style.visibility = 'hidden';
    clone.style.whiteSpace = 'nowrap';
    document.body.appendChild(clone);
    const width = clone.getBoundingClientRect().width;
    document.body.removeChild(clone);
    return width;
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
const btnRemoverDoador = document.getElementById('btnRemoverDoador');
const uploadText = document.getElementById('uploadTextDoador');

// Mostrar texto de upload se não houver imagem
function updateUploadText() {
    if (!previewImg.src || previewImg.src.includes('sem-foto')) {
        uploadText.style.display = 'block';
        btnRemoverDoador.style.display = 'none';
    } else {
        uploadText.style.display = 'none';
        btnRemoverDoador.style.display = 'block';
    }
}
updateUploadText();

// Clique para abrir input
uploadArea.onclick = function (e) {
    if (e.target !== btnRemoverDoador) inputFile.click();
};

// Preview da imagem
inputFile.addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (ev) {
            previewImg.src = ev.target.result;
            updateUploadText();
        }
        reader.readAsDataURL(file);
    }
});

// Drag and drop
uploadArea.addEventListener('dragover', function (e) {
    e.preventDefault();
    uploadArea.style.background = '#e0e0e0';
});
uploadArea.addEventListener('dragleave', function (e) {
    e.preventDefault();
    uploadArea.style.background = '#f3f3f3';
});
uploadArea.addEventListener('drop', function (e) {
    e.preventDefault();
    uploadArea.style.background = '#f3f3f3';
    const file = e.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
        inputFile.files = e.dataTransfer.files;
        const reader = new FileReader();
        reader.onload = function (ev) {
            previewImg.src = ev.target.result;
            updateUploadText();
        }
        reader.readAsDataURL(file);
    }
});

// Remover imagem
btnRemoverDoador.onclick = function (e) {
    e.stopPropagation();

    // Atualiza o preview
    previewImg.src = '../../assets/images/global/user-placeholder.jpg';
    inputFile.value = '';
    updateUploadText();

    // Marca para remoção no backend
    const form = btnRemoverDoador.closest('form');
    let inputRemover = form.querySelector('input[name="remover_foto"]');
    if (!inputRemover) {
        inputRemover = document.createElement('input');
        inputRemover.type = 'hidden';
        inputRemover.name = 'remover_foto';
        form.appendChild(inputRemover);
    }
    inputRemover.value = 'true';
};

