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

Route::get('board', 'BBSController@index');

Route::get('template', function () {
    return view('layouts.app');
});

Route::get('view', 'BBSController@show');

Route::get('modify_form', 'BBSController@edit');

Route::post('delete', 'BBSController@delete');

Route::get('write_form', 'BBSController@create');

Route::post('write', 'BBSController@store');

Route::post('modify', 'BBSController@update');

Route::get('gallery', 'MainController@gallery')->name('gallery');

Route::get('/logout',function ()
{
    Auth::logout();
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('main','MainController@index')->name('main');

// Route::get('main','BBSController@')