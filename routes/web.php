<?php

use App\Http\Controllers\category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
// Route::post('/form',[category::class,'store']);
// Route::get('category/disp',category::disp());
Route::get('/category',[category::class,'index']);
Route::post('/category/store',[category::class,'store'])->name('category.store');
Route::delete('category/{id}', [category::class,'destroy'])->name('category.destroy');
Route::patch('category/{id}', [category::class,'edit'])->name('category.edit');
Route::put('category/update/{id}', [category::class,'update'])->name('category.update');
// Route::resource('category',category::class);


