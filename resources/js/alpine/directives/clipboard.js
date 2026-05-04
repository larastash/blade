export default function (Alpine) {
    Alpine.directive('clipboard', (el) => {
        const text = el.textContent;

        el.addEventListener('click', () => {
            navigator.clipboard.writeText(text);
        });
    });
}