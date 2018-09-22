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

Route::get('/', 'statcontroller@index');
Route::get('Stats/Stats', 'statcontroller@index');
Route::get('/addstat', 'statcontroller@create')->middleware('auth');
Route::post('/createstat', 'statcontroller@store')->middleware('auth');;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//blog
Route::get('/blog/', 'blogcontroller@index');
Route::get('/blog/addPost', 'blogcontroller@create')->middleware('auth');
Route::post('/blog/storepost', 'blogcontroller@store')->middleware('auth');
Route::get('/blog/{id}', 'blogcontroller@post');
