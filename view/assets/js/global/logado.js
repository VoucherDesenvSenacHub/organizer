// Funcionalidade de Favoritar/Desfavoritar Projetos e ONGs
document.querySelectorAll('.btn-like').forEach(botao => {
    botao.addEventListener('click', async (e) => {
        e.preventDefault();

        const tipo = botao.getAttribute('data-tipo'); // 'projeto' ou 'ong'
        const id = botao.getAttribute('data-id');

        botao.disabled = true;
        try {
            const resposta = await fetch('../.././../controller/Interacoes/FavoritarController.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `id=${id}&tipo=${tipo}`
            });

            const resultado = await resposta.json();

            if (resultado.tipo === 'favorito') {
                botao.classList.add('favoritado');
            } else if (resultado.tipo === 'desfavorito') {
                botao.classList.remove('favoritado');
            }

            // Exibe o toast
            exibir_toast(resultado.tipo, resultado.mensagem);

        } catch (error) {
            // console.error('Erro:', error);
            exibir_toast('erro', 'Algo deu errado!');
        } finally {
            botao.disabled = false;
        }
    });
});