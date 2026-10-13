<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\DevCommands;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PulseServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->gate();

        if ($this->app->environment('local')) {
            DevCommands::artisan('pulse:check', 'pulse');
        }
    }

    /**
     * Register the Pulse gate.
     *
     * Everyone (even guests) has access in the local environment,
     * otherwise only whitelisted users can access Pulse.
     */
    protected function gate(): void
    {
        Gate::define('viewPulse', function (?User $user = null): bool {
            if ($this->app->environment('local')) {
                return true;
            }

            return $user !== null
                && in_array(strtolower($user->email), config('pulse.whitelist'));
        });
    }
}
