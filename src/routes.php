<?php

use Illuminate\Support\Facades\Route;
use PedramDavoodi\Localization\Controllers\LanguageController;
use PedramDavoodi\Localization\Controllers\PhraseController;

Route::group(['prefix' => 'localization'  , 'middleware' => 'web'] , function (){
    Route::resource('language' , LanguageController::class , ['except' => ['show']]);

    Route::resource('/phrase' , PhraseController::class , ['except' => ['index' , 'show' , 'edit']]);
});
