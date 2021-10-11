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

Route::group(['prefix' => 'admin'], function() {
    Route::get('posting/create', 'Admin\PostingController@add');
});

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/create','Admin\ProfileController@create');
    Route::post('profile/edit','Admin\ProfileController@update');
    Route::get('posting/create', 'Admin\PostingController@add');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function() {
    Route::get('posting/create', 'Admin\PostingController@add')->middleware('auth');
    Route::post('posting/create', 'Admin\PostingController@create')->middleware('auth');
    Route::get('posting', 'Admin\PostingController@index')->middleware('auth'); 
    Route::get('posting/edit', 'Admin\PostingController@edit')->middleware('auth'); 
    Route::post('posting/edit', 'Admin\PostingController@update')->middleware('auth');
    Route::get('posting/delete', 'Admin\PostingController@delete')->middleware('auth');
});

Route::get('/profile', 'ProfileController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
