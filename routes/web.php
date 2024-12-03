<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Middleware\Authenticate;
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

    Route::get('/', 'index')->name('login')->middleware('guest');
    Route::post('validateLogin', 'validateLogin')->name('validateLogin')->middleware('guest');
    Route::post('store-users', 'store')->name('store-users')->middleware('guest');
    Route::post('validate-password','validatePassword')->name('validate-password')->middleware('guest');
    Route::post('update-password','updatePassword')->name('update-password')->middleware('guest');

});


Route::group(['middleware' => ['auth:web']], function() {

    Route::controller(HomeController::class)->group(function() {
        Route::get('home','index')->name('home');
        Route::post('logout','logOut')->name('logout');
    });

});

