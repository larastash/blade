export default function (el, { expression }) {
    setTimeout(() => el.focus(), (expression || 0));
}
