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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('profile/create','ProfileController@add');
//Route::get('profile/edit', 'ProfileController@edit');
//Route::post('profile/create','ProfileController@create');
//Route::post('profile/edit','ProfileController@update');
//Route::get('profile/edit', 'ProfileController@edit')->middleware('auth'); 
//Route::post('profile/edit','ProfileController@update')->middleware('auth');

    
Route::post('posting/create', 'PostingController@create')->middleware('auth'); 
Route::post('likes/create', 'LikeController@create')->middleware('auth'); 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/profile', 'ProfileController@index');


Route::get('/home', 'HomeController@index')->name('home');
//Route::get('profile/create','ProfileController@create')->middleware('auth');
Route::get('/', 'PostingController@index')->middleware('auth');
Route::get('posting/add',     'PostingController@add')->middleware('auth');

Route::get('/like', 'LikeController@index'); 
Route::get('/ajax/like/user_list', 'LikeController@user_list'); 
Route::post('/ajax/like', 'LikeController@like'); 