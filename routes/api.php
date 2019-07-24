<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function () {
    Route::post('users', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('cinema', 'CinemaController@create');
    Route::post('movies', 'MovieController@create');
    Route::get('cinemas', 'CinemaController@getCinemas');
});
