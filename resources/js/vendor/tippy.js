import { delegate } from 'tippy.js';
import 'tippy.js/animations/scale-subtle.css';
import 'tippy.js/dist/tippy.css';

/**
 * Опции Tippy из атрибутов data-tooltip-*: data-tooltip-placement="bottom"
 * превращается в { placement: 'bottom' }, data-tooltip-max-width="200" — в
 * { maxWidth: 200 }. Значения разбираются как JSON (числа, true/false, массивы
 * вроде [0, 10]), иначе остаются строкой.
 */
function readTooltipProps(element) {
    const props = {};

    for (const { name, value } of element.attributes) {
        if (! name.startsWith('data-tooltip-')) {
            continue;
        }

        const key = name
            .slice('data-tooltip-'.length)
            .replace(/-([a-z])/g, (_, letter) => letter.toUpperCase());

        try {
            props[key] = JSON.parse(value);
        } catch {
            props[key] = value;
        }
    }

    return props;
}

/**
 * Подсказки по атрибуту data-tooltip. Через делегирование от body, а не
 * разовым tippy() на DOMContentLoaded: так подсказки есть и у элементов, которые
 * Livewire дорисует позже (@if, новые строки, wire:navigate). Текст читается при
 * каждом показе — если сервер поменял атрибут, покажется новый.
 */
document.addEventListener('DOMContentLoaded', () => {
    delegate(document.body, {
        target: '[data-tooltip]',
        theme: 'custom',
        animation: 'scale-subtle',
        inertia: true,
        arrow: true,
        allowHTML: false,
        delay: [150, 100],
        duration: [150, 150],
        touch: false,
        onShow(instance) {
            const content = instance.reference.getAttribute('data-tooltip');

            if (! content) {
                return false;
            }

            instance.setProps({
                ...readTooltipProps(instance.reference),
                content,
            });
        },
    });
});
