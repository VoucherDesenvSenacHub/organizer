let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;
const carouselImgs = document.querySelector('#carousel-imgs');

function changeSlide() {
    currentIndex = (currentIndex + 1) % totalItems;
    const offset = -currentIndex * 410;

    carouselImgs.style.transform = `translateX(${offset}px)`;
}

setInterval(changeSlide, 2500);

document.addEventListener('DOMContentLoaded', function () {
  // Inicializar os ícones Lucide
  lucide.createIcons();

  // Função para alternar o estado do accordion
  function toggleAccordion(accordionItem) {
    const isActive = accordionItem.classList.contains('active');

    // Fechar todos os itens ativos
    document.querySelectorAll('.ONG-accordion-item').forEach(item => {
      item.classList.remove('active');
    });

    // Se o item clicado não estava ativo, torná-lo ativo
    if (!isActive) {
      accordionItem.classList.add('active');
    }
  }

  // Função para lidar com a edição de campos
  function handleEdit(event) {
    event.stopPropagation(); // Evitar que o accordion feche ao clicar no botão de edição

    // Obter o campo que está sendo editado
    const inputContainer = this.closest('.ONG-input-container');
    const input = inputContainer.querySelector('span, textarea');

    // Tornar o campo editável
    input.contentEditable = true;
    input.focus();

    // Adicionar classe para indicar que o campo está sendo editado
    input.classList.add('editing');

    // Adicionar evento para sair do modo de edição ao pressionar "Enter"
    input.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        input.contentEditable = false;
        input.classList.remove('editing');
      }
    });
  }

  // Função para salvar todas as alterações
  function saveAllChanges() {
    let isValid = true;
    const editedFields = [];

    // Coletar todos os campos editados
    document.querySelectorAll('.ONG-input-container span.editing, .ONG-input-container textarea.editing').forEach(input => {
      // Validação básica (campo não pode estar vazio)
      if (input.textContent.trim() === '') {
        alert('Um ou mais campos estão vazios!');
        isValid = false;
        return;
      }

      // Validação de e-mail (se o campo for um e-mail)
      const label = input.closest('.ONG-form-group').querySelector('label').textContent.toLowerCase();
      if (label.includes('email')) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(input.textContent.trim())) {
          alert('Por favor, insira um e-mail válido!');
          isValid = false;
          return;
        }
      }

      // Adicionar à lista de campos editados
      editedFields.push({
        field: input.closest('.ONG-form-group').querySelector('label').textContent,
        value: input.textContent.trim()
      });

      // Remover classe de edição
      input.classList.remove('editing');
      input.contentEditable = false;
    });

    // Verificar checkboxes selecionados
    const checkedBoxes = document.querySelectorAll('.ONG-checkbox-container input[type="checkbox"]:checked');
    const selectedAreas = Array.from(checkedBoxes).map(cb => {
    const label = document.querySelector(`label[for="${cb.id}"]`);
      return label ? label.textContent : cb.id;
    });

    if (selectedAreas.length > 0) {
      editedFields.push({
      field: 'Áreas de atuação',
      value: selectedAreas.join(', ')
    });
    }

    // Se todos os campos são válidos, salvar as alterações
    if (isValid && editedFields.length > 0) {
      alert(`Alterações salvas com sucesso!\n\n${editedFields.map(field => `${field.field}: ${field.value}`).join('\n')}`);
      } else if (editedFields.length === 0) {
        alert('Nenhuma alteração foi feita.');
    }

  }

  // Adicionar evento de clique a cada header de accordion
  const accordionHeaders = document.querySelectorAll('.ONG-accordion-header');
  accordionHeaders.forEach(header => {
    header.addEventListener('click', function () {
      const accordionItem = this.parentElement;
      toggleAccordion(accordionItem);
    });
  });

  // Adicionar evento de clique aos botões de edição
  const editButtons = document.querySelectorAll('.ONG-edit-btn');
  editButtons.forEach(button => {
    button.addEventListener('click', handleEdit);
  });

  // Adicionar evento de clique ao botão "Salvar Alteração"
  const saveButton = document.querySelector('.ONG-save-button');
  if (saveButton) {
    saveButton.addEventListener('click', saveAllChanges);
  } else {
    // Se o botão não existir, criar um
    const saveButtonContainer = document.createElement('div');
    saveButtonContainer.className = 'ONG-save-button-container';
    
    const newSaveButton = document.createElement('button');
    newSaveButton.className = 'ONG-save-button';
    newSaveButton.textContent = 'Salvar Alteração';
    newSaveButton.addEventListener('click', saveAllChanges);
    
    saveButtonContainer.appendChild(newSaveButton);
    document.querySelector('.ONG-container').appendChild(saveButtonContainer);
  }
});