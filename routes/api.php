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
    Route::post('cemeteries/update','CemeteriesController@update');
    Route::delete('cemeteries/delete/{id}','CemeteriesController@delete');
});

// Users routes
Route::group(['middleware' => 'jwt.auth'], function ($router) {

    Route::get('users', 'UsersController@all');
    Route::get('users/{id}', 'UsersController@get');
    Route::post('users/new', 'UsersController@new');
    Route::post('users/update','UsersController@update');
    Route::delete('users/delete/{id}','UsersController@delete');
});
