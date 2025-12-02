const DESKTOP_BREAKPOINT = 992;
const HOVER_MEDIA_QUERY = '(hover: hover) and (pointer: fine)';

class SimpleHeaderController {
  constructor() {
    this.header = document.querySelector('.maquiperu-header');
    this.isReady = Boolean(this.header);
    if (!this.isReady) {
      return;
    }

    this.hoverMedia = window.matchMedia(HOVER_MEDIA_QUERY);
    this.mobileToggle = document.querySelector('.mobile-toggle');
    this.navbarCollapse = document.querySelector('#mainNav');
    this.dropdownItems = Array.from(document.querySelectorAll('.nav-item.dropdown'));
    this.topbar = this.header.querySelector('.maquiperu-topbar');
    this.mobileTopbar = this.header.querySelector('.mobile-topbar');

    this.desktopTopbarHeight = 0;
    this.mobileTopbarHeight = 0;
    this.lastCompactState = this.header.classList.contains('is-compact');

    this.handleScroll = this.handleScroll.bind(this);
    this.handleResize = this.handleResize.bind(this);
    this.handleOutsideClick = this.handleOutsideClick.bind(this);

    this.init();
  }

  init() {
    this.initMobileToggle();
    this.initDropdowns();
    this.updateMeasurements();
    this.handleScroll();

    window.addEventListener('scroll', this.handleScroll, { passive: true });
    window.addEventListener('resize', this.handleResize, { passive: true });
    document.addEventListener('click', this.handleOutsideClick);

    if (typeof this.hoverMedia.addEventListener === 'function') {
      this.hoverMedia.addEventListener('change', this.handleResize);
    } else if (typeof this.hoverMedia.addListener === 'function') {
      this.hoverMedia.addListener(this.handleResize);
    }
  }

  initMobileToggle() {
    if (!this.mobileToggle || !this.navbarCollapse) {
      return;
    }

    this.mobileToggle.addEventListener('click', (event) => {
      event.preventDefault();
      this.navbarCollapse.classList.toggle('show');
    });
  }

  initDropdowns() {
    this.dropdownItems.forEach((item) => this.registerDropdownItem(item));
  }

  registerDropdownItem(item) {
    const toggle = item.querySelector('.dropdown-toggle');
    if (!toggle) {
      return;
    }

    toggle.removeAttribute('data-bs-toggle');
    toggle.setAttribute('aria-expanded', 'false');

    const toggleItem = (shouldOpen) => {
      item.classList.toggle('open', shouldOpen);
      toggle.setAttribute('aria-expanded', shouldOpen ? 'true' : 'false');
      if (shouldOpen) {
        this.closeSiblings(item);
      }
    };

    const handleToggleClick = (event) => {
      if (this.isDesktopHover()) {
        return;
      }
      event.preventDefault();
      toggleItem(!item.classList.contains('open'));
    };

    const handleToggleKey = (event) => {
      if (event.key !== 'Enter' && event.key !== ' ') {
        return;
      }
      event.preventDefault();
      toggleItem(!item.classList.contains('open'));
    };

    const handleEnter = () => {
      if (!this.isDesktopHover()) {
        return;
      }
      toggleItem(true);
    };

    const handleLeave = () => {
      if (!this.isDesktopHover()) {
        return;
      }
      toggleItem(false);
    };

    toggle.addEventListener('click', handleToggleClick);
    toggle.addEventListener('keydown', handleToggleKey);
    item.addEventListener('mouseenter', handleEnter);
    item.addEventListener('mouseleave', handleLeave);
    item.addEventListener('focusout', (event) => {
      if (!item.contains(event.relatedTarget)) {
        toggleItem(false);
      }
    });
  }

  handleOutsideClick(event) {
    if (!event.target.closest('.navbar-orange')) {
      this.closeNavbar();
      this.closeAllDropdowns();
    }
  }

  handleResize() {
    this.closeAllDropdowns();
    this.updateMeasurements();
    this.lastCompactState = this.header.classList.contains('is-compact');
    this.handleScroll();
  }

  handleScroll() {
    const baseHeight = this.getActiveTopbarHeight() || 48;
    const hideThreshold = baseHeight + 24;
    const showThreshold = Math.max(Math.min(baseHeight * 0.5, 48), 12);
    const currentScroll = window.scrollY || window.pageYOffset;

    let nextState = this.lastCompactState;
    if (!this.lastCompactState && currentScroll > hideThreshold) {
      nextState = true;
    } else if (this.lastCompactState && currentScroll < showThreshold) {
      nextState = false;
    }

    if (nextState !== this.lastCompactState) {
      this.header.classList.toggle('is-compact', nextState);
      this.lastCompactState = nextState;
    }
  }

  isDesktopHover() {
    return window.innerWidth >= DESKTOP_BREAKPOINT && this.hoverMedia.matches;
  }

  closeNavbar() {
    if (this.navbarCollapse && this.navbarCollapse.classList.contains('show')) {
      this.navbarCollapse.classList.remove('show');
    }
  }

  closeSiblings(currentItem) {
    this.dropdownItems.forEach((item) => {
      if (item === currentItem) {
        return;
      }
      const toggle = item.querySelector('.dropdown-toggle');
      if (!toggle || !item.classList.contains('open')) {
        return;
      }
      item.classList.remove('open');
      toggle.setAttribute('aria-expanded', 'false');
    });
  }

  closeAllDropdowns() {
    this.dropdownItems.forEach((item) => {
      if (!item.classList.contains('open')) {
        return;
      }
      item.classList.remove('open');
      const toggle = item.querySelector('.dropdown-toggle');
      if (toggle) {
        toggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  updateMeasurements() {
    this.desktopTopbarHeight = this.measureHeight(this.topbar);
    this.mobileTopbarHeight = this.measureHeight(this.mobileTopbar);
  }

  measureHeight(element) {
    return element ? element.offsetHeight || 0 : 0;
  }

  getActiveTopbarHeight() {
    const desktopHeight = this.desktopTopbarHeight;
    const mobileHeight = this.mobileTopbarHeight;
    const isDesktopWidth = window.innerWidth >= DESKTOP_BREAKPOINT;
    return isDesktopWidth ? desktopHeight || mobileHeight : mobileHeight || desktopHeight;
  }
}

document.addEventListener('DOMContentLoaded', () => {
  const controller = new SimpleHeaderController();
  if (controller.isReady) {
    window.headerController = controller;
  }
});
