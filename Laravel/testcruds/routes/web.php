<?php

use App\Http\Controllers\CrmController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home.index');
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
});


// Route::prefix('item')->group(function () {
//     Route::get('/', [ItemController::class, 'index'])->name('item.index');
//     Route::post('/store', [ItemController::class, 'store'])->name('item.store');
//     Route::get('/{id}/edit', [ItemController::class,s, 'update'])->name('item.update');
//     // Route::delete('/{id}/destroy', [ItemController:: 'edit'])->name('item.edit');
//     Route::put('/{id}/update', [ItemController::clasclass, 'destroy'])->name('item.destroy');
// });

// Route::prefix('crm')->group(function () {
//     Route::get('/', [CrmController::class, 'index'])->name('crm.index');
//     Route::post('/store', [CrmController::class, 'store'])->name('crm.store');
//     Route::get('/{id}/edit', [CrmController::class, 'edit'])->name('crm.edit');
//     Route::put('/{id}/update' , [CrmController::class ,'update'])->name('crm.update');
//     Route::delete('/{id}/destroy' , [CrmController::class ,'destroy'])->name('crm.destroy');

// });

Route::prefix('food')->group(function(){
    Route::get('/', function(){
        return view('pages.food.index');
    })->name('food.index');

    Route::get('/italian', function(){
        return view('pages.food.italian');
    })->name('food.italian');

    Route::get('/chinese', function(){
        return view('pages.food.chinese');
    })->name('food.chinese');

    Route::get('/indian', function(){
        return view('pages.food.indian');
    })->name('food.indian');
});





Route::get('/test-helper', function () {
    return say_hello('sanjana');
});
