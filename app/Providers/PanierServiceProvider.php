<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App;

class PanierServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        \App::bind('panier', 'App\Panier');

    }
}