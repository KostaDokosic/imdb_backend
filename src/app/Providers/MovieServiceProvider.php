<?php

namespace App\Providers;

use App\Models\Movie\Movie;
use App\Observers\MovieObserver;
use Illuminate\Support\ServiceProvider;

class MovieServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Movie::observe(MovieObserver::class);
    }
}
