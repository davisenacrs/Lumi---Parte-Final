// Instância do primeiro carrossel
var swiper1 = new Swiper("#carousel1 .slide-container", {
  slidesPerView: 4,
  spaceBetween: 20,
  slidesPerGroup: 1, // Alterado para mover apenas um filme por vez
  loop: true,
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".pagination1", // Seletores específicos para o primeiro carrossel
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-navBtn1.swiper-button-next", // Correto para avançar
    prevEl: ".swiper-navBtn1.swiper-button-prev", // Correto para retroceder
  },
  on: {
    init: function () {
      console.log("Swiper1 inicializado!");
    },
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1000: {
      slidesPerView: 4,
    },
  },
});

// Instância do segundo carrossel
var swiper2 = new Swiper("#carousel2 .slide-container", {
  slidesPerView: 4,
  spaceBetween: 20,
  slidesPerGroup: 1, // Alterado para mover apenas um filme por vez
  loop: true,
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".pagination2", // Seletores específicos para o segundo carrossel
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-navBtn2.swiper-button-next", // Correto para avançar
    prevEl: ".swiper-navBtn2.swiper-button-prev", // Correto para retroceder
  },
  on: {
    init: function () {
      console.log("Swiper2 inicializado!");
    },
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1000: {
      slidesPerView: 4,
    },
  },
});

// Instância do terceiro carrossel
var swiper3 = new Swiper("#carousel3 .slide-container", {
  slidesPerView: 4,
  spaceBetween: 20,
  slidesPerGroup: 1, // Alterado para mover apenas um filme por vez
  loop: true,
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".pagination3", // Seletores específicos para o terceiro carrossel
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-navBtn3.swiper-button-next", // Correto para avançar
    prevEl: ".swiper-navBtn3.swiper-button-prev", // Correto para retroceder
  },
  on: {
    init: function () {
      console.log("Swiper3 inicializado!");
    },
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1000: {
      slidesPerView: 4,
    },
  },
});

// Instância do quarto carrossel
var swiper4 = new Swiper("#carousel4 .slide-container", {
  slidesPerView: 4,
  spaceBetween: 20,
  slidesPerGroup: 1, // Move um slide por vez
  loop: true,
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".pagination4", // Seletores específicos para o quarto carrossel
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-navBtn4.swiper-button-next", // Botão de avançar
    prevEl: ".swiper-navBtn4.swiper-button-prev", // Botão de retroceder
  },
  on: {
    init: function () {
      console.log("Swiper4 inicializado!");
    },
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1000: {
      slidesPerView: 4,
    },
  },
});
