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

Route::get('/', 'blogcontroller@index');
Route::get('Stats/Stats', 'statcontroller@index');
Route::get('/addstat', 'statcontroller@create')->middleware('auth')->middleware('checkrole:admin');
Route::post('/createstat', 'statcontroller@store')->middleware('auth')->middleware('checkrole:admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//blog
Route::get('/blog/', 'blogcontroller@index');
Route::get('/blog/addPost', 'blogcontroller@create')->middleware('checkrole:admin');
Route::post('/blog/storepost', 'blogcontroller@store')->middleware('checkrole:admin');;
Route::get('/blog/{id}', 'blogcontroller@post');



Route::get('/admin/', 'admincontroller@index')->middleware('checkrole:admin');;
Route::get('/admin/fileManager', 'admincontroller@filemanager')->middleware('checkrole:admin');;
Route::get('/admin/addPost', 'admincontroller@createPost')->middleware('checkrole:admin');
Route::get('/admin/viewPosts', 'admincontroller@viewPosts')->middleware('checkrole:admin');;
Route::get('/admin/editPost/{id}', 'blogcontroller@edit')->middleware('checkrole:admin');;
Route::get('/admin/deletePost/{id}', 'blogcontroller@destroy')->middleware('checkrole:admin');;