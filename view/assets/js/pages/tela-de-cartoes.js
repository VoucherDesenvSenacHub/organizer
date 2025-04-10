document.addEventListener('DOMContentLoaded', function() {
    console.log('Script iniciado - verificando elementos...');

    // Variável para armazenar o cartão selecionado para exclusão
    let cartaoSelecionado = null;

    // ==================== FUNÇÕES PRINCIPAIS ====================
    function abrirPopup(id) {
        const popup = document.getElementById(id);
        if (popup) {
            popup.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            console.log(`Popup ${id} aberto com sucesso`);
            return true;
        } else {
            console.error(`Popup com ID "${id}" não encontrado!`);
            return false;
        }
    }

    function fecharPopup(id) {
        const popup = document.getElementById(id);
        if (popup) {
            popup.style.display = 'none';
            document.body.style.overflow = 'auto';
            if (id === 'popup-adicionar-cartao') {
                resetarFormulario();
            }
        }
    }

    function resetarFormulario() {
        // Limpa campos
        document.querySelectorAll('#popup-adicionar-cartao input').forEach(input => {
            input.value = '';
            input.style.borderColor = '';
        });
        
        // Reseta o botão
        const addButton = document.getElementById('addButton');
        if (addButton) {
            addButton.disabled = false;
            addButton.classList.remove('loading', 'success');
            addButton.querySelector('.button-text').style.opacity = '1';
            addButton.querySelector('.loader').style.display = 'none';
            addButton.querySelector('.checkmark').style.display = 'none';
        }
    }

    // ==================== CONFIGURAÇÃO DE EVENTOS ====================
    
    // 1. Botão que abre o popup de adicionar cartão
    const btnAbrir = document.querySelector('.adicionar-cartao');
    if (btnAbrir) {
        btnAbrir.addEventListener('click', function(e) {
            e.preventDefault();
            abrirPopup('popup-adicionar-cartao');
        });
    } else {
        console.error('Botão "Adicionar cartão" não encontrado!');
    }

    // 2. Configuração dos eventos de clique nos cartões
    document.querySelectorAll('.cartao').forEach(cartao => {
        cartao.addEventListener('click', function(e) {
            e.stopPropagation();
            cartaoSelecionado = this;
            abrirPopup('popup-excluir-cartao');
        });
    });

    // 3. Botão de submit do formulário de adicionar cartão
    const addButton = document.getElementById('addButton');
    if (addButton) {
        addButton.addEventListener('click', async function(e) {
            e.preventDefault();
            
            // Elementos do botão
            const button = this;
            const buttonText = button.querySelector('.button-text');
            const loader = button.querySelector('.loader');
            const checkmark = button.querySelector('.checkmark');
            
            // Validação dos campos
            const campos = {
                numero: document.querySelector('.card-number'),
                data: document.querySelector('input[placeholder="MM/AA"]'),
                cvv: document.querySelector('.cvv'),
                nome: document.querySelector('input[placeholder="Nome Completo"]')
            };
            
            let valido = true;
            Object.values(campos).forEach(campo => {
                if (!campo.value.trim()) {
                    campo.style.borderColor = '#ff3860';
                    valido = false;
                } else {
                    campo.style.borderColor = '';
                }
            });
            
            if (!valido) {
                alert('Por favor, preencha todos os campos corretamente!');
                return;
            }
            
            // Estado de carregamento
            button.disabled = true;
            button.classList.add('loading');
            buttonText.style.opacity = '0';
            loader.style.display = 'block';
            
            try {
                // Simulação de requisição (substitua por chamada real à API)
                await new Promise(resolve => setTimeout(resolve, 2000));
                
                // Sucesso - mostra animação
                button.classList.remove('loading');
                loader.style.display = 'none';
                checkmark.style.display = 'block';
                button.classList.add('success');
                
                // Força a animação do checkmark
                setTimeout(() => {
                    const circle = checkmark.querySelector('.checkmark-circle');
                    const check = checkmark.querySelector('.checkmark-check');
                    circle.style.animation = 'checkmark-circle 0.6s ease forwards';
                    check.style.animation = 'checkmark-check 0.3s ease 0.6s forwards';
                }, 10);
                
                // Fecha o popup após 2 segundos
                setTimeout(() => {
                    fecharPopup('popup-adicionar-cartao');
                }, 2000);
                
            } catch (error) {
                console.error('Erro no processo:', error);
                button.classList.remove('loading');
                loader.style.display = 'none';
                buttonText.style.opacity = '1';
                button.disabled = false;
                alert('Erro ao processar. Tente novamente.');
            }
        });
    }

    // 4. Configuração dos botões de exclusão
    document.querySelector('.btn-no')?.addEventListener('click', function() {
        const popup_excluir = document.getElementById('popup-excluir-cartao');
        popup_excluir.classList.remove('ativo');
        fecharPopup('popup-excluir-cartao');
        cartaoSelecionado = null;
    });

    document.querySelector('.btn-yes')?.addEventListener('click', function() {

        if (cartaoSelecionado) {
            // Animação de exclusão
            cartaoSelecionado.style.transform = 'scale(0.9)';
            cartaoSelecionado.style.opacity = '0';
            
            const popup_excluir = document.getElementById('popup-excluir-cartao');
            // Remove o cartão após a animação
            setTimeout(() => {
                cartaoSelecionado.remove();
                fecharPopup('popup-excluir-cartao');
                popup_excluir.classList.remove('ativo');
                mostrar_toast('exclusao-sucesso')
                // abrirPopup('popup-exclusao-sucesso');
                cartaoSelecionado = null;
            }, 300);
        }
    });

    document.querySelector('.btn-back')?.addEventListener('click', function() {
        fecharPopup('popup-exclusao-sucesso');
    });

    // Fechar popups ao clicar fora
    document.querySelectorAll('.popup-fundo').forEach(popup => {
        popup.addEventListener('click', function(e) {
            if (e.target === this || e.target.classList.contains('popup-overlay')) {
                fecharPopup(this.id);
                cartaoSelecionado = null;
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Variável para armazenar o cartão selecionado
    let cartaoSelecionado = null;

    // Função para abrir popup
    // function abrirPopup(id) {
    //     const popup = document.getElementById(id);
    //     if (popup) {
    //         popup.style.display = 'flex';
    //         // document.body.style.overflow = 'hidden';
    //     }
    // }

    // Função para fechar popup
    // function fecharPopup(id) {
    //     const popup = document.getElementById(id);
    //     if (popup) {
    //         popup.style.display = 'none';
    //         // document.body.style.overflow = 'auto';
    //     }
    // }

    // Configuração dos eventos de clique nos cartões
    // document.querySelectorAll('.cartao').forEach(cartao => {
    //     cartao.addEventListener('click', function(e) {
    //         e.stopPropagation();
    //         cartaoSelecionado = this;
    //         abrirPopup('popup-excluir-cartao');
    //     });
    // });

    // Configuração do botão "SIM" para exclusão
    // document.querySelector('.btn-yes')?.addEventListener('click', function() {
    //     if (cartaoSelecionado) {
    //         // Animação de exclusão
    //         cartaoSelecionado.style.transform = 'scale(0.95)';
    //         cartaoSelecionado.style.opacity = '0';
            
    //         // Remove o cartão após a animação e mostra o popup de sucesso
    //         setTimeout(() => {
    //             cartaoSelecionado.remove();
    //             fecharPopup('popup-excluir-cartao');
    //             abrirPopup('popup-exclusao-sucesso'); // MOSTRA O POPUP DE SUCESSO
    //         }, 300);
    //     }
    // });

    // Configuração do botão "NÃO"
    document.querySelector('.btn-no')?.addEventListener('click', function() {
        fecharPopup('popup-excluir-cartao');
    });

    // Configuração do botão "VOLTAR"
    document.querySelector('.btn-back')?.addEventListener('click', function() {
        fecharPopup('popup-exclusao-sucesso');
    });

    // Fechar popups ao clicar fora
    document.querySelectorAll('.popup-fundo').forEach(popup => {
        popup.addEventListener('click', function(e) {
            if (e.target === this) {
                fecharPopup(this.id);
            }
        });
    });
});