<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

Route::get('/', function () {
    return "hello world";
});

Route::get('/posts', [ProductController::class, 'index']);

Route::get('/test', function () {
    $post = new Product;
    $post->name = "producto1";
    $post->value = 30;
    $post -> save();
    return $post;
});
