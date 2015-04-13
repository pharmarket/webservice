<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App;

class Sujet_forumServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        \App::bind('sujet_forum', 'App\Sujet_forum');

    }
}