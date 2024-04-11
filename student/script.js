const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    })
    
}

if (close) {
    close.addEventListener('click', () => {
        nav.classList.remove('active');
    })
    
}

const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
let currentSlide = 0;

const slideInterval = setInterval(() => {
  slides[currentSlide].classList.remove('active');
  dots[currentSlide].classList.remove('active');
  currentSlide = (currentSlide + 1) % slides.length;
  slides[currentSlide].classList.add('active');
  dots[currentSlide].classList.add('active');
}, 3000);

dots.forEach((dot, index) => {
  dot.addEventListener('click', () => {
    clearInterval(slideInterval);
    slides[currentSlide].classList.remove('active');
    dots[currentSlide].classList.remove('active');
    currentSlide = index;
    slides[currentSlide].classList.add('active');
    dots[currentSlide].classList.add('active');
    slideInterval = setInterval(() => {
      slides[currentSlide].classList.remove('active');
      dots[currentSlide].classList.remove('active');
      currentSlide = (currentSlide + 1) % slides.length;
      slides[currentSlide].classList.add('active');
      dots[currentSlide].classList.add('active');
    }, 4000);
  });
});

// script.js

document.getElementById('contactLink').addEventListener('click', function(event) {
  event.preventDefault(); // Prevents the default link behavior

  // Scroll to the container element
  document.querySelector('.container').scrollIntoView({
    behavior: 'smooth' // You can change this to 'auto' for instant scrolling
  });
});

