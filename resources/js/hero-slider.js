export function initHeroSlider() {
    document.querySelectorAll('[data-hero-slider]').forEach((root) => {
        const slides = Array.from(root.querySelectorAll('[data-hero-slide]'));

        if (slides.length <= 1) {
            return;
        }

        let index = 0;
        const intervalMs = 5000;

        const goTo = (nextIndex) => {
            slides[index].classList.remove('opacity-100');
            slides[index].classList.add('opacity-0');

            index = (nextIndex + slides.length) % slides.length;

            slides[index].classList.remove('opacity-0');
            slides[index].classList.add('opacity-100');
        };

        setInterval(() => goTo(index + 1), intervalMs);
    });
}

document.addEventListener('DOMContentLoaded', initHeroSlider);
