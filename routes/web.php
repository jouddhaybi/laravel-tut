<?php
use App\Http\Controllers\Admin\HomeController as AdHomeController;

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, 'index'])->name('home');
Route::get("/admin", [AdHomeController::class, 'index'])->name('adminPortal');


Route::post('car/get-models', [CarController::class, 'getModelsByMakersId'])->name('car.models');
Route::post('car/get-cities', [CarController::class, 'getCitiesByStatesId'])->name('car.cities');
Route::post('car/create', [CarController::class, 'createCar'])->name('car.newcreate');
Route::post('/car/{car}/images/upload', [CarController::class, 'addCarImages'])->name('cars.images.upload');
Route::post('car/add-watchlist', [CarController::class, 'addToWatchList'])->name('car.addwatchlist');
Route::patch('car/publish-car', [CarController::class, 'publishCar'])->name('car.publishCar');
Route::patch('car/update-images', [CarController::class, 'updateImages'])->name('car.images.update');
Route::get('car/search', [CarController::class, 'search'])->name('car.search');
Route::get('car/{car}/images', [CarController::class, 'images'])->name('car.images');
Route::get('car/watchlist', [CarController::class, 'watchlist'])->name('car.watchlist');
// Route::get('car', [CarController::class, 'index'])->name('car.index');
Route::resource('car', CarController::class)->names([
    'index' => 'car.index',
    'update' => 'car.updatecar',
    'destroy' => 'car.destroy'
]);

Route::get("/signup", [SignupController::class, 'create'])->name('signup');
Route::post('/register', [SignupController::class, 'registerUser'])->name('register');

Route::get("/login", [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('userLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
