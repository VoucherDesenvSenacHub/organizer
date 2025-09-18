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

function trocarAba(index) {
    const controlBox = document.getElementById('control-box');
    const buttons = document.getElementById('buttons');
    const btnSolicitacao = document.getElementById('btn-solicitacao');
    const btnAceitas = document.getElementById('btn-aceitas');

    if (index === 0) {
        controlBox.style.transform = 'translateX(0)';
        buttons.classList.remove('active');
        btnSolicitacao.style.color = '#fff';
        btnAceitas.style.color = 'var(--cor-principal)';
    } else {
        controlBox.style.transform = 'translateX(-100%)';
        buttons.classList.add('active');
        btnSolicitacao.style.color = 'var(--cor-principal)';
        btnAceitas.style.color = '#fff';
    }
}

function definirAbaInicial(index) {
    const controlBox = document.getElementById('control-box');
    const buttons = document.getElementById('buttons');
    const btnSolicitacao = document.getElementById('btn-solicitacao');
    const btnAceitas = document.getElementById('btn-aceitas');
    const url = new URL(window.location);

    if (index === 0) {
        controlBox.style.transform = 'translateX(0)';
        buttons.classList.remove('active');
        btnSolicitacao.style.color = '#fff';
        btnAceitas.style.color = 'var(--cor-principal)';
        url.searchParams.set('aba', 'solicitacoes');
    } else {
        controlBox.style.transform = 'translateX(-100%)';
        buttons.classList.add('active');
        btnSolicitacao.style.color = 'var(--cor-principal)';
        btnAceitas.style.color = '#fff';
        url.searchParams.set('aba', 'aceitas');
    }
    history.pushState({}, '', url);
}

// Função para processar a ação (aprovar/recusar)
function processarSolicitacao(id, tipo, acao, button) {
    const card = button.closest('.card-solicitacao-empresa');
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