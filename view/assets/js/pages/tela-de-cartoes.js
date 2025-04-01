document.getElementById('addButton').addEventListener('click', function() {
    const button = this;
    const buttonText = button.querySelector('.button-text');
    const loader = button.querySelector('.loader');
    const checkmark = button.querySelector('.checkmark');
    
    // Mostra o loader e esconde o texto
    buttonText.classList.add('hidden');
    loader.classList.remove('hidden');
    
    // Simula um processamento (substitua por sua lógica real)
    setTimeout(function() {
      // Esconde o loader e mostra o checkmark
      loader.classList.add('hidden');
      checkmark.classList.remove('hidden');
      button.classList.add('success');
      
      // Opcional: Resetar após alguns segundos
      setTimeout(function() {
        checkmark.classList.add('hidden');
        buttonText.classList.remove('hidden');
        button.classList.remove('success');
      }, 2000); // Tempo que o checkmark fica visível
    }, 1500); // Tempo simulado de processamento
  });

 
 // Aguarda o carregamento completo da página
 window.onload = function() {
    // Seleciona todos os cartões
    const cartoes = document.querySelectorAll('.cartao');
    
    // Adiciona evento de clique a cada cartão
    cartoes.forEach(cartao => {
        cartao.addEventListener('click', function(e) {
            console.log('Cartão clicado!'); // Para debug
            
            // Previne outros eventos
            e.stopPropagation();
            e.preventDefault();
            
            // Mostra o popup
            document.getElementById('popup-excluir-cartao').style.display = 'flex';
            
            // Armazena o cartão clicado
            this.classList.add('cartao-selecionado');
        });
    });
    
    // Configura o botão NÃO
    document.getElementById('btnNo').addEventListener('click', function() {
        document.getElementById('popup-excluir-cartao').style.display = 'none';
        document.querySelector('.cartao-selecionado')?.classList.remove('cartao-selecionado');
    });
    
    // Configura o botão SIM
    document.getElementById('btnYes').addEventListener('click', function() {
        const popup = document.getElementById('popup-excluir-cartao');
        const cartaoSelecionado = document.querySelector('.cartao-selecionado');
        
        popup.style.display = 'none';
        document.getElementById('popup-exclusao-sucesso').style.display = 'flex';
        
        // Aqui você pode adicionar a lógica para excluir o cartão
        // cartaoSelecionado.remove();
    });
    
    // Configura o botão VOLTAR
    document.getElementById('btnBack').addEventListener('click', function() {
        document.getElementById('popup-exclusao-sucesso').style.display = 'none';
        document.querySelector('.cartao-selecionado')?.classList.remove('cartao-selecionado');
    });
    
    // Fechar popups ao clicar fora
    document.querySelectorAll('.popup-fundo').forEach(popup => {
        popup.addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
                document.querySelector('.cartao-selecionado')?.classList.remove('cartao-selecionado');
            }
        });
    });
    
    // Função global para compatibilidade
    window.abrir_popup = function(id) {
        document.getElementById(id).style.display = 'flex';
    };
};

document.querySelectorAll('.cartao').forEach(cartao => {
    cartao.addEventListener('click', () => console.log('Cartão clicado!'));
});

document.body.classList.add('debug');

cartao.addEventListener('mousedown', function(e) {
    e.preventDefault();
    e.stopPropagation();
    this.classList.add('cartao-pressionado');
});

cartao.addEventListener('mouseup', function() {
    if(this.classList.contains('cartao-pressionado')) {
        console.log('Cartão clicado!');
        document.getElementById('popup-excluir-cartao').style.display = 'flex';
    }
    this.classList.remove('cartao-pressionado');
});


document.getElementById('addButton').addEventListener('click', function() {
    const button = this;
    const buttonText = button.querySelector('.button-text');
    const loader = button.querySelector('.loader');
    const checkmark = button.querySelector('.checkmark');
    
    // Mostra o loader e esconde o texto
    buttonText.classList.add('hidden');
    loader.classList.remove('hidden');
    
    // Simula um processamento (substitua por sua lógica real)
    setTimeout(function() {
      // Esconde o loader e mostra o checkmark
      loader.classList.add('hidden');
      checkmark.classList.remove('hidden');
      button.classList.add('success');
      
      // Opcional: Resetar após alguns segundos
      setTimeout(function() {
        checkmark.classList.add('hidden');
        buttonText.classList.remove('hidden');
        button.classList.remove('success');
      }, 2000); // Tempo que o checkmark fica visível
    }, 1500); // Tempo simulado de processamento
  });