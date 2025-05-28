
    function blockpopup() {
        const popup = document.querySelector('.block-popup');
        if (popup) {
            popup.style.display = 'flex';
        }
    }

    function blockpopup2() {
        const popup2 = document.getElementById('block-popup2');
        const popup = document.querySelector('.block-popup');

        if (popup) popup.style.display = 'none';
        if (popup2) {
            popup2.style.display = 'flex';
            setTimeout(() => {
                popup2.style.display = 'none';
            }, 3000);
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const btnNao = document.getElementById('btn-nao');
        if (btnNao) {
            btnNao.addEventListener('click', () => {
                const popup = document.querySelector('.block-popup');
                if (popup) popup.style.display = 'none';
            });
        }
    });