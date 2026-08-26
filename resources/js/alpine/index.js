import app from '@js/alpine/components/app';
import theme from '@js/alpine/components/theme';
import clipboard from '@js/alpine/directives/clipboard';
import Autosize from '@marcreichel/alpine-autosize';
import { Alpine, Livewire } from '@vendor/livewire/livewire/dist/livewire.esm';

document.addEventListener('alpine:init', () => {
    Alpine.data('app', app);
    Alpine.data('theme', theme);

    clipboard(Alpine);

    Alpine.plugin(Autosize);
});

Livewire.start();

export {
    Alpine,
    Livewire
};

