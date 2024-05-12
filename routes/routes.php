<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;

// Rutas de productos

const SUBPATH_PRODUCTS  = "products";

Route::get(SUBPATH_PRODUCTS, [ProductController::class, 'getProducts']);
Route::post(SUBPATH_PRODUCTS . '/create', [ProductController::class, 'postProduct']);
Route::get(SUBPATH_PRODUCTS . '/{name}', [ProductController::class, 'getProductsbyName']);
Route::put(SUBPATH_PRODUCTS . '/put/{id}', [ProductController::class, 'putProduct']);
Route::delete(SUBPATH_PRODUCTS . '/delete/{id}', [ProductController::class, 'deleteProduct']);


// Rutas de usuarios

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'logIn']);