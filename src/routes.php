<?php

use Illuminate\Support\Facades\Route;
use PedramDavoodi\Localization\Controllers\LanguageController;
use PedramDavoodi\Localization\Controllers\PhraseController;

Route::group(['prefix' => 'localization'  , 'middleware' => 'web'] , function (){
    Route::resource('language' , LanguageController::class);

    Route::resource('/phrase' , PhraseController::class , ['except' => ['index' , 'show']]);
    Route::get('/phrase/list/{lang_id}' , [PhraseController::class , 'index']);

});
