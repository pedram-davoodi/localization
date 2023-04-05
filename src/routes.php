<?php

use Illuminate\Support\Facades\Route;
use PedramDavoodi\Localization\Controllers\LanguageController;
use PedramDavoodi\Localization\Controllers\PhraseController;
use PedramDavoodi\Localization\Controllers\SettingController;

Route::group(['prefix' => 'localization'  , 'middleware' => 'web'] , function (){
    Route::resource('language' , LanguageController::class , ['except' => ['show' , 'create']]);
    Route::resource('/phrase' , PhraseController::class , ['except' => ['index' , 'show' , 'edit' , 'create']]);
    Route::resource('/setting' , SettingController::class , ['only' => ['index' , 'update']]);
});
