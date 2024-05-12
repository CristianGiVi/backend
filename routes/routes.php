<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

Route::get('/prueba', function () {
    return "hello world11111";
});

Route::get('/posts', [ProductController::class, 'index']);

Route::post('/test', function () {
    $post = new Product;
    $post->name = "producto3";
    $post->value = 30;
    $post -> save();
    return $post;
});