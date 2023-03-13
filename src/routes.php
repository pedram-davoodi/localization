<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/localization')->group(function () {
    Route::get('/' , function (){
       echo 'Hello world!';
    });
});
