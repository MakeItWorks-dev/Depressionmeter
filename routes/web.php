<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;


use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('login');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('index');

    Route::get('/profile', [ProfileController::class, 'showprofileForm'])->name('profile');
    Route::get('/profile/pdf/{id}', [ProfileController::class, 'exportToPDF'])->name('exportpdf');

    Route::put('/change-password', [AuthController::class, 'update'])->name('password.update');

    // Route::post('/getUserId', [HomeController::class, 'getUserId'])->name('getUserId');
    Route::post('/get-tweet-user', [HomeController::class, 'getTweetUser'])->name('getTweetUser');

});