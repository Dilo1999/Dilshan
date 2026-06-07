export function initProjectSliders() {
    document.querySelectorAll('[data-project-slider]').forEach((root) => {
        const track = root.querySelector('[data-slider-track]');
        const slides = Array.from(root.querySelectorAll('[data-slider-slide]'));
        const prevBtn = root.querySelector('[data-slider-prev]');
        const nextBtn = root.querySelector('[data-slider-next]');
        const dots = Array.from(root.querySelectorAll('[data-slider-dot]'));
        const counter = root.querySelector('[data-slider-counter]');

        if (!track || slides.length === 0) {
            return;
        }

        let index = 0;
        let touchStartX = 0;

        const goTo = (nextIndex) => {
            index = (nextIndex + slides.length) % slides.length;
            track.style.transform = `translateX(-${index * 100}%)`;

            dots.forEach((dot, dotIndex) => {
                dot.classList.toggle('bg-blue-400', dotIndex === index);
                dot.classList.toggle('bg-white/30', dotIndex !== index);
                dot.setAttribute('aria-selected', dotIndex === index ? 'true' : 'false');
            });

            if (counter) {
                counter.textContent = `${index + 1} / ${slides.length}`;
            }
        };

        prevBtn?.addEventListener('click', () => goTo(index - 1));
        nextBtn?.addEventListener('click', () => goTo(index + 1));

        dots.forEach((dot, dotIndex) => {
            dot.addEventListener('click', () => goTo(dotIndex));
        });

        root.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowLeft') {
                goTo(index - 1);
            }

            if (event.key === 'ArrowRight') {
                goTo(index + 1);
            }
        });

        root.addEventListener(
            'touchstart',
            (event) => {
                touchStartX = event.changedTouches[0].screenX;
            },
            { passive: true }
        );

        root.addEventListener(
            'touchend',
            (event) => {
                const delta = event.changedTouches[0].screenX - touchStartX;

                if (Math.abs(delta) < 40) {
                    return;
                }

                goTo(delta > 0 ? index - 1 : index + 1);
            },
            { passive: true }
        );

        goTo(0);
    });
}

document.addEventListener('DOMContentLoaded', initProjectSliders);
