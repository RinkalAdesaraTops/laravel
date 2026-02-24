<?php

use App\Http\Controllers\category;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/category', [category::class, 'index'])->name('category.index');
    Route::post('/category', [category::class, 'store'])->name('category.store');
    Route::put('/category/{id}/update', [category::class, 'update'])->name('category.update');
    Route::patch('/category/{id}/edit', [category::class, 'edit'])->name('category.edit');
    Route::delete('/category/{id}/delete', [category::class, 'destroy'])->name('category.destroy');
});

require __DIR__.'/auth.php';
