<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

test('collections of plain objects can be restored from the cache (used by the Pulse dashboard)', function (): void {
    Cache::put('pulse-roundtrip', collect([(object) ['key' => 'server', 'value' => 1]]), 60);

    $cached = Cache::get('pulse-roundtrip');

    expect($cached)->toBeInstanceOf(Collection::class)
        ->and($cached->first()->key)->toBe('server');
});
