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

Route::get('profile/create','ProfileController@add');
Route::get('profile/edit', 'ProfileController@edit');
Route::post('profile/create','ProfileController@create');
Route::post('profile/edit','ProfileController@update');
    

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('profile/create','ProfileController@create')->middleware('auth');
Route::get('/', 'PostingController@index');
