<?php

use PedramDavoodi\Localization\Facades\Localization;

if (! function_exists('____')) {
    function ____($key , $lang = null , $driver = null)
    {
        return Localization::get($key , $lang , $driver);
    }
}
