document.getElementById('imagens').addEventListener('change', function () {
  let qt_img = document.getElementById('qt-img');
  qt_img.innerText = `${this.files.length}/5`;
  if (this.files.length > 5) {
    alert('Você só pode enviar no máximo 5 arquivos!');
    qt_img.innerText = `0/5`;
    this.value = '';
  }
});

document.addEventListener("DOMContentLoaded", () => {
  const drop = document.querySelector("#form-filtro .drop");
  const dropTitle = drop.querySelector(".drop-title");
  const dropMenu = drop.querySelector(".drop-menu");
  const hiddenInput = document.querySelector("#status-hidden");
  const formFiltro = document.querySelector("#form-filtro");

  dropTitle.addEventListener("click", () => {
      drop.classList.toggle("open");
  });

  document.addEventListener("click", (e) => {
      if (!drop.contains(e.target)) {
          drop.classList.remove("open");
      }
  });

  dropMenu.querySelectorAll(".item").forEach(item => {
      item.addEventListener("click", () => {
          hiddenInput.value = item.dataset.value;
          formFiltro.submit();
      });
  });
});
