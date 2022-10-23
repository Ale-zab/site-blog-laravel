<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class PushallFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Pushall';
    }
}
