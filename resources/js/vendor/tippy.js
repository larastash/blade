import tippy from 'tippy.js';
import 'tippy.js/animations/scale-subtle.css';
import 'tippy.js/dist/tippy.css';

document.addEventListener('DOMContentLoaded', () => {
    tippy('[data-tippy-content]', {
        theme: 'custom',
        animation: 'scale-subtle',
        inertia: true,
        arrow: true,
        allowHTML: false,
        delay: [150, 100],
        duration: [150, 150],
        touch: false,
    });
});
