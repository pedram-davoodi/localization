<?php

use Illuminate\Support\Facades\Route;
use PedramDavoodi\Localization\Controllers\LanguageController;

Route::prefix('/localization')->group(function () {
    Route::resource('language' , LanguageController::class);
});
