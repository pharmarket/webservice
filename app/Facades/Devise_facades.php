<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Devise_facades extends Facade{

    protected static function getFacadeAccessor() { return 'devise'; }


}