document.addEventListener('DOMContentLoaded', function() {
    // Definir status inicial baseado na URL
    const statusAtual = new URLSearchParams(window.location.search).get('aba') || 'solicitacoes';
    document.getElementById('status-parceria').value = statusAtual;
    mostrarLista(statusAtual);

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

function mudarStatus(status) {
    // Redirecionar para a nova URL
    const url = new URL(window.location.href);
    url.searchParams.set('aba', status);
    window.location.href = url.toString();
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