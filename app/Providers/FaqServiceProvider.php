<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App;

class FaqServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        \App::bind('faq', 'App\Faq');

    }
}