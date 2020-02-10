<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->group(function ()
{
    Route::get('/contacts', 'ContactController@index');
    Route::post('/contacts', 'ContactController@store');
    Route::get('/contacts/{contact}', 'ContactController@show');
    Route::patch('/contacts/{contact}', 'ContactController@update');
    Route::delete('/contacts/{contact}', 'ContactController@destroy');
});


