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

Route::group([ 'middleware' => 'auth'], function () {
    Route::get('/', "DashboardController@index");
    Route::get('/getpush', "DashboardController@getpush");


    Route::get('/tickets', "TicketsController@index");
    Route::post('/addticket', "TicketsController@addticket");
    Route::get('/edit/{id}', "TicketsController@edit");
    Route::post('/updatetiket', "TicketsController@update");


    Route::get('/inbox', "InboxController@index");
    Route::post('/addcomment', "InboxController@addcomment");
    Route::post('/done', "InboxController@done");
    Route::post('/witing', "InboxController@witing");
    Route::post('/closed', "InboxController@closed");
    Route::post('/end', "InboxController@end");
    Route::post('/cant', "InboxController@cant");
    Route::get('/getcomment', "InboxController@getcomment");
    Route::get('/getmypushdone', "InboxController@getpush");



    Route::get('/sent', "SentController@index");
    Route::get('/getmypush', "SentController@getpush");


    Route::get('/profile', "ProfileController@index");
    Route::post('/addProfile', "ProfileController@addProfile");

  
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

});
Auth::routes();
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');