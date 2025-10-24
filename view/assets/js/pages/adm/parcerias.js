document.addEventListener('DOMContentLoaded', function() {
    console.log('Inicializando parcerias.js...');

    // Verificar se o modal está disponível
    if (typeof mostrarModalConfirmacao !== 'function') {
        console.error('Erro: função mostrarModalConfirmacao não encontrada! Verifique se modal-confirmacao.js foi carregado.');
        return;
    }

    // Definir status inicial baseado na URL
    const statusAtual = new URLSearchParams(window.location.search).get('aba') || 'solicitacoes';
    document.getElementById('status-parceria').value = statusAtual;

    // Event delegation para capturar cliques nos botões
    document.getElementById('control-box').addEventListener('click', function(e) {
        const btnAprovar = e.target.closest('.btn-aprovar');
        const btnRecusar = e.target.closest('.btn-recusar');
        
        if (btnAprovar || btnRecusar) {
            const button = btnAprovar || btnRecusar;
            const id = button.dataset.id;
            const tipo = button.dataset.tipo;
            const acao = btnAprovar ? 'approve' : 'reject';
            
            console.log('Botão clicado:', {
                tipo: tipo,
                id: id,
                acao: acao
            });

            if (!id) {
                console.error('Erro: ID não encontrado no botão');
                return;
            }

            mostrarModalConfirmacao(
                `${btnAprovar ? 'Aprovar' : 'Recusar'} Parceria`,
                `Tem certeza que deseja ${btnAprovar ? 'APROVAR' : 'RECUSAR'} a parceria com esta empresa?`,
                () => processarSolicitacao(id, tipo, acao, button)
            );
        }
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
    console.log('Processando solicitação:', { id, tipo, acao });

    const card = button.closest('.card-empresas');
    if (!card) {
        console.error('Erro: Card não encontrado!');
        return;
    }

    const buttons = card.querySelectorAll('button');
    console.log(`Desabilitando ${buttons.length} botões...`);

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