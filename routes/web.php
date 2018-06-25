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
    return view('dashboard');
});
Route::get('/tickets', function () {
    return view('tickets');
});
Route::get('/inbox', function () {
    return view('inbox');
});
Route::get('/sent', function () {
    return view('sent');
});
Route::get('/profile', function () {
    return view('profile');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
