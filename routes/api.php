<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    // Route publik
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login',    [AuthController::class, 'login']);

    // Route yang dilindungi Sanctum
    Route::middleware('auth:sanctum')->group(function () {

        Route::apiResource('categories', CategoryController::class)->except(['destroy']);
        Route::apiResource('items',      ItemController::class)->except(['destroy']);

        Route::middleware('role:admin')->group(function () {
            Route::delete('categories/{category}', [CategoryController::class, 'destroy']);
            Route::delete('items/{item}',          [ItemController::class, 'destroy']);
        });

    });

});