<?php

use Illuminate\Http\Request;

Route::get('lists', 'BarcodeListController@index')->middleware('auth');
Route::post('lists', 'BarcodeListController@create')->middleware('auth');
Route::delete('lists/{list}', 'BarcodeListController@destroy')->middleware('auth');
