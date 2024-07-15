<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

//displaying the layouts.app file

Route::get('/', function () {
    return view('layouts.app');
})->name('hero');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->middleware(['auth'])->name('dashboard');



//the routes for the user model

//Route::resource('users', UserController::class)->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
});
