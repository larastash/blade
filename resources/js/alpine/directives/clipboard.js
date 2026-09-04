export default function (el) {
    const text = el.textContent;

    el.addEventListener('click', () => {
        navigator.clipboard.writeText(text);
    });
}
