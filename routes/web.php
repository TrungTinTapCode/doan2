<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);

