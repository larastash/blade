<?php

use Flux\Flux;
use Illuminate\Foundation\Inspiring;
use Livewire\Component;

new class extends Component
{
    public array $quote;

    public function mount()
    {
        $this->refreshQuote();

        Flux::toast(
            heading: 'Hello world 👋',
            text: 'This is a just a simple toast!',
            variant: 'info',
        );
    }

    public function refreshQuote()
    {
        $this->quote = $this->getRandomQuote();
    }

    protected function getRandomQuote(): array
    {
        [$quote, $author] = array_map('trim', explode('-', Inspiring::quotes()->random()));

        return compact('quote', 'author');
    }
};
