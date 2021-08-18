<?php

namespace Sankii\App\Routes;

use Illuminate\Support\Facades\Route;
use Sankii\App\Controllers\EntityController;

Route::group(['namespace' => 'Sankii\App'], function(){
    Route::group(['middleware' => config('middleware')], function(){
        Route::get('/entities', [EntityController::class, 'index'])
            ->name('entities');
    });
});
