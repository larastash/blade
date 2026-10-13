<?php

use App\Models\User;
use Illuminate\Support\Facades\Gate;

test('pulse is available only to whitelisted users outside of local', function (): void {
    config(['pulse.whitelist' => ['admin@example.com']]);

    expect(Gate::forUser(User::factory()->make(['email' => 'Admin@example.com']))->allows('viewPulse'))->toBeTrue()
        ->and(Gate::forUser(User::factory()->make(['email' => 'user@example.com']))->allows('viewPulse'))->toBeFalse()
        ->and(Gate::allows('viewPulse'))->toBeFalse();
});

test('pulse is open to everyone in the local environment', function (): void {
    app()->detectEnvironment(fn (): string => 'local');

    expect(Gate::allows('viewPulse'))->toBeTrue();
});
