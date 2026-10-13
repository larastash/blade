<div>
    <div class="top-4 left-4 absolute">
        <div class="flex items-center gap-2">
            <div class="bg-primary-50 border border-black/10 rounded size-5 hover:scale-125 duration-150 shrink-0"></div>
            <div class="bg-primary-100 border border-black/10 rounded size-5 hover:scale-125 duration-150 shrink-0"></div>
            <div class="bg-primary-200 border border-black/10 rounded size-5 hover:scale-125 duration-150 shrink-0"></div>
            <div class="bg-primary-300 border border-black/10 rounded size-5 hover:scale-125 duration-150 shrink-0"></div>
            <div class="bg-primary-400 border border-black/10 rounded size-5 hover:scale-125 duration-150 shrink-0"></div>
            <div class="bg-primary-500 border border-black/10 rounded size-5 hover:scale-125 duration-150 shrink-0"></div>
            <div class="bg-primary-600 border border-black/10 rounded size-5 hover:scale-125 duration-150 shrink-0"></div>
            <div class="bg-primary-700 border border-black/10 rounded size-5 hover:scale-125 duration-150 shrink-0"></div>
            <div class="bg-primary-800 border border-black/10 rounded size-5 hover:scale-125 duration-150 shrink-0"></div>
            <div class="bg-primary-900 border border-black/10 rounded size-5 hover:scale-125 duration-150 shrink-0"></div>
            <div class="bg-primary-950 border border-black/10 rounded size-5 hover:scale-125 duration-150 shrink-0"></div>
        </div>
    </div>

    <div class="top-4 right-4 absolute flex items-center gap-4">
        <button x-data="theme" @click="toggleTheme" data-tippy-content="Theme" class="hover:bg-color-200 p-2 rounded-brand">
            <x-icon x-show="currentTheme === 'light'" x-cloak name="lucide-sun" class="size-5" />
            <x-icon x-show="currentTheme === 'dark'" x-cloak name="lucide-moon" class="size-5" />
            <x-icon x-show="currentTheme === 'system'" x-cloak name="lucide-sun-moon" class="size-5" />
        </button>
    </div>

    <div class="flex flex-col justify-center items-center gap-8 bg-[radial-gradient(circle_at_1px_1px,rgba(0,0,0,0.1)_1px,transparent_0)] dark:bg-[radial-gradient(circle_at_1px_1px,rgba(255,255,255,0.05)_1px,transparent_0)] min-h-dvh bg-size-[20px_20px]">
        <figure
            wire:click="newQuote"
            wire:key="{{ md5($quote['quote']) }}"
            wire:loading.class="animate-pulse"
            class="p-4 text-center select-none">
            <blockquote>
                <p class="w-full max-w-2xl font-serif font-semibold text-primary-500 text-3xl text-pretty leading-relaxed hyphens-auto">
                    {{ $quote['quote'] }}
                </p>
            </blockquote>
            <figcaption class="mt-4 font-medium text-color-500 text-base">
                {{ $quote['author'] }}
            </figcaption>
        </figure>
    </div>

    <div class="bottom-4 absolute inset-x-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-2.5">
                <figure class="bg-success-500 dark:bg-success-600 rounded-full ring-2 ring-success-300 dark:ring-success-500 size-1.5 animate-pulse shrink-0">
                </figure>
                <p class="text-color-500 leading-none">
                    ready for something awesome
                </p>
            </div>
            <a
                href="https://github.com/larastash/blade"
                target="_blank"
                rel="noopener noreferrer"
                class="flex items-center gap-2 text-color-500 hover:text-color-600"
            >
                <x-icon name="lucide-external-link" class="size-4 shrink-0" />
                <span>larastash/blade</span>
            </a>
        </div>
    </div>
</div>
