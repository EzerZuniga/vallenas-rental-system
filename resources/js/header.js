/**
 * Header JavaScript - ETC Vallenas
 * JavaScript simple para el header estilo Maquiperu (SIN animaciones)
 */

class SimpleHeaderController {
  constructor() {
    this.mobileToggle = document.querySelector('.mobile-toggle');
    this.navbarCollapse = document.querySelector('#mainNav');
    this.dropdownItems = document.querySelectorAll('.dropdown-item');

    this.init();
  }

  init() {
    this.initMobileToggle();
    this.initDropdowns();
    this.initOutsideClick();
  }

  /**
   * Dropdowns simples - solo hover en desktop
   */
  initDropdowns() {
    // Habilitar toggle por click/teclado para mejorar accesibilidad
    // y para dispositivos táctiles que no soportan :hover correctamente.
    this.dropdownItems.forEach((item) => {
      const toggle = item.querySelector('.dropdown-toggle');
      const submenu = item.querySelector('.submenu');
      if (!toggle || !submenu) return;

      // Click para abrir/cerrar
      toggle.addEventListener('click', (e) => {
        // Permitir enlaces normales si llevan a otra página
        e.preventDefault();
        item.classList.toggle('open');
        const isOpen = item.classList.contains('open');
        toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      });

      // Soporte de teclado (Enter / Space)
      toggle.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          item.classList.toggle('open');
          const isOpen = item.classList.contains('open');
          toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        }
      });
    });

    // Al cambiar el tamaño de ventana cerramos submenús abiertos cuando pasamos a desktop
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 992) {
        document
          .querySelectorAll('.dropdown-item.open')
          .forEach((it) => it.classList.remove('open'));
      }
    });
  }

  /**
   * Toggle simple del menú móvil
   */
  initMobileToggle() {
    if (this.mobileToggle && this.navbarCollapse) {
      this.mobileToggle.addEventListener('click', (e) => {
        e.preventDefault();

        if (this.navbarCollapse.classList.contains('show')) {
          this.navbarCollapse.classList.remove('show');
        } else {
          this.navbarCollapse.classList.add('show');
        }
      });
    }
  }

  /**
   * Cerrar menú al hacer clic fuera
   */
  initOutsideClick() {
    document.addEventListener('click', (e) => {
      if (!e.target.closest('.navbar-orange')) {
        if (this.navbarCollapse.classList.contains('show')) {
          this.navbarCollapse.classList.remove('show');
        }
        // Cerrar submenús abiertos
        document
          .querySelectorAll('.dropdown-item.open')
          .forEach((it) => it.classList.remove('open'));
      }
    });
  }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
  const headerController = new SimpleHeaderController();
  window.headerController = headerController;
});

// Funcionalidad adicional para Bootstrap collapse
document.addEventListener('DOMContentLoaded', function () {
  // Manejar collapse de Bootstrap
  const collapseElementList = [].slice.call(document.querySelectorAll('.collapse'));

  collapseElementList.forEach(function (collapseEl) {
    collapseEl.addEventListener('show.bs.collapse', function () {
      // Comportamiento al mostrar
    });

    collapseEl.addEventListener('hide.bs.collapse', function () {
      // Comportamiento al ocultar
    });
  });
});
