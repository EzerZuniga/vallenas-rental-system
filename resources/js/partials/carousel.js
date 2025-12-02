class CarouselHero {
  constructor(element) {
    this.carousel = element;
    this.slides = element.querySelector('.carousel-slides');
    this.slideElements = element.querySelectorAll('.carousel-slide');
    this.indicators = element.querySelectorAll('.carousel-indicator');
    this.prevBtn = element.querySelector('.carousel-nav-prev');
    this.nextBtn = element.querySelector('.carousel-nav-next');

    this.currentIndex = 0;
    this.totalSlides = this.slideElements.length;
    this.autoplayInterval = null;
    this.autoplayDelay = 5000;
    this.isTransitioning = false;
    this.touchStartX = 0;
    this.touchEndX = 0;

    this.init();
  }

  init() {
    if (this.totalSlides === 0) return;

    // Establecer slide inicial
    this.updateSlide(0);

    // Event listeners para botones
    if (this.prevBtn) {
      this.prevBtn.addEventListener('click', () => this.prev());
    }

    if (this.nextBtn) {
      this.nextBtn.addEventListener('click', () => this.next());
    }

    // Event listeners para indicadores
    this.indicators.forEach((indicator, index) => {
      indicator.addEventListener('click', () => this.goToSlide(index));
    });

    // Soporte táctil (swipe)
    this.carousel.addEventListener(
      'touchstart',
      (e) => {
        this.touchStartX = e.changedTouches[0].screenX;
      },
      { passive: true }
    );

    this.carousel.addEventListener(
      'touchend',
      (e) => {
        this.touchEndX = e.changedTouches[0].screenX;
        this.handleSwipe();
      },
      { passive: true }
    );

    // Navegación por teclado
    this.carousel.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowLeft') {
        e.preventDefault();
        this.prev();
      } else if (e.key === 'ArrowRight') {
        e.preventDefault();
        this.next();
      }
    });

    // Pausar al hacer hover
    this.carousel.addEventListener('mouseenter', () => this.pauseAutoplay());
    this.carousel.addEventListener('mouseleave', () => this.resumeAutoplay());

    // Pausar cuando la pestaña no está visible
    document.addEventListener('visibilitychange', () => {
      if (document.hidden) {
        this.pauseAutoplay();
      } else {
        this.resumeAutoplay();
      }
    });

    // Iniciar autoplay
    this.startAutoplay();
  }

  updateSlide(index) {
    this.currentIndex = index;
    const offset = -index * 100;
    this.slides.style.transform = `translateX(${offset}%)`;

    // Actualizar indicadores
    this.indicators.forEach((indicator, i) => {
      if (i === index) {
        indicator.classList.add('active');
        indicator.setAttribute('aria-current', 'true');
      } else {
        indicator.classList.remove('active');
        indicator.setAttribute('aria-current', 'false');
      }
    });

    // Actualizar slides
    this.slideElements.forEach((slide, i) => {
      if (i === index) {
        slide.classList.add('active');
      } else {
        slide.classList.remove('active');
      }
    });
  }

  next() {
    if (this.isTransitioning) return;

    this.isTransitioning = true;
    const nextIndex = (this.currentIndex + 1) % this.totalSlides;
    this.updateSlide(nextIndex);

    setTimeout(() => {
      this.isTransitioning = false;
    }, 600);

    this.resetAutoplay();
  }

  prev() {
    if (this.isTransitioning) return;

    this.isTransitioning = true;
    const prevIndex = (this.currentIndex - 1 + this.totalSlides) % this.totalSlides;
    this.updateSlide(prevIndex);

    setTimeout(() => {
      this.isTransitioning = false;
    }, 600);

    this.resetAutoplay();
  }

  goToSlide(index) {
    if (this.isTransitioning || index === this.currentIndex) return;

    this.isTransitioning = true;
    this.updateSlide(index);

    setTimeout(() => {
      this.isTransitioning = false;
    }, 600);

    this.resetAutoplay();
  }

  handleSwipe() {
    const swipeThreshold = 50;
    const diff = this.touchStartX - this.touchEndX;

    if (Math.abs(diff) > swipeThreshold) {
      if (diff > 0) {
        this.next();
      } else {
        this.prev();
      }
    }
  }

  startAutoplay() {
    this.autoplayInterval = setInterval(() => {
      this.next();
    }, this.autoplayDelay);
  }

  pauseAutoplay() {
    if (this.autoplayInterval) {
      clearInterval(this.autoplayInterval);
      this.autoplayInterval = null;
    }
  }

  resumeAutoplay() {
    if (!this.autoplayInterval) {
      this.startAutoplay();
    }
  }

  resetAutoplay() {
    this.pauseAutoplay();
    this.startAutoplay();
  }

  destroy() {
    this.pauseAutoplay();
  }
}

// Inicializar carruseles al cargar la página
document.addEventListener('DOMContentLoaded', () => {
  const carousels = document.querySelectorAll('.hero-carousel');
  carousels.forEach((carousel) => {
    new CarouselHero(carousel);
  });
});

// Export para uso modular
if (typeof module !== 'undefined' && module.exports) {
  module.exports = CarouselHero;
}
