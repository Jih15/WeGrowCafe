<?php


use Illuminate\Http\Request;
use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Admin

Route::get('/admins', [adminController::class, 'index']);         // Mendapatkan daftar admin
Route::post('/admins', [adminController::class, 'store']);        // Menambahkan admin baru
Route::get('/admins/{id}', [adminController::class, 'show']);     // Mendapatkan admin berdasarkan ID
Route::put('/admins/{id}', [adminController::class, 'update']);   // Memperbarui admin
Route::delete('/admins/{id}', [adminController::class, 'destroy']); // Menghapus admin

// Cafe


