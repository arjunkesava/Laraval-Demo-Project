<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('layouts/login');
});

Route::get('/custom_code', function () {
    return view('json');
});

Route::get('/dashboard/{usertype}', 'DashboardController@index');

Route::post('/checkuser','LoginController@check');
