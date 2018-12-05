<?php
Route::get('login', 'Auth\\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\\LoginController@login');
Route::post('logout', 'Auth\\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');

Route::resource('users', 'UserController', ['except' => ['show']])->middleware('admin');
