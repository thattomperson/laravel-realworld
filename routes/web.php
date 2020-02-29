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

Route::get('/', 'HomeController@showGlobal')->name('home.global');
Route::get('/feed', 'HomeController@showFeed')->name('home.feed')->middleware('auth');
Route::get('/tag/{id}', 'HomeController@showTag')->name('home.tag');

Route::get('/profile/{id}', 'ProfileController@show')->name('profile.show');

Route::get('/article/{id}', 'ArticleController@show')->name('article.show');
Route::get('/article/create', 'ArticleController@create')->name('article.create');

/* Auth */
Auth::routes(['verify' => true]);
