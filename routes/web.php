<?php

use App\Http\Controllers\apiController;
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
    Route::get('/profile', [ProfileController::class , 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class , 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class , 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/category', [category::class , 'index'])->name('category.index');
    Route::post('/category', [category::class , 'store'])->name('category.store');
    Route::put('/category/{id}/update', [category::class , 'update'])->name('category.update');
    Route::patch('/category/{id}/edit', [category::class , 'edit'])->name('category.edit');
    Route::delete('/category/{id}/delete', [category::class , 'destroy'])->name('category.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/payment', [\App\Http\Controllers\PaymentController::class , 'index'])->name('payment.index');
    Route::post('/checkout', [\App\Http\Controllers\PaymentController::class , 'checkout'])->name('checkout');
    Route::get('/payment/success', [\App\Http\Controllers\PaymentController::class , 'success'])->name('payment.success');
    Route::get('/payment/cancel', [\App\Http\Controllers\PaymentController::class , 'cancel'])->name('payment.cancel');
});
Route::get('/send-mail', function () {
    \Illuminate\Support\Facades\Mail::to('rinkalsoni161@gmail.com')->send(new \App\Mail\TestMail());
    return 'Mail dispatched! Check your storage/logs/laravel.log file.';
})->name('send-mail');

require __DIR__ . '/auth.php';
