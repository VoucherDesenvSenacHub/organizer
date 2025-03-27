document.addEventListener('DOMContentLoaded', () => {
    let btn = document.querySelectorAll('.icon-title');
    const painel = document.querySelector('#control-painel');

    btn.forEach((item, index) => {
        item.addEventListener('click', () => {
            console.log(`Botão ${index + 1} clicado!`);

            // Exemplo de ação: mudar o fundo do painel
            painel.style.backgroundColor = index % 2 === 0 ? 'blue' : 'green';
        });
    });
});
