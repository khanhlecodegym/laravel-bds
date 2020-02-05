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


Route::get('/', 'HomeController@index')->name('home.index');

Route::group(['prefix' => 'admin'], function () {
    Route::get('tinh', 'TinhController@index')->name('tinh.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
