<div>
    <div class="absolute top-4 right-4 flex items-center gap-4">
        <button x-data="theme" @click="toggleTheme" class="p-2 rounded-brand hover:bg-300">
            <x-icon x-show="currentTheme === 'light'" x-cloak name="lucide-sun" class="size-5" />
            <x-icon x-show="currentTheme === 'dark'" x-cloak name="lucide-moon" class="size-5" />
            <x-icon x-show="currentTheme === 'system'" x-cloak name="lucide-sun-moon" class="size-5" />
        </button>
    </div>

    <div class="min-h-dvh flex flex-col items-center justify-center bg-[radial-gradient(circle_at_1px_1px,rgba(0,0,0,0.1)_1px,transparent_0)] dark:bg-[radial-gradient(circle_at_1px_1px,rgba(255,255,255,0.05)_1px,transparent_0)] bg-size-[20px_20px]">
        <figure wire:click="refreshQuote" class="text-center font-serif">
            <blockquote>
                <p class="text-2xl font-medium text-primary-500 max-w-lg text-pretty w-full leading-relaxed hyphens-auto">
                    {{ $quote['quote'] }}
                </p>
            </blockquote>
            <figcaption class="mt-4 text-base">
            {{ $quote['author'] }}
            </figcaption>
        </figure>
    </div>

    <div class="absolute bottom-4 inset-x-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <figure class="shrink-0 size-1.5 rounded-full bg-success-500 dark:bg-success-600 ring-2 ring-success-300 dark:ring-success-500 animate-pulse">
                </figure>
                <p class="text-600 leading-none">
                    ready for something awesome
                </p>
            </div>
            <a
                href="https://github.com/larastash/blade"
                target="_blank"
                rel="noopener noreferrer"
                class="text-600 hover:text-500 flex items-center gap-2"
            >
                <x-icon name="lucide-external-link" class="shrink-0 size-4" />
                <span>larastash/blade</span>
            </a>
        </div>
    </div>
</div>
