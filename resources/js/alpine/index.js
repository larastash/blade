import app from '@js/alpine/components/app';
import theme from '@js/alpine/components/theme';
import clipboard from '@js/alpine/directives/clipboard';
import appStore from '@js/alpine/stores/appStore';
import Autosize from '@marcreichel/alpine-autosize';
import { Alpine, Livewire } from '@vendor/livewire/livewire/dist/livewire.esm';

document.addEventListener('alpine:init', () => {
    Alpine.data('app', app);
    Alpine.data('theme', theme);

    Alpine.directive('autofocus', clipboard);
    Alpine.directive('clipboard', clipboard);

    Alpine.store('app', appStore);

    Alpine.plugin(Autosize);
});

Livewire.start();

export {
    Alpine,
    Livewire
};

