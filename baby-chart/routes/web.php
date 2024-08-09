<?php

use App\Http\Controllers\ChildController;
use App\Http\Controllers\MidWifeAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Public routes of authtication
Route::controller(AuthController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login')->name('login');
    Route::get('/user', [AuthController::class, 'getUserFromToken']);
});

Route::controller(MidWifeAuthController::class)->group(function() {
    Route::post('/mid_register', 'register');
    Route::post('/mid_login', 'login');
});

Route::post('/children', [ChildController::class, 'store'])->name('children.store');


