<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App;

class FournisseurServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        \App::bind('fournisseur', 'App\Fournisseur');

    }
}