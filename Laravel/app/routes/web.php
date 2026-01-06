<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.home.index');
// });
    Route::get('/', [HomeController::class,'index'])->name('index');

Route::prefix('item')->group(function () {
    Route::get('/', [ItemController::class, 'index'])->name('item.index');
    Route::post('store', [ItemController::class, 'store'])->name('item.store');
    Route::get('{id}/edit', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('{id}/update', [ItemController::class, 'update'])->name('item.update');
    Route::delete('{id}/delete', [ItemController::class, 'delete'])->name('item.delete');
});



Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});

