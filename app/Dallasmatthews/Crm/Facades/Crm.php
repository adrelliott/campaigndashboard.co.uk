<?php namespace Dallasmatthews\Crm\Facades;

use Illuminate\Support\Facades\Facade;

class Crm extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'crm';
    }
}