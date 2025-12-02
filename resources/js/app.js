import Alpine from 'alpinejs';
import './bootstrap';

// Importar componentes JavaScript
import './header';
// Footer progressive enhancement script (consolidado en resources/js/partials)
import './partials/carousel';
import './partials/footer';

window.Alpine = Alpine;
Alpine.start();

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

function animateCounter(element) {
  const target = parseInt(element.getAttribute('data-counter'));
  const duration = 2000;
  const increment = target / (duration / 16);
  let current = 0;

  const updateCounter = () => {
    current += increment;
    if (current < target) {
      element.textContent = Math.floor(current);
      requestAnimationFrame(updateCounter);
    } else {
      element.textContent = target.toLocaleString();
    }
  };
  updateCounter();
}

function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
}

function initFormValidation() {
  document.querySelectorAll('form').forEach((form) => {
    const password = form.querySelector('input[name="password"]');
    const confirmPassword = form.querySelector('input[name="password_confirmation"]');

    if (password && confirmPassword) {
      const validatePassword = () => {
        if (password.value !== confirmPassword.value) {
          confirmPassword.setCustomValidity('Las contraseñas no coinciden');
        } else {
          confirmPassword.setCustomValidity('');
        }
      };
      password.addEventListener('input', validatePassword);
      confirmPassword.addEventListener('input', validatePassword);
    }
  });

  document.querySelectorAll('input[type="tel"]').forEach((input) => {
    input.addEventListener('input', function (e) {
      e.target.value = e.target.value.replace(/[^0-9+\s-]/g, '');
    });
  });
}

function initLazyLoading() {
  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src;
          img.classList.remove('lazy');
          imageObserver.unobserve(img);
        }
      });
    });

    document.querySelectorAll('img.lazy').forEach((img) => {
      imageObserver.observe(img);
    });
  }
}

function showToast(message, type = 'success') {
  const toastContainer = document.getElementById('toast-container') || createToastContainer();
  const toast = document.createElement('div');
  toast.className = `toast align-items-center text-bg-${type} border-0`;
  toast.innerHTML = `
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-${type === 'success' ? 'check' : 'exclamation'}-circle me-2"></i>
                ${message}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    `;

  toastContainer.appendChild(toast);
  const bsToast = new bootstrap.Toast(toast);
  bsToast.show();

  toast.addEventListener('hidden.bs.toast', () => {
    toast.remove();
  });
}

function createToastContainer() {
  const container = document.createElement('div');
  container.id = 'toast-container';
  container.className = 'toast-container position-fixed top-0 end-0 p-3';
  container.style.zIndex = '9999';
  document.body.appendChild(container);
  return container;
}

function initLoadingStates() {
  document.addEventListener('submit', function (e) {
    const form = e.target;
    const submitBtn = form.querySelector('button[type="submit"]');

    if (submitBtn) {
      const originalText = submitBtn.innerHTML;
      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Procesando...';
      submitBtn.disabled = true;

      setTimeout(() => {
        if (!form.checkValidity()) {
          submitBtn.innerHTML = originalText;
          submitBtn.disabled = false;
        }
      }, 3000);
    }
  });
}

function initTableFilters() {
  document.querySelectorAll('.table-filter').forEach((filter) => {
    filter.addEventListener('input', function () {
      const tableId = this.dataset.table;
      const table = document.getElementById(tableId);
      if (!table) return;

      const searchValue = this.value.toLowerCase();
      const rows = table.querySelectorAll('tbody tr');

      rows.forEach((row) => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchValue) ? '' : 'none';
      });
    });
  });
}

function initAutoHideAlerts() {
  document.querySelectorAll('.alert-auto-hide').forEach((alert) => {
    const delay = parseInt(alert.dataset.delay) || 5000;
    setTimeout(() => {
      const bsAlert = new bootstrap.Alert(alert);
      bsAlert.close();
    }, delay);
  });
}

document.addEventListener('DOMContentLoaded', function () {
  const counters = document.querySelectorAll('[data-counter]');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        observer.unobserve(entry.target);
      }
    });
  });
  counters.forEach((counter) => observer.observe(counter));

  initSmoothScroll();
  initFormValidation();
  initLazyLoading();
  initLoadingStates();
  initTableFilters();
  initAutoHideAlerts();

  window.addEventListener('ajax:error', () => {
    showToast('Error en la solicitud. Por favor intenta nuevamente.', 'danger');
  });

  window.addEventListener('ajax:success', (event) => {
    const response = event.detail[0];
    if (response.message) {
      showToast(response.message, 'success');
    }
  });
});

window.App = { showToast, animateCounter };

if (module.hot) {
  module.hot.accept();
}
