<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App;

class PaysServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        \App::bind('pays', 'App\Pays');

    }
}