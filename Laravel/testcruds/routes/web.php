<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home.index');
});

Route::prefix('product')->group(function(){
    Route::get('/',[ProductController::class, 'index'])->name('product.index');
    Route::post('/store',[ProductController::class,'store'])->name('product.store');

});


Route::prefix('item')->group(function () {
    Route::get('/', [ItemController::class, 'index'])->name('item.index');
    Route::post('/store', [ItemController::class, 'store'])->name('item.store');
    Route::get('/{id}/edit', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/{id}/update', [ItemController::class, 'update'])->name('item.update');
    Route::delete('/{id}/destroy', [ItemController::class, 'destroy'])->name('item.destroy');
});
