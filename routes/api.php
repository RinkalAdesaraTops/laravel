<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/category', [apiController::class, 'index']);
Route::post('/category/save', [apiController::class, 'store']);
Route::put('/category/{id}/update', [apiController::class, 'update']);
Route::patch('/category/{id}/edit', [apiController::class, 'edit']);
Route::delete('/category/{id}/delete', [apiController::class, 'destroy']);


