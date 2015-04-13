<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App;

class Panier_exemplaireServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        \App::bind('panier_exemplaire', 'App\Panier_exemplaire');

    }
}