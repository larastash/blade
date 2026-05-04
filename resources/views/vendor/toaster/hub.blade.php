<div role="status" id="toaster" x-data="toasterHub(@js($toasts), @js($config))" @class([
    'fixed z-50 p-4 w-full flex flex-col pointer-events-none',
    'bottom-0' => $alignment->is('bottom'),
    'top-1/2 -translate-y-1/2' => $alignment->is('middle'),
    'top-0' => $alignment->is('top'),
    'items-start rtl:items-end' => $position->is('left'),
    'items-center' => $position->is('center'),
    'items-end rtl:items-start' => $position->is('right'),
 ])>
    <template x-for="toast in toasts" :key="toast.id">
        {{-- <pre x-html="JSON.stringify(toast, null, 2)"></pre> --}}
        <div x-show="toast.isVisible"
             x-init="$nextTick(() => toast.show($el))"
             @if($alignment->is('bottom'))
             x-transition:enter-start="translate-y-4 opacity-0"
             x-transition:enter-end="translate-y-0 opacity-100"
             @elseif($alignment->is('top'))
             x-transition:enter-start="-translate-y-4 opacity-0"
             x-transition:enter-end="translate-y-0 opacity-100"
             @else
             x-transition:enter-start="opacity-0 scale-90"
             x-transition:enter-end="opacity-100 scale-100"
             @endif
             x-transition:leave-end="opacity-0 scale-90"
             @class(['p-4 rounded-brand w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 border-dashed relative transform transition ease-in-out max-w-xs w-full pointer-events-auto flex items-start justify-between gap-2 text-pretty', 'text-center' => $position->is('center'), 'mt-2' => $alignment->is('bottom'), 'mb-2' => !$alignment->is('bottom')])])
             :class="{
                'text-danger-800 dark:text-danger-400': toast.type === 'error',
                'text-black dark:text-white': toast.type === 'info',
                'text-success-800 dark:text-success-400': toast.type === 'success',
                'text-warning-800 dark:text-warning-400': toast.type === 'warning'
            }"
        >
            <div x-text="toast.message"
               class="flex-1 select-none "
               {{-- :class="toast.select({ error: 'bg-red-500', info: 'bg-gray-200', success: 'bg-green-600', warning: 'bg-orange-500' })" --}}
            ></div>

            @includeWhen($closeable, 'toaster::close-button')
        </div>
    </template>
</div>
