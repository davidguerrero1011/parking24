<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Login\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::controller(LoginController::class)->group(function() {
    Route::get('/', 'index')->name('login');
    Route::post('validateLogin', 'validateLogin')->name('validateLogin');
});


Route::get('home', [HomeController::class, 'index'])->name('home');
Route::post('store-users', [HomeController::class, 'store'])->name('store-users');