<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return response()->json([
        'message' => 'halo dunia',
        'status' => 'success'
    ]);
});