document.addEventListener('DOMContentLoaded', () => {
    let btns = document.querySelectorAll('.icon-title');
    let container = document.querySelectorAll('.container-painel');
    const div = document.querySelector('#control-painel');

    // Definir a altura inicial do painel com o primeiro container
    let alturaInicial = container[0].offsetHeight;
    div.style.height = `${alturaInicial}px`; // Ajusta a altura na carga da página

    // Configuração de clique nos botões
    btns.forEach((item, index) => {
        item.addEventListener('click', () => {
            // Remove a classe 'active' de todos os botões e containers
            btns.forEach(i => i.classList.remove('active'));
            container.forEach(i => i.classList.remove('active'));

            // Adiciona 'active' ao item clicado e ao container correspondente
            item.classList.add('active');

            // Atualiza a altura da div e o valor de 'transform' no clique
            let altura = container[index].offsetHeight;
            let tamanho = div.offsetWidth + 10;
            div.style.transform = `translate(-${tamanho * index}px)`;
            div.style.height = `${altura}px`;
        });
    });
});
