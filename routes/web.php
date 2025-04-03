<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, 'index'])->name('home');


Route::post('car/get-models', [CarController::class, 'getModelsByMakersId'])->name('car.models');
Route::post('car/get-cities', [CarController::class, 'getCitiesByStatesId'])->name('car.cities');


Route::get('car/search', [CarController::class, 'search'])->name('car.search');
Route::get('car/watchlist', [CarController::class, 'watchlist'])->name('car.watchlist');
Route::resource('car', CarController::class);

Route::get("/signup", [SignupController::class, 'create'])->name('signup');
Route::post('/register', [SignupController::class, 'registerUser'])->name('register');

Route::get("/login", [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('userLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
