<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App;

class Posologie_typeServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        \App::bind('posologie_type', 'App\Posologie_type');

    }
}