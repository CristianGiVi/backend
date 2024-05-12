<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return "hello world";
});

Route::get('/posts', [ProductController::class, 'index']);
