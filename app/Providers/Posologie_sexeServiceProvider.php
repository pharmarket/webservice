<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App;

class Posologie_sexeServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        \App::bind('posologie_sexe', 'App\Posologie_sexe');

    }
}