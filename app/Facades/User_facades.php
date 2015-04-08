<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class User_facades extends Facade{

    protected static function getFacadeAccessor() { return 'user'; }


}