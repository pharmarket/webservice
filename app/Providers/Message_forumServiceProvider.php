<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App;

class Message_forumServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        \App::bind('message_forum', 'App\Message_forum');

    }
}