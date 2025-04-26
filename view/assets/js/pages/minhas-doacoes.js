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

function formatarCor(cor, fallback = "#ccc") {
    const el = document.createElement("div");
    el.style.color = "";
    el.style.color = cor;
    return el.style.color ? cor : fallback;
  }

  const porcentagens = [25, 15, 60]; // Soma 100%
  const nomes = ['PROJETO A', 'PROJETO B', 'PROJETO C'];
  const coresOriginais = ['#007AFF', '#FF5A79', '#FCC21B']; // Novas cores

  const cores = coresOriginais.map(cor => formatarCor(cor));

  const data = porcentagens.map((valor, index) => ({
    label: nomes[index],
    value: valor,
    color: cores[index]
  }));

  const chart = document.getElementById("chart");
  const tooltip = document.getElementById("tooltip");
  const legend = document.getElementById("legend");

  // Cria o gradiente
  let currentAngle = 0;
  const gradientParts = data.map(item => {
    const angle = (item.value / 100) * 360;
    const part = `${item.color} ${currentAngle}deg ${currentAngle + angle}deg`;
    currentAngle += angle;
    return part;
  });
  chart.style.background = `conic-gradient(${gradientParts.join(", ")})`;

  // Cria setores interativos
  const overlay = document.createElement("div");
  overlay.className = "sector-overlay";
  chart.appendChild(overlay);

  let startAngle = 0;
  data.forEach((item) => {
    const angle = (item.value / 100) * 360;
    const sector = document.createElement("div");
    sector.className = "sector";
    sector.dataset.tooltip = `${item.label} - ${item.value}%`;
    sector.style.transform = `rotate(${startAngle}deg)`;
    overlay.appendChild(sector);
    startAngle += angle;
  });

  // Tooltip
  const sectors = document.querySelectorAll(".sector");
  sectors.forEach(sector => {
    sector.addEventListener("mousemove", e => {
      const rect = chart.getBoundingClientRect();
      tooltip.textContent = sector.dataset.tooltip;
      tooltip.style.display = "block";
      tooltip.style.left = `${e.clientX - rect.left + 10}px`;
      tooltip.style.top = `${e.clientY - rect.top - 20}px`;
    });

    sector.addEventListener("mouseleave", () => {
      tooltip.style.display = "none";
    });
  });

  // Legenda
  data.forEach(item => {
    const itemDiv = document.createElement("div");
    itemDiv.className = "legend-item";
    itemDiv.innerHTML = `<div style="background-color: ${item.color};"></div><span>${item.label}</span>`;
    legend.appendChild(itemDiv);
  });