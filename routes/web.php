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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/p/{{post}}', 'PostController@show');
Route::get('/p/create', 'PostController@create');
Route::post('/p', 'PostController@store');

Auth::routes();

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
