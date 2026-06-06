/**
 * Portfolio mobile navigation toggle + smooth scroll helpers.
 */
function initNav() {
  const toggleBtn = document.querySelector('[data-mobile-menu-toggle]');
  const panel = document.querySelector('[data-mobile-menu-panel]');
  if (!toggleBtn || !panel) return;

  const iconOpen = toggleBtn.querySelector('[data-mobile-menu-icon="open"]');
  const iconClose = toggleBtn.querySelector('[data-mobile-menu-icon="close"]');
  const closeLinks = panel.querySelectorAll('[data-mobile-menu-close]');

  function setMenuOpen(isOpen) {
    toggleBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    panel.classList.toggle('hidden', !isOpen);

    if (iconOpen) iconOpen.classList.toggle('hidden', isOpen);
    if (iconClose) iconClose.classList.toggle('hidden', !isOpen);

    document.body.classList.toggle('overflow-hidden', isOpen);
  }

  toggleBtn.addEventListener('click', () => {
    const isOpen = toggleBtn.getAttribute('aria-expanded') === 'true';
    setMenuOpen(!isOpen);
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && toggleBtn.getAttribute('aria-expanded') === 'true') {
      setMenuOpen(false);
    }
  });

  closeLinks.forEach((link) => {
    link.addEventListener('click', () => setMenuOpen(false));
  });

  document.querySelectorAll('[data-nav-link]').forEach((link) => {
    link.addEventListener('click', (e) => {
      const href = link.getAttribute('href');
      if (!href?.startsWith('#')) return;

      e.preventDefault();
      const target = document.querySelector(href);
      if (!target) return;

      setMenuOpen(false);
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      history.replaceState(null, '', href);
    });
  });
}

function initNavbarScroll() {
  const nav = document.querySelector('[data-portfolio-navbar]');
  const hero = document.getElementById('home');

  if (!nav || !hero) {
    return;
  }

  const logo = nav.querySelector('[data-nav-logo]');
  const logoText = nav.querySelector('[data-nav-logo-text]');
  const navItems = nav.querySelectorAll('[data-nav-item]');
  const underlines = nav.querySelectorAll('[data-nav-underline]');
  const mobileToggle = nav.querySelector('[data-mobile-menu-toggle]');

  const setAtTop = (atTop) => {
    nav.dataset.atTop = atTop ? 'true' : 'false';

    nav.classList.toggle('portfolio-nav-at-top', atTop);
    nav.classList.toggle('portfolio-nav-scrolled', !atTop);

    logo?.classList.toggle('icon-box', !atTop);
    logo?.classList.toggle('border-white/20', atTop);
    logo?.classList.toggle('bg-white/10', atTop);

    logoText?.classList.toggle('text-white', atTop);
    logoText?.classList.toggle('text-zinc-800', !atTop);

    navItems.forEach((item) => {
      item.classList.toggle('text-zinc-200', atTop);
      item.classList.toggle('hover:text-white', atTop);
      item.classList.toggle('text-zinc-600', !atTop);
      item.classList.toggle('hover:text-zinc-900', !atTop);
    });

    underlines.forEach((line) => {
      line.classList.toggle('bg-white', atTop);
      line.classList.toggle('bg-zinc-900', !atTop);
    });

    mobileToggle?.classList.toggle('border-white/25', atTop);
    mobileToggle?.classList.toggle('text-zinc-200', atTop);
    mobileToggle?.classList.toggle('hover:bg-white/10', atTop);
    mobileToggle?.classList.toggle('hover:text-white', atTop);
    mobileToggle?.classList.toggle('border-portfolio-border', !atTop);
    mobileToggle?.classList.toggle('text-zinc-600', !atTop);
    mobileToggle?.classList.toggle('hover:bg-portfolio-bg-soft', !atTop);
    mobileToggle?.classList.toggle('hover:text-zinc-900', !atTop);
  };

  const update = () => {
    setAtTop(window.scrollY < 24);
  };

  update();
  window.addEventListener('scroll', update, { passive: true });
}

function init() {
  initNav();
  initNavbarScroll();
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', init);
} else {
  init();
}
