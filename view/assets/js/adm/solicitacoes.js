/**
 * solicitacoes.js
 * Comportamento dos cards de solicitações no painel admin
 */

(function () {
  function injectStyles() {
    const css = `
      #section-solicitacao .card-adm.expanded { 
        flex: 1 1 100%; 
        width: 100%; 
        min-height: 320px; 
      }
      #section-solicitacao .card-adm.hidden { 
        display: none; 
      }

      #section-solicitacao .card-adm .solic-wrapper { 
        display: flex; 
        flex-direction: column; 
        gap: 12px; 
        padding: 10px; 
      }
      
      #section-solicitacao .card-adm .solic-head { 
        display: flex; 
        align-items: center; 
        justify-content: space-between; 
        gap: 10px; 
      }
      
      #section-solicitacao .card-adm .solic-title { 
        margin: 0; 
        padding: 0; 
        border: none; 
      }
      
      #section-solicitacao .card-adm .solic-subtitle { 
        margin: 0; 
        color: rgba(0,0,0,.6); 
      }

      #section-solicitacao .card-adm .solic-back {
        border: 1px solid var(--cor-roxo-adm, #6f42c1);
        background: #fff;
        color: var(--cor-roxo-adm, #6f42c1);
        padding: 6px 10px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.9rem;
      }

      #section-solicitacao .card-adm .solic-back:hover {
        background: var(--cor-roxo-adm, #6f42c1);
        color: #fff;
      }

      #section-solicitacao .card-adm .solic-list { 
        display: flex; 
        flex-direction: column; 
        gap: 8px; 
        margin: 0; 
        padding: 0; 
        list-style: none; 
      }
      
      #section-solicitacao .card-adm .solic-item {
        display: flex; 
        flex-wrap: wrap; 
        justify-content: space-between; 
        gap: 8px;
        background: #f5f5f5; 
        padding: 10px; 
        border-radius: 6px;
      }
      
      #section-solicitacao .card-adm .solic-info { 
        display: flex; 
        flex-direction: column; 
        gap: 4px; 
        min-width: 240px; 
      }
      
      #section-solicitacao .card-adm .muted { 
        color: rgba(0,0,0,.6); 
        font-size: 0.9rem; 
      }

      #section-solicitacao .card-adm .solic-actions { 
        display: flex; 
        gap: 8px; 
        align-items: center; 
      }
      
      #section-solicitacao .card-adm .solic-btn {
        background-color: var(--cor-roxo-adm, #6f42c1);
        color: #fff;
        border: none; 
        border-radius: 4px; 
        padding: 6px 10px; 
        cursor: pointer;
        transition: filter .2s ease;
        font-size: 0.85rem;
      }
      
      #section-solicitacao .card-adm .solic-btn:hover { 
        filter: brightness(.9); 
      }
      
      #section-solicitacao .card-adm .solic-btn.outline {
        background: #fff; 
        color: var(--cor-roxo-adm, #6f42c1); 
        border: 1px solid var(--cor-roxo-adm, #6f42c1);
      }
      
      #section-solicitacao .card-adm .solic-btn[disabled] { 
        opacity: .6; 
        cursor: not-allowed; 
      }

      #section-solicitacao .card-adm .solic-status { 
        font-weight: 600; 
        margin-top: 4px;
      }
      
      #section-solicitacao .card-adm .is-approved .solic-status { 
        color: #28a745; 
      }
      
      #section-solicitacao .card-adm .is-rejected .solic-status { 
        color: #dc3545; 
      }

      #section-solicitacao .card-adm .loading {
        text-align: center;
        padding: 20px;
        color: rgba(0,0,0,.6);
      }

      #section-solicitacao .card-adm .error {
        text-align: center;
        padding: 20px;
        color: #dc3545;
        background: #f8d7da;
        border-radius: 4px;
        margin: 10px 0;
      }

      #section-solicitacao .card-adm .empty {
        text-align: center;
        padding: 20px;
        color: rgba(0,0,0,.6);
        font-style: italic;
      }
    `;
    
    const style = document.createElement('style');
    style.setAttribute('data-solicitacoes', 'true');
    style.textContent = css;
    document.head.appendChild(style);
  }

  function ready(fn) {
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', fn);
    } else {
      fn();
    }
  }

  ready(function () {
    injectStyles();

    const container = document.querySelector('fieldset#section-solicitacao');
    if (!container) return;

    const cards = Array.from(container.querySelectorAll('.card-adm'));
    if (cards.length === 0) return;

    function getCardKey(card) {
      const title = (card.querySelector('h4')?.textContent || '').trim().toUpperCase();
      if (title.includes('ONG')) return 'ongs';
      if (title.includes('EMPRES')) return 'empresas';
      if (title.includes('INATIV')) return 'inativar';
      return 'default';
    }

    function renderItemHTML(key, item) {
      if (key === 'empresas') {
        return `
          <li class="solic-item" data-id="${item.id}">
            <div class="solic-info">
              <strong>${item.nome}</strong>
              <span class="muted">Contato: ${item.contato}</span>
              <span class="muted">"${item.mensagem || 'Sem descrição'}" • ${item.criadoEm}</span>
            </div>
            <div class="solic-actions">
              <button type="button" class="solic-btn solic-approve" data-id="${item.id}">Aprovar</button>
              <button type="button" class="solic-btn outline solic-reject" data-id="${item.id}">Recusar</button>
            </div>
          </li>
        `;
      }
      if (key === 'ongs') {
        return `
          <li class="solic-item" data-id="${item.id}">
            <div class="solic-info">
              <strong>${item.nome}</strong>
              <span class="muted">Responsável: ${item.responsavel}</span>
              <span class="muted">"${item.mensagem || 'Sem descrição'}" • ${item.criadoEm}</span>
            </div>
            <div class="solic-actions">
              <button type="button" class="solic-btn solic-approve" data-id="${item.id}">Aprovar</button>
              <button type="button" class="solic-btn outline solic-reject" data-id="${item.id}">Recusar</button>
            </div>
          </li>
        `;
      }

      return `
        <li class="solic-item" data-id="${item.id}">
          <div class="solic-info">
            <strong>${item.projeto}</strong>
            <span class="muted">ONG: ${item.ong}</span>
            <span class="muted">Motivo: ${item.motivo || 'Não informado'} • ${item.criadoEm}</span>
          </div>
          <div class="solic-actions">
            <button type="button" class="solic-btn solic-approve" data-id="${item.id}">Confirmar</button>
            <button type="button" class="solic-btn outline solic-reject" data-id="${item.id}">Cancelar</button>
          </div>
        </li>
      `;
    }

    function collapseAll() {
      cards.forEach((c) => {
        c.classList.remove('expanded', 'hidden');
        const original = c.dataset.originalHtml;
        if (original) {
          c.innerHTML = original;
          delete c.dataset.originalHtml;
        }
      });
    }

    function handleAction(card, key, id, action) {
      const li = card.querySelector(`.solic-item[data-id="${id}"]`);
      if (!li) return;

      const buttons = li.querySelectorAll('button');
      buttons.forEach(btn => btn.setAttribute('disabled', 'true'));

      fetch('../../controller/SolicitacoesController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ tipo: key, id: parseInt(id), acao: action })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          let status = li.querySelector('.solic-status');
          if (!status) {
            status = document.createElement('span');
            status.className = 'solic-status';
            const info = li.querySelector('.solic-info');
            info && info.appendChild(status);
          }
          
          status.textContent = action === 'approve' ? 'Aprovado' : 'Recusado';
          li.classList.add(action === 'approve' ? 'is-approved' : 'is-rejected');
        } else {
          buttons.forEach(btn => btn.removeAttribute('disabled'));
          alert('Erro ao processar ação: ' + (data.error || 'Erro desconhecido'));
        }
      })
      .catch(error => {
        console.error('Erro:', error);
        buttons.forEach(btn => btn.removeAttribute('disabled'));
        alert('Erro de conexão. Tente novamente.');
      });
    }

    function expandCard(card) {
      const key = getCardKey(card);

      if (!card.dataset.originalHtml) {
        card.dataset.originalHtml = card.innerHTML;
      }

      cards.forEach((c) => {
        if (c !== card) c.classList.add('hidden');
      });

      card.classList.add('expanded');

      const titleText = card.querySelector('h4')?.textContent ?? '';

      const wrapper = document.createElement('div');
      wrapper.className = 'solic-wrapper';
      wrapper.innerHTML = `
        <div class="solic-head">
          <h4 class="solic-title">${titleText}</h4>
          <div class="solic-head-actions">
            <button type="button" class="solic-back" aria-label="Voltar para cartões">Voltar</button>
          </div>
        </div>
        <p class="solic-subtitle">Aprove ou recuse as solicitações abaixo.</p>
        <div class="loading">Carregando solicitações...</div>
      `;

      card.innerHTML = '';
      card.appendChild(wrapper);

      card.querySelector('.solic-back')?.addEventListener('click', collapseAll);

      fetch(`../../controller/SolicitacoesController.php?tipo=${key}`)
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            const items = data.data || [];
            
            if (items.length === 0) {
              wrapper.querySelector('.loading').outerHTML = '<div class="empty">Nenhuma solicitação pendente.</div>';
            } else {
              const listHTML = `
                <ul class="solic-list" role="list">
                  ${items.map((item) => renderItemHTML(key, item)).join('')}
                </ul>
              `;
              wrapper.querySelector('.loading').outerHTML = listHTML;

              card.querySelectorAll('.solic-approve').forEach((btn) => {
                btn.addEventListener('click', () => handleAction(card, key, btn.getAttribute('data-id'), 'approve'));
              });
              card.querySelectorAll('.solic-reject').forEach((btn) => {
                btn.addEventListener('click', () => handleAction(card, key, btn.getAttribute('data-id'), 'reject'));
              });
            }
          } else {
            wrapper.querySelector('.loading').outerHTML = `<div class="error">Erro ao carregar dados: ${data.error || 'Erro desconhecido'}</div>`;
          }
        })
        .catch(error => {
          console.error('Erro:', error);
          wrapper.querySelector('.loading').outerHTML = '<div class="error">Erro de conexão. Tente recarregar a página.</div>';
        });
    }

    container.addEventListener('click', function (e) {
      const card = e.target.closest('.card-adm');
      if (!card || !container.contains(card)) return;

      const anchor = e.target.closest('a');
      if (anchor) e.preventDefault();

      if (!card.classList.contains('expanded')) {
        expandCard(card);
      }
    });
  });
})();
