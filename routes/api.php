<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/contacts', 'ContactController@store');
Route::get('/contacts/{contact}', 'ContactController@show');
Route::patch('/contacts/{contact}', 'ContactController@update');
