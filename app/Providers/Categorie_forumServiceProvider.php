<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App;

class Categorie_forumServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        \App::bind('categorie_forum', 'App\Categorie_forum');

    }
}