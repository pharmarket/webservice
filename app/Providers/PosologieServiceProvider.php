<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App;

class PosologieServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        \App::bind('posologie', 'App\Posologie');

    }
}