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
Route::get('/stats', 'statcontroller@index');
Route::get('/add', 'statcontroller@create');
Route::post('/addcreate', 'statcontroller@store');
