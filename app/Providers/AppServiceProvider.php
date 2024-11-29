<?php

namespace App\Providers;

use App\CommandBus\CommandBus;
use App\CommandBus\ICommandBus;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ICommandBus::class, function () {
            return new CommandBus();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
