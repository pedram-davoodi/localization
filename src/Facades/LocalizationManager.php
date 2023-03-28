<?php


namespace PedramDavoodi\Localization\Facades;


use Illuminate\Support\Facades\Facade;

class LocalizationManager extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor():string
    {
        return 'LocalizationManager';
    }
}
