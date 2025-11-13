document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("form-filtros");
  const btnLimpar = document.querySelector(".limpar-filtro");
  const spinner = document.getElementById("spinner");
  const inputs = form.querySelectorAll("input");

  const temFiltroAtivo = () =>
    [...inputs].some(el =>
      (el.type === "text" && el.value.trim()) ||
      ((el.type === "radio" || el.type === "checkbox") && el.checked)
    );

  const atualizarBotao = () =>
    btnLimpar.style.display = temFiltroAtivo() ? "flex" : "none";

  // Eventos de mudança (delegação simplificada)
  inputs.forEach(el => el.addEventListener("input", atualizarBotao));
  atualizarBotao(); // estado inicial

  btnLimpar.addEventListener("click", e => {
    e.preventDefault();
    if (!temFiltroAtivo()) return;

    inputs.forEach(el => {
      if (el.type === "text") el.value = "";
      else el.checked = false;
    });

    btnLimpar.classList.add("limpando");
    spinner.style.display = "block";
    setTimeout(() => location.reload(), 800);
  });
});
