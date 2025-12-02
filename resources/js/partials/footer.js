document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('.footer-newsletter');
  if (!form) return;

  const emailInput = form.querySelector('input[name="email"]');
  if (!emailInput) return;

  const liveRegion = document.createElement('div');
  liveRegion.setAttribute('aria-live', 'polite');
  liveRegion.setAttribute('aria-atomic', 'true');
  liveRegion.className = 'visually-hidden';
  form.append(liveRegion);

  form.addEventListener('submit', (event) => {
    const email = emailInput.value.trim();
    const isValidEmail = /^\S+@\S+\.\S+$/.test(email);

    if (!isValidEmail) {
      event.preventDefault();
      liveRegion.textContent = 'Por favor, ingresa un correo válido.';
      emailInput.focus();
      return;
    }

    liveRegion.textContent = 'Enviando...';
  });
});
