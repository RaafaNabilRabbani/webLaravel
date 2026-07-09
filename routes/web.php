<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('post', [PostController::class, 'index']);

// Halaman register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'processRegister']);
// Halaman login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin']);
// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route untuk melihat detail satu berita
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
// Halaman yang butuh login (protected)
Route::middleware('auth')->group(function () {
Route::get('/home', function () {
        return view('home');
    })->middleware('auth')->name('home');
});