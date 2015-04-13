<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App;

class MediaServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        \App::bind('media', 'App\Media');

    }
    
}