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

Route::view('/', 'welcome');

Route::group(['prefix' => 'api/cart'], function () {
    Route::get('list', 'CartController@list');
    Route::put('add/{product}', 'CartController@add');
    Route::delete('{product}/delete', 'CartController@delete');
    Route::put('{product}/increment', 'CartController@increment');
    Route::put('{product}/decrement', 'CartController@decrement');
});
