/**
 * Sistema de modal de confirmação reutilizável
 */

class ModalConfirmacao {
    constructor() {
        this.modal = null;
        this.criarModal();
        console.log('ModalConfirmacao inicializado');
    }

    criarModal() {
        if (document.getElementById('modal-confirmacao')) return;

        const modalHTML = `
            <div id="modal-confirmacao" class="modal-overlay">
                <div class="modal-content">
                    <h3 id="modal-titulo"></h3>
                    <p id="modal-mensagem"></p>
                    <div class="modal-buttons">
                        <button id="modal-confirmar" class="modal-btn modal-btn-confirm">
                            <i class="fa-solid fa-check"></i> Confirmar
                        </button>
                        <button id="modal-cancelar" class="modal-btn modal-btn-cancel">
                            <i class="fa-solid fa-times"></i> Cancelar
                        </button>
                    </div>
                </div>
            </div>
        `;

        document.body.insertAdjacentHTML('beforeend', modalHTML);
        this.modal = document.getElementById('modal-confirmacao');

        // Fechar modal ao clicar no overlay
        this.modal.addEventListener('click', (e) => {
            if (e.target === this.modal) {
                this.fechar();
            }
        });

        // Fechar modal com ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.modal.classList.contains('show')) {
                this.fechar();
            }
        });
    }

    mostrar(titulo, mensagem, onConfirmar, onCancelar) {
        document.getElementById('modal-titulo').textContent = titulo;
        document.getElementById('modal-mensagem').textContent = mensagem;

        const btnConfirmar = document.getElementById('modal-confirmar');
        const btnCancelar = document.getElementById('modal-cancelar');

        // Remove listeners anteriores
        btnConfirmar.replaceWith(btnConfirmar.cloneNode(true));
        btnCancelar.replaceWith(btnCancelar.cloneNode(true));

        // Adiciona novos listeners
        document.getElementById('modal-confirmar').addEventListener('click', () => {
            this.fechar();
            if (onConfirmar) onConfirmar();
        });

        document.getElementById('modal-cancelar').addEventListener('click', () => {
            this.fechar();
            if (onCancelar) onCancelar();
        });

        this.modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    fechar() {
        this.modal.classList.remove('show');
        document.body.style.overflow = '';
    }
}

// Função global para mostrar modal
function mostrarModalConfirmacao(titulo, mensagem, onConfirmar, onCancelar) {
    if (!window.modalConfirmacaoInstance) {
        window.modalConfirmacaoInstance = new ModalConfirmacao();
    }
    window.modalConfirmacaoInstance.mostrar(titulo, mensagem, onConfirmar, onCancelar);
}

// Instância global
let modalConfirmacao;

document.addEventListener('DOMContentLoaded', function() {
    modalConfirmacao = new ModalConfirmacao();
    window.modalConfirmacaoInstance = modalConfirmacao;
});
