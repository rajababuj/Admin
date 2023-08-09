<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;



// use App\Http\Controllers\Admin;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->group(function () {
    Route::get('/register', 'RegistrationController@index')->name('user.register');
    Route::post('/register', 'RegistrationController@store');

    Route::get('/login', 'LoginController@index')->name('login');
    Route::post('/login', 'LoginController@login')->name('login.submit');

    Route::group(['middleware' => 'auth:web'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::post('/logout', 'LoginController@logout')->name('logout');   
    });
});
Route::get('authorized/google', [LoginController::class, 'redirectToGoogle']);
Route::get('authorized/google/callback', [LoginController::class, 'handleGoogleCallback']);
Route::post('/add-to-cart', 'CartController@addToCart')->name('add-to-cart');

