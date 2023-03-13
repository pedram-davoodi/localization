<?php


namespace PedramDavoodi\Localization\Facades;


use Illuminate\Support\Facades\Facade;

class Localization extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor():string
    {
        return 'Localization';
    }
}
