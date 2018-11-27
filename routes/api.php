<?php

use Illuminate\Http\Request;

Route::get('lists', 'BarcodeListController@index');
Route::post('lists', 'BarcodeListController@create');
Route::delete('lists/{list}', 'BarcodeListController@destroy');
