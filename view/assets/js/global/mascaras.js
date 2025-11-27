function aplicarMascara(valor, mascara) {
  valor = valor.replace(/\D/g, ""); // remove tudo que não for número
  let resultado = "";
  let indiceValor = 0;

  for (let i = 0; i < mascara.length; i++) {
    if (mascara[i] === "#") {
      if (indiceValor < valor.length) {
        resultado += valor[indiceValor];
        indiceValor++;
      } else {
        break; // para se não houver mais dígitos
      }
    } else {
      if (indiceValor < valor.length) {
        resultado += mascara[i]; // só adiciona fixo se já houver dígito
      }
    }
  }
  return resultado;
}

document.addEventListener("DOMContentLoaded", () => {
  // Aplica máscara em tempo real e também nos valores iniciais
  document.querySelectorAll("input[data-mask]").forEach(input => {
    const mascara = input.getAttribute("data-mask");

    // Aplica máscara no valor inicial (se já vier preenchido)
    if (input.value) {
      input.value = aplicarMascara(input.value, mascara);
    }

    // Continua aplicando em tempo real
    input.addEventListener("input", e => {
      e.target.value = aplicarMascara(e.target.value, mascara);
    });
  });

  // Remove máscara antes de enviar em todos os formulários
  document.querySelectorAll("form").forEach(form => {
    form.addEventListener("submit", function () {
      this.querySelectorAll("input[data-mask]").forEach(input => {
        input.value = input.value.replace(/\D/g, ""); // envia só números
      });
    });
  });
});