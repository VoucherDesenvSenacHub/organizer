let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;
const carouselImgs = document.querySelector('#carousel-imgs');

function changeSlide() {
    currentIndex = (currentIndex + 1) % totalItems;
    const offset = -currentIndex * 410;

    carouselImgs.style.transform = `translateX(${offset}px)`;
}

setInterval(changeSlide, 2500);
