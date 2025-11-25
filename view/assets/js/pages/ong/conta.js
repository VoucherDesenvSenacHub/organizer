document.addEventListener('DOMContentLoaded', function() {
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

// Upload de foto de perfil com drag & drop
document.addEventListener('DOMContentLoaded', function() {
    const fotoInput = document.getElementById('fotoPerfil');
    const previewImage = document.getElementById('previewImage');
    const uploadArea = document.getElementById('uploadArea');
    const fotoPreview = document.getElementById('fotoPreview');
    const btnRemoverFoto = document.getElementById('btnRemoverFoto');

    // Função para processar arquivo (preview imediato)
    function processarArquivo(file) {
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                uploadArea.style.display = 'none';
                fotoPreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }

    // Atualiza o preview existente ao carregar a página (foto salva)
    window.addEventListener('load', function() {
        if (previewImage && previewImage.src && !previewImage.src.includes('image-placeholder.svg')) {
            uploadArea.style.display = 'none';
            fotoPreview.style.display = 'block';
        }
    });

    // Event listeners
    if (fotoInput) {
        fotoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            processarArquivo(file);
        });
    }

    if (uploadArea) {
        // Clique para abrir seletor
        uploadArea.addEventListener('click', function() {
            fotoInput.click();
        });

        // Drag & Drop
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fotoInput.files = files;
                processarArquivo(files[0]);
            }
        });
    }

    if (btnRemoverFoto) {
    btnRemoverFoto.addEventListener('click', function(e) {
        e.stopPropagation();
        if (confirm('Deseja realmente remover a foto da ONG?')) {
            // Atualiza o input escondido para o backend saber que deve remover
            document.getElementById('removerFotoOng').value = '1';

            // Atualiza visual
            uploadArea.style.display = 'flex';
            fotoPreview.style.display = 'none';
            previewImage.src = "../../assets/images/global/image-placeholder.svg";

            // Submete o form automaticamente
            form.submit();
        }
    });
}

});
