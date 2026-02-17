<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class , 'login'])->name('login');
Route::post('/login', [AuthController::class , 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class , 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard'); // Simple view
})->middleware('auth')->name('dashboard');

Route::resource('users', UserController::class)->middleware(['auth', 'admin']);