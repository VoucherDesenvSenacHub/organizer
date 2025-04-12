// NAV-BAR MOBILE
function menu_mobile() {
    const nav_bar = document.getElementById('nav-bar');
    const hamburguer = document.getElementById('hamburguer');
    nav_bar.classList.toggle('active');
    hamburguer.classList.toggle('active');
}

function clicar() {
    let animacao = document.getElementById("download")
    animacao.style.display = 'flex'
    setTimeout(function () {
        animacao.style.display = 'none'
    }, 2500);
}

window.addEventListener('resize', () => {
    const nav_bar = document.getElementById('nav-bar');
    const hamburguer = document.getElementById('hamburguer');
    if (window.innerWidth > 700 && nav_bar.classList.contains('active')) {
        nav_bar.classList.remove('active');
        hamburguer.classList.remove('active');
    }
});
window.addEventListener('load', function () {
    const ctx = document.getElementById('graficoDoacoes').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Projeto A', 'Projeto B', 'Projeto C'],
            datasets: [{
                data: [100, 100, 150], // valores
                backgroundColor: ['#FF6384', '#007bff', '#fbc02d'],
                borderWidth: 4
            }]
        },
        options: {
            responsive: false, // fixar o tamanho
            plugins: {
                legend: {
                    display: false // usamos legenda custom
                }
            }
        }
    });
});
