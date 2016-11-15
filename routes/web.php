<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('crud',
    'CRUDController@index');

Route::get('crud',
    'CRUDController@add');

Route::get('crud/view',
    'CRUDController@view');

Route::get('crud/update',
    'CRUDController@update');

Route::get('crud/delete',
    'CRUDController@delete');
