/**
 * Touch-friendly identity flip card (tap to toggle on coarse pointers).
 */
function initFlipCards() {
  const cards = document.querySelectorAll('[data-identity-flip-card]');
  if (!cards.length) return;

  const canHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

  cards.forEach((card) => {
    const toggle = () => {
      const isFlipped = card.classList.toggle('is-flipped');
      card.setAttribute('aria-pressed', isFlipped ? 'true' : 'false');
    };

    card.addEventListener('click', () => {
      if (!canHover) toggle();
    });

    card.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        toggle();
      }
    });
  });
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initFlipCards);
} else {
  initFlipCards();
}
