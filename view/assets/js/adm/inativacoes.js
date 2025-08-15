/**
 * inativacoes.js
 * Funcionalidade para confirmar/cancelar inativações de projetos
 */

document.addEventListener('DOMContentLoaded', function() {
    // Aprovação
    document.querySelectorAll('.btn-aprovar').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const tipo = this.dataset.tipo;
            
            if (confirm('Confirmar inativação do projeto?')) {
                processarSolicitacao(id, tipo, 'approve', this);
            }
        });
    });
    
    // Recusa
    document.querySelectorAll('.btn-recusar').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const tipo = this.dataset.tipo;
            
            if (confirm('Cancelar solicitação de inativação?')) {
                processarSolicitacao(id, tipo, 'reject', this);
            }
        });
    });
});

function processarSolicitacao(id, tipo, acao, button) {
    const card = button.closest('.card-solicitacao-empresa');
    const buttons = card.querySelectorAll('button');
    
    buttons.forEach(btn => btn.disabled = true);
    
    fetch('../../controller/SolicitacoesController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ tipo: tipo, id: parseInt(id), acao: acao })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            card.style.opacity = '0.5';
            card.style.pointerEvents = 'none';
            
            const status = acao === 'approve' ? 'confirmada' : 'cancelada';
            alert(`Solicitação ${status} com sucesso!`);
            
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
