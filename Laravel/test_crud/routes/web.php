<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.item');
// });



// Route::prefix('item')->group(function(){
//    Route::resource('item', ProductController::class);

// });

// Route::prefix('/')->group(function(){
//     Route::get('/',[ItemController::class,'index'])->name('item.index');
//     Route::post('/create',[ItemController::class,'create'])->name('item.create');
// });


Route::get('/' , [HomeController::class , 'index'])->name('home.index');




Route::prefix('blog')->group(function(){
    Route::get('/',[BlogController::class,'index'])->name('blog.index');
    Route::post('/store',[BlogController::class,'store'])->name('blog.store');
    Route::get('/{id}',[BlogController::class,'destroy'])->name('blog.destroy');
    Route::get('/{id}/edit',[BlogController::class ,"edit"])->name('blog.edit');
    Route::put('/{id}/update' , [BlogController::class ,'update'])->name('blog.update');
});

// Route::prefix('product')->group(function(){
//     Route::get('/',[ProductController::class,'index'])->name('blog.index');
//     // Route::post('/store',[BlogController::class,'store'])->name('blog.store');
//     // Route::get('/{id}',[BlogController::class,'destroy'])->name('blog.destroy');
//     // Route::get('/{id}/edit',[BlogController::class ,"edit"])->name('blog.edit');
//     // Route::put('/{id}/update' , [BlogController::class ,'update'])->name('blog.update');
// });

// Route::resource('product', ProductController::class);


Route::prefix('product')->group(function(){
    Route::get('/',[ProductController::class,'index'])->name('product.index');
    Route::post('/store',[ProductController::class,'store'])->name('product.store');
    // Route::get('/{id}',[BlogController::class,'destroy'])->name('blog.destroy');
    // Route::get('/{id}/edit',[BlogController::class ,"edit"])->name('blog.edit');
    // Route::put('/{id}/update' , [BlogController::class ,'update'])->name('blog.update');
});

