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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@store')->name('create.post');
Route::get('/', 'PostController@index')->name('welcome.index');
Route::get('/article/{id}', 'PostController@show')->name('article');

Route::get('/admin-articles', 'HomeController@articles')->name('admin.post');
Route::get('/polls', 'PollController@index')->name('index.poll');
Route::post('/admin-articles', 'PollController@store')->name('create.poll');
Route::post('/polls/{id}', 'PollController@status')->name('status.update');
Route::post('/vote', 'RatePollController@update')->name('poll.vote');