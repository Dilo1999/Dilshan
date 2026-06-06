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

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initNav);
} else {
  initNav();
}
