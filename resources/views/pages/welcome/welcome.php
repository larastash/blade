<?php

use Flux\Flux;
use Illuminate\Foundation\Inspiring;
use Livewire\Component;

new class extends Component
{
    public array $quote;

    public function mount()
    {
        $this->newQuote();

        Flux::toast(
            heading: 'Hello world 👋',
            text: 'This is a just a simple toast!',
        );
    }

    public function newQuote()
    {
        $this->quote = $this->getRandomQuote();
    }

    protected function getRandomQuote(): array
    {
        [$quote, $author] = array_map('trim', explode('-', Inspiring::quotes()->random()));

        return compact('quote', 'author');
    }
};
