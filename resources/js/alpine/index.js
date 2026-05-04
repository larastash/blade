import { Alpine } from '../../../vendor/livewire/livewire/dist/livewire.esm';
import clipboardDirective from './directives/clipboard';
import appManagerComponent from './components/appManager';
import themeManagerComponent from './components/themeManager';

document.addEventListener('alpine:init', () => {
    clipboardDirective(Alpine);

    Alpine.data('appManager', appManagerComponent);
    Alpine.data('themeManager', themeManagerComponent);
});

export default Alpine;