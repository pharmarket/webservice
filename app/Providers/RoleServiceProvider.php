<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App;

class RoleServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        \App::bind('role', 'App\Role');

    }
}