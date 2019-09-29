<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Auth api routes
Route::group(['prefix' => 'auth'], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

// Cemetery api routes
Route::group(['middleware' => 'jwt.auth'], function ($router) {

    Route::get('cemeteries', 'CemeteriesController@all');
    Route::get('cemeteries/{id}', 'CemeteriesController@get');
    Route::post('cemeteries/new', 'CemeteriesController@new');

});
