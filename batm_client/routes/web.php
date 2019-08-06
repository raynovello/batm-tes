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

Route::get('/', 'LoginController@index');

Route::post('/auth', 'LoginController@auth');

Route::get('/register', 'LoginController@register');

Route::post('/register_form', 'LoginController@register_form');

Route::get('/customer', 'CustomerController@index');

Route::post('/customer_form', 'CustomerController@customer_form');

Route::get('/logout', 'LoginController@logout');

