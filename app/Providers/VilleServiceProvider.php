<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App;

class VilleServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        \App::bind('ville', 'App\Ville');

    }
}