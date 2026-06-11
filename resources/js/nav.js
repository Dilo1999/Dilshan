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

  function getHashTarget(href) {
    if (!href) return null;

    const hash = href.startsWith('#') ? href : new URL(href, window.location.origin).hash;
    if (!hash) return null;

    return document.querySelector(hash);
  }

  document.querySelectorAll('[data-nav-link]').forEach((link) => {
    link.addEventListener('click', (e) => {
      const href = link.getAttribute('href');
      const target = getHashTarget(href);
      if (!target) return;

      e.preventDefault();
      setMenuOpen(false);
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });

      const hash = href.startsWith('#') ? href : new URL(href, window.location.origin).hash;
      history.replaceState(null, '', hash || href);
    });
  });
}

function init() {
  initNav();
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', init);
} else {
  init();
}
