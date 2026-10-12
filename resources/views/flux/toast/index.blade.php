@blaze(fold: true, safe: ['position'])

@props([
    'position' => 'bottom end',
])

<ui-toast x-data x-on:toast-show.document="! $el.closest('ui-toast-group') && $el.showToast($event.detail)" popover="manual" position="{{ $position }}" wire:ignore>
    <template>
        <div {{ $attributes->only(['class'])->class('max-w-sm in-[ui-toast-group]:max-w-auto in-[ui-toast-group]:w-xs sm:in-[ui-toast-group]:w-sm') }} data-variant="" data-flux-toast-dialog>
            <div class="flex bg-color-50 p-3 border rounded-brand">
                <div class="flex flex-1 items-start gap-3 overflow-hidden">
                    <div class="flex flex-1 gap-3 py-1 ps-1">
                        {{-- Success icon --}}
                        <div class="hidden [[data-flux-toast-dialog][data-variant=success]_&]:flex justify-center items-center bg-success-100 dark:bg-success-500/20 rounded-brand size-8 shrink-0">
                            <x-icon name="lucide-circle-check" class="size-4 text-success-500 dark:text-success-400" />
                        </div>

                        {{-- Warning icon --}}
                        <div class="hidden [[data-flux-toast-dialog][data-variant=warning]_&]:flex justify-center items-center bg-warning-100 dark:bg-warning-500/20 rounded-brand size-8 shrink-0">
                            <x-icon name="lucide-triangle-alert" class="size-4 text-warning-500 dark:text-warning-400" />
                        </div>

                        {{-- Info icon --}}
                        <div class="hidden [[data-flux-toast-dialog][data-variant=info]_&]:flex justify-center items-center bg-info-100 dark:bg-info-500/20 rounded-brand size-8 shrink-0">
                            <x-icon name="lucide-info" class="size-4 text-info-500 dark:text-info-400" />
                        </div>

                        {{-- Danger icon --}}
                        <div class="hidden [[data-flux-toast-dialog][data-variant=danger]_&]:flex justify-center items-center bg-danger-100 dark:bg-danger-500/20 rounded-brand size-8 shrink-0">
                            <x-icon name="lucide-circle-x" class="size-4 text-danger-500 dark:text-danger-400" />
                        </div>

                        <div class="pt-1">
                            {{-- Heading --}}
                            <div class="not-empty:pb-1 [&:not(:empty)+div]:font-normal font-medium text-[13px] text-color-900"><slot name="heading"></slot></div>

                            {{-- Text --}}
                            <div class="font-medium text-[13px] text-color-400 dark:text-color-600"><slot name="text"></slot></div>

                            {{-- Link --}}
                            <template name="link">
                                <a class="block mt-2 font-medium text-sm text-(--color-accent-content) decoration-[color-mix(in_oklab,var(--color-accent-content),transparent_80%)] underline underline-offset-[6px] hover:decoration-current"><slot name="text"></slot></a>
                            </template>
                        </div>
                    </div>

                    {{-- Close button --}}
                    <ui-close class="flex items-center">
                        <button type="button" class="inline-flex justify-center items-center gap-2 bg-transparent hover:bg-color-100 disabled:opacity-50 dark:disabled:opacity-75 rounded-brand w-6 h-6 font-medium text-color-500 text-sm truncate disabled:cursor-default" as="button">
                            <div>
                                <x-icon name="lucide-x" class="size-4" />
                            </div>
                        </button>
                    </ui-close>
                </div>
            </div>
        </div>
    </template>
</ui-toast>
