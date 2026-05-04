<div class="min-h-dvh flex items-center justify-center bg-[radial-gradient(circle_at_1px_1px,rgba(0,0,0,0.07)_1px,transparent_0)] dark:bg-[radial-gradient(circle_at_1px_1px,rgba(255,255,255,0.1)_1px,transparent_0)] bg-size-[20px_20px]">
    <div class="fixed top-4 right-4 flex items-center gap-4">
        <button x-data="themeManager" @click="toggleTheme" class="p-2 rounded-brand hover:bg-gray-200 dark:hover:bg-gray-800">
            <x-icon x-show="currentTheme === 'light'" x-cloak name="lucide-sun" class="size-5" />
            <x-icon x-show="currentTheme === 'dark'" x-cloak name="lucide-moon" class="size-5" />
            <x-icon x-show="currentTheme === 'system'" x-cloak name="lucide-sun-moon" class="size-5" />
        </button>
    </div>
    <div class="max-w-2xl text-balance text-center">
        <figure wire:click="refreshQuote" class="cursor-pointer select-none">
            <blockquote class="text-2xl">
                <p>{{ $quote['quote'] }}</p>
            </blockquote>
            <figcaption class="mt-2 text-gray-500">— <cite>{{ $quote['author'] }}</cite></figcaption>
        </figure>
    </div>
</div>