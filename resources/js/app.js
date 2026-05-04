import Alpine from './alpine';
import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';
import '../../vendor/masmerise/livewire-toaster/resources/js';

import Autosize from '@marcreichel/alpine-autosize';

Alpine.plugin(Autosize);

Livewire.start();