<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/ 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api']], function ($router) {

    Route::get('orders', [App\Http\Controllers\OrderController::class, 'index']);
    Route::get('orders/{id}', [App\Http\Controllers\OrderController::class, 'show']);
    Route::post('orders', [App\Http\Controllers\OrderController::class, 'storeAPI']);

    Route::get('items', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('items/{id}', [App\Http\Controllers\ItemController::class, 'show']);

    Route::get('categories', [App\Http\Controllers\ProductCategoryController::class, 'index']);
    Route::get('categories/{id}', [App\Http\Controllers\ProductCategoryController::class, 'show']);

    Route::get('products', [App\Http\Controllers\ProductController::class, 'index']);
    Route::get('products/{id}', [App\Http\Controllers\ProductController::class, 'show']);

    Route::post('register', [App\Http\Controllers\UserReactController::class, 'registrarUserAPI']);
    Route::get('users', [App\Http\Controllers\UserReactController::class, 'index']);

});