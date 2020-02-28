<?php

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

Route::get('/', 'HomeController@show')->name('home');


/* Auth */

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('auth.login');
    Route::post('/login', 'AuthController@login');

    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
    Route::post('/register', 'Auth\RegisterController@register');

    Route::get('/thanks', 'HomeController@thanks')->name('auth.thanks');
    Route::get('/verify', 'Auth\VerificationController@verify')->name('auth.verify');
});
