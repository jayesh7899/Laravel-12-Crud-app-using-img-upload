<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProductdataController;

Route::get('welcome', function () {
    return view('welcome');
});

// route::get('',[ProductdataController::class,'index'])->name('products.index');
// route::get('/products/create',[ProductdataController::class,'create'])->name('products.create');
// route::post('/products',[ProductdataController::class,'store'])->name('products.store');
// route::get('/products/{id}/edit',[ProductdataController::class,'edit'])->name('products.edit');
// route::put('/products/{id}',[ProductdataController::class,'update'])->name('products.update');
// route::delete('/products/{id}',[ProductdataController::class,'delete'])->name('products.delete');
// route::get('/products/{id}/show',[ProductdataController::class,'show'])->name('products.show');

route::controller(ProductdataController::class)->group(function(){
    route::get('','index')->name('products.index');
    route::get('/products/create','create')->name('products.create');
    route::post('/products','store')->name('products.store');
    route::get('/products/{id}/edit','edit')->name('products.edit');
    route::put('/products/{id}','update')->name('products.update');
    route::delete('/products/{id}','delete')->name('products.delete');
    route::get('/products/{id}/show','show')->name('products.show');
});