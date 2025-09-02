/**
 * solicitacoes-ongs.js
 * Funcionalidade para aprovar/recusar cadastros de ONGs
 */

document.addEventListener('DOMContentLoaded', function() {
    // Aprovação
    document.querySelectorAll('.btn-aprovar').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const tipo = this.dataset.tipo;
            
            mostrarModalConfirmacao(
                'Aprovar ONG',
                'Tem certeza que deseja APROVAR o cadastro desta ONG?',
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
                'Recusar ONG',
                'Tem certeza que deseja RECUSAR o cadastro desta ONG?',
                () => processarSolicitacao(id, tipo, 'reject', this)
            );
        });
    });
});

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
            card.style.opacity = '0.5';
            card.style.pointerEvents = 'none';
            
            const status = acao === 'approve' ? 'aprovada' : 'recusada';
            alert(`ONG ${status} com sucesso!`);
            
            setTimeout(() => location.reload(), 1000);
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
