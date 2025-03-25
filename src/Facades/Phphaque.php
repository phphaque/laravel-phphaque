<?php

namespace Phphaque\LaravelPhphaque\Facades;

use Illuminate\Support\Facades\Facade;

class Phphaque extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'phphaque';
    }
}