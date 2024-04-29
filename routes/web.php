<?php

use App\Http\Controllers\productsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('product', productsController::class);
