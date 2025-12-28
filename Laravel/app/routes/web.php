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
