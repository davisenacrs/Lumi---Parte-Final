document.addEventListener('DOMContentLoaded', function () {
    const carousels = document.querySelectorAll('.carousel');

    carousels.forEach(carousel => {
        const items = carousel.querySelector('.carousel-items');
        const prevButton = carousel.querySelector('.prev-button');
        const nextButton = carousel.querySelector('.next-button');
        let currentIndex = 0;

        // Função para mover o carrossel
        function moveToIndex(index) {
            items.style.transform = `translateX(-${index * 100}%)`;
        }

        // Navegação com botões
        prevButton.addEventListener('click', function () {
            currentIndex = (currentIndex - 1 + items.children.length) % items.children.length;
            moveToIndex(currentIndex);
        });

        nextButton.addEventListener('click', function () {
            currentIndex = (currentIndex + 1) % items.children.length;
            moveToIndex(currentIndex);
        });

        // Rotação automática
        setInterval(function () {
            currentIndex = (currentIndex + 1) % items.children.length;
            moveToIndex(currentIndex);
        }, 3000); // Troca de item a cada 3 segundos
    });
});
