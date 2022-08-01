function importarScript() {
  var s = document.createElement("script");
  s.src =
    "http://localhost/wordpress/wp-content/themes/my_theme/assets/js/swiper-bundle.min.js";
  document.querySelector("head").appendChild(s);
}
importarScript();
let slideIndex = 1;

showSlides(slideIndex);

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let i;
  let slides = document.querySelectorAll(".mySlides");
  let quadrates = document.querySelectorAll(".quadrate");
  if (n > slides.length) slideIndex = 1;
  if (n < 1) slideIndex = slides.length;
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < quadrates.length; i++) {
    quadrates[i].className = quadrates[i].className.replace("active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  quadrates[slideIndex - 1].className += " active";
}

var swiper = new Swiper(".slide-content", {
  slidesPerView: 3,
  spaceBetween: 25,
  loop: true,
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    950: {
      slidesPerView: 3,
    },
  },
});

const imgGallery = document.querySelector(".slide-content");
const arrow = document.querySelectorAll(".arrow-class");
