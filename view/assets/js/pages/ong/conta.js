// Aguardar jQuery e aplicar máscaras aos campos
document.addEventListener('DOMContentLoaded', function() {
    // quando jQuery estiver disponível
    const waitForJQuery = setInterval(function() {
        if (typeof $ !== 'undefined') {
            clearInterval(waitForJQuery);
            
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

            // Máscara para agência
            $("#agencia").on("input", function () {
                let valor = $(this).val().toUpperCase().replace(/[^0-9X]/g, "");

                if (valor.length > 5) valor = valor.slice(0, 5);

                if (valor.length === 5) {
                    valor = valor.slice(0, 4) + '-' + valor[4];
                }

                $(this).val(valor);
            });

            // Máscara para conta
            $("#conta").on("input", function () {
                let valor = $(this).val().toUpperCase().replace(/[^0-9X]/g, "");
                
                if (valor.length > 12) valor = valor.slice(0, 12);
                
                if (valor.length === 12) {
                    valor = valor.slice(0, 11) + '-' + valor[11];
                }

                $(this).val(valor);
            });
        }
    }, 50);

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
    // Remover máscara dos campos antes de enviar
    if (typeof $ !== 'undefined') {
        $("#telefone").unmask();
        $("#cnpj").unmask();
    }
    
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
    const btnRemover = document.getElementById('btnRemover');

    // Função para processar arquivo
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

    if (btnRemover) {
        btnRemover.addEventListener('click', function(e) {
            e.stopPropagation();
            uploadArea.style.display = 'flex';
            fotoPreview.style.display = 'none';
            fotoInput.value = '';
        });
    }
});

document.querySelectorAll('.select-wrapper select').forEach(select => {
    const wrapper = select.closest('.select-wrapper');

    select.addEventListener('click', () => {
        wrapper.classList.toggle('open');
    });

    select.addEventListener('blur', () => {
        wrapper.classList.remove('open');
    });
});


