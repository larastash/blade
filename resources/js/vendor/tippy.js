import { delegate } from 'tippy.js';
import 'tippy.js/animations/scale-subtle.css';
import 'tippy.js/dist/tippy.css';

/**
 * Подсказки по атрибуту data-tippy-content. Через делегирование от body, а не
 * разовым tippy() на DOMContentLoaded: так подсказки есть и у элементов, которые
 * Livewire дорисует позже (@if, новые строки, wire:navigate). Текст читается при
 * каждом показе — если сервер поменял атрибут, покажется новый.
 */
document.addEventListener('DOMContentLoaded', () => {
    delegate(document.body, {
        target: '[data-tippy-content]',
        theme: 'custom',
        animation: 'scale-subtle',
        inertia: true,
        arrow: true,
        allowHTML: false,
        delay: [150, 100],
        duration: [150, 150],
        touch: false,
        onShow(instance) {
            const content = instance.reference.getAttribute('data-tippy-content');

            if (! content) {
                return false;
            }

            instance.setContent(content);
        },
    });
});
