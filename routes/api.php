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

//ORDERS
Route::group(['middleware' => ['api'],], function ($router) {
    Route::get('orders', [App\Http\Controllers\OrderController::class, 'index']);
    Route::post('orders', [App\Http\Controllers\OrderController::class, 'storeAPI']);
});

Route::group(['middleware' => ['api'],], function ($router) {
    Route::get('items', [App\Http\Controllers\ItemController::class, 'index']);
});

Route::group(['middleware' => ['api'],], function ($router) {
    Route::get('categories', [App\Http\Controllers\ProductCategoryController::class, 'index']);
});

Route::group(['middleware' => ['api'],], function ($router) {
    Route::get('products', [App\Http\Controllers\ProductController::class, 'index']);
});