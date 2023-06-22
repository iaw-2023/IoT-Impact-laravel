<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/products');
    } else {
        return redirect('/login');
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    //Rutas aca
    Route::get('/categories', [ProductCategoryController::class, 'mostrar']);
    Route::get('/orders', [OrderController::class, 'mostrar']);
    Route::get('/items', [ItemController::class, 'mostrar']);
    Route::get('/products', [ProductController::class, 'mostrar']);
    Route::get('/users', [UserReactController::class, 'mostrar']);

    //Crear, destruir y modificar productos
    Route::get('/products', [ProductController::class, 'mostrar'])->name('products.index');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::post('/products/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/products/update', [ProductController::class, 'update'])->name('products.update');

     //Crear y destruir categorias
    Route::get('/categories', [ProductCategoryController::class, 'mostrar'])->name('categories.index');
    Route::post('/categories', [ProductCategoryController::class, 'store'])->name('categories.store');
    Route::post('/categories/destroy', [ProductCategoryController::class, 'destroy'])->name('categories.destroy'); 
    Route::post('/categories/update', [ProductCategoryController::class, 'update'])->name('categories.update');  
});


require __DIR__.'/auth.php';
