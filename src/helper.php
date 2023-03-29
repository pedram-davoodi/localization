<?php

use PedramDavoodi\Localization\Facades\Localization;

if (! function_exists('___')) {
    /**
     * Helper function to get value of a key language
     */
    function ___(string $key , string $lang = null , string $driver = null): string
    {
        return Localization::get($key , $lang , $driver);
    }
}
