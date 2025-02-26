function clicar() {
    let animacao = document.getElementById ("download")
    animacao.style.display = 'flex'
    setTimeout(function() {
        animacao.style.display = 'none'
      }, 2500);
}

function loginPopup() {
  const fundoPopup = document.getElementById('fundo-popup');
  fundoPopup.classList.add('ativo');

  fundoPopup.addEventListener('click', (event) => {
      if (event.target === fundoPopup) {
          fundoPopup.classList.remove('ativo');
      }
  });
}
