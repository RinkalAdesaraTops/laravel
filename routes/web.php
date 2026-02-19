<?php
use App\Http\Controllers\category;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Subcategorycontroller;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('dashboard');
});
Route::get('/home',function(){
    return view('home');
});
Route::get('/about',function(){
    return view('about');
});
Route::get('/contact',function(){
    return view('contact');
});
Route::get('/form',function(){
    return view('form');
});
Route::get('/category',[category::class,'index']);
Route::post('/category/store',[category::class,'store'])->name('category.store');
Route::delete('category/{id}', [category::class,'destroy'])->name('category.destroy');
Route::patch('category/{id}', [category::class,'edit'])->name('category.edit');
Route::put('category/update/{id}', [category::class,'update'])->name('category.update');

Route::get('/subcategory',[Subcategorycontroller::class,'index']);
Route::post('/subcategory/store',[Subcategorycontroller::class,'store'])->name('subcategory.store');
Route::delete('subcategory/{id}', [Subcategorycontroller::class,'destroy'])->name('subcategory.destroy');
Route::patch('subcategory/{id}', [Subcategorycontroller::class,'edit'])->name('subcategory.edit');
Route::put('subcategory/update/{id}', [Subcategorycontroller::class,'update'])->name('subcategory.update');

Route::get('/product',[ProductController::class,'index']);
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::delete('product/{id}', [ProductController::class,'destroy'])->name('product.destroy');
Route::patch('product/{id}', [ProductController::class,'edit'])->name('product.edit');
Route::put('product/update/{id}', [ProductController::class,'update'])->name('product.update');

Route::post('/getSubcat',[ProductController::class,'getSubcat'])->name('getSubcat');