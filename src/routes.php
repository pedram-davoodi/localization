<?php

use Illuminate\Support\Facades\Route;
use PedramDavoodi\Localization\Controllers\LanguageController;

Route::group(['prefix' => 'localization'  , 'middleware' => 'web'] , function (){
    Route::resource('language' , LanguageController::class);
});
