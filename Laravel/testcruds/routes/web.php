<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home.index');
});

Route::prefix('product')->group(function(){
    Route::get('/',[ProductController::class, 'index'])->name('product.index');
    Route::post('/store',[ProductController::class,'store'])->name('product.store');

});
