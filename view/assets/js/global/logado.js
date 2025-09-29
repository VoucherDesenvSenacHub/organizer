// Funcionalidade de Favoritar/Desfavoritar Projetos e ONGs
document.addEventListener('click', async (e) => {
    const botao = e.target.closest('.btn-like');
    if (!botao) return;

    e.preventDefault();

    const tipo = botao.getAttribute('data-tipo');
    const id = botao.getAttribute('data-id');

    botao.disabled = true;
    try {
        const resposta = await fetch('../../../controller/Interacoes/FavoritarController.php', {
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

        exibir_toast(resultado.tipo, resultado.mensagem);

    } catch (error) {
        exibir_toast('erro', 'Algo deu errado!');
    } finally {
        botao.disabled = false;
    }
});

// Funcionalidade de Filtros nas paginas de Listagem
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#form-filtros');
    const resultado = document.querySelector('#resultado-filtros');
    const spinner = document.querySelector('#spinner');
    const tipo = form.dataset.tipo;

    const rotas = {
        ongs: '../../../controller/Ong/BuscarOngController.php',
        projetos: '../../../controller/Projeto/BuscarProjetoController.php',
        noticias: '../../../controller/Noticia/BuscarNoticiaController.php'
    };

    const aplicarFiltros = async (pagina = 1) => {
        const dados = new FormData(form);
        dados.append('pagina', pagina);

        spinner.style.display = 'flex';

        try {
            const resposta = await fetch(rotas[tipo], {
                method: 'POST',
                body: dados
            });

            const html = await resposta.text();
            resultado.innerHTML = html;

        } catch (error) {
            console.error('Erro ao buscar projetos:', error);
        } finally {
            spinner.style.display = 'none'; // esconde o spinner
        }
    };

    // Escuta mudanças nos filtros
    form.querySelectorAll('input').forEach(input => {
        input.addEventListener('change', () => aplicarFiltros());
    });

    form.querySelector('input[name="pesquisa"]').addEventListener('input', () => aplicarFiltros());

    form.addEventListener('submit', e => {
        e.preventDefault();
        aplicarFiltros();
    });

    // Escuta cliques na paginação
    resultado.addEventListener('click', e => {
        const link = e.target.closest('.paginacao a');
        if (link && link.dataset.pagina) {
            e.preventDefault();
            aplicarFiltros(link.dataset.pagina);
        }
    });

    // Carrega inicial
    aplicarFiltros();
});

