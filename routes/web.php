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

Route::get('/', 'RopasiController@index');


Route::resource('ropasi', 'RopasiController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
