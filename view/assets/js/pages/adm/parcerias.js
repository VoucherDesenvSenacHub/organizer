document.addEventListener('DOMContentLoaded', function() {
    // Definir aba ativa baseada na URL
    const abaAtiva = '<?= $abaAtiva ?>';
    if (abaAtiva === 'aceitas') {
        definirAbaInicial(1);
    } else {
        definirAbaInicial(0);
    }

    // Funcionalidade para aprovar/recusar parcerias com empresas
    document.querySelectorAll('.btn-aprovar').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const tipo = this.dataset.tipo;

            mostrarModalConfirmacao(
                'Aprovar Parceria',
                'Tem certeza que deseja APROVAR a parceria com esta empresa?',
                () => processarSolicitacao(id, tipo, 'approve', this)
            );
        });
    });

    // Recusa
    document.querySelectorAll('.btn-recusar').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const tipo = this.dataset.tipo;

            mostrarModalConfirmacao(
                'Recusar Parceria',
                'Tem certeza que deseja RECUSAR a parceria com esta empresa?',
                () => processarSolicitacao(id, tipo, 'reject', this)
            );
        });
    });
});

const cards = document.querySelector('#control-box');
const btn = document.querySelector('#buttons')
let box = document.querySelectorAll('.box-cards');

function trocarAba(index) {
    const altura = box[index].offsetHeight;
    const deslocamento = index * (cards.offsetWidth + 20);
    cards.style.transform = `translateX(-${deslocamento}px)`;
    cards.style.height = `${altura}px`;
    index == 1 ? btn.classList.add('active') : btn.classList.remove('active');
}

function definirAbaInicial(index) {
    const altura = box[index].offsetHeight;
    const deslocamento = index * (cards.offsetWidth + 30);
    cards.style.transform = `translateX(-${deslocamento}px)`;
    cards.style.height = `${altura}px`;
    cards.style.transition = 'none'; // Remove transição para posicionamento inicial
    
    // Remove transição do pseudo-elemento ::after dos botões
    const style = document.createElement('style');
    style.textContent = '#buttons::after { transition: none !important; }';
    document.head.appendChild(style);
    
    // Define estado visual dos botões sem animação
    if (index == 1) {
        btn.classList.add('active');
    } else {
        btn.classList.remove('active');
    }
    
    // Restaura as transições após um pequeno delay
    setTimeout(() => {
        cards.style.transition = '';
        document.head.removeChild(style);
    }, 50);
}

// Função para processar a ação (aprovar/recusar)
function processarSolicitacao(id, tipo, acao, button) {
    const card = button.closest('.card-empresas');
    const buttons = card.querySelectorAll('button');

    buttons.forEach(btn => btn.disabled = true);

    fetch('../../../controller/SolicitacoesController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ tipo: tipo, id: parseInt(id), acao: acao })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(`Parceria ${acao === 'approve' ? 'aprovada' : 'recusada'} com sucesso!`);
            location.reload();
        } else {
            buttons.forEach(btn => btn.disabled = false);
            alert('Erro ao processar ação: ' + (data.error || 'Erro desconhecido'));
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        buttons.forEach(btn => btn.disabled = false);
        alert('Erro de conexão. Tente novamente.');
    });
}