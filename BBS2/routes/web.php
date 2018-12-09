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
Route::get('bbs/delete/{id}','BBSController@destroy')->name('delete');
Route::resource('bbs','BBSController');//bbs로 시작하는 모든curf가 실행

Route::post('register/update','UserController@store');
Route::resource('register','UserController');
Route::get('template', function () {
    return view('layouts.app');
});

Route::get('/write_form', function(){
    return view('bbs.write_form');
});
Route::get('/Personal_info', function(){

    return view('Personal_info');
});
Route::get('/modify_form', function(){
    return view('bbs.modify_form');
});

Route::post('/comment', 'BBSController@comment')->name('gallery');


// Route::get('/delete','BBSController@delete');
Route::get('/gallery', 'MainController@gallery')->name('gallery');
Route::get('/main','MainController@index')->name('main');
// Route::get('search', 'MainController@search');
Route::get('post/{id}', 'MainController@post')->name('post');
Route::get('/logout',function ()
{
    Auth::logout();
    return view('welcome');
});

Auth::routes();

Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');

Route::get('myArticles','BoardsController@myArticles');
Route::resource('attachments','AttachmentsController')->only(['store','delete']);
Route::resource('profiles','ProfilesController')->only(['store','delete']);

Route::get('/home', 'HomeController@index')->name('home');
