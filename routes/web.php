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

Route::get('/profile/{id}', 'ProfileController@show')->name('profile.show');
Route::post('/profile/{id}/follow', 'ProfileController@show')->name('profile.follow');

Route::get('/article/{id}', 'ArticleController@show')->name('article.show');
Route::get('/article/create', 'ArticleController@create')->name('article.create');
Route::post('/article/{id}/like', 'ArticleController@like')->name('article.like')->middleware('auth');

/* Auth */
Auth::routes(['verify' => true]);
