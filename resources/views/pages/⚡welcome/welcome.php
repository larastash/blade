<?php

use Illuminate\Foundation\Inspiring;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

new class extends Component
{
    public array $quote;

    public function mount()
    {


        $this->refreshQuote();
    }

    public function refreshQuote()
    {
        $this->quote = $this->getRandomQuote();

        Toaster::info('This message from Livewire!');
    }

    protected function getRandomQuote(): array
    {
        [$quote, $author] = array_map('trim', explode('-', Inspiring::quotes()->random()));

        return compact('quote', 'author');
    }
};