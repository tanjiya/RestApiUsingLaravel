<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('country', 'Country\CountryController@country');
Route::get('country/{id}', 'Country\CountryController@country_by_id');
Route::post('country', 'Country\CountryController@country_save');
Route::put('country/{id}', 'Country\CountryController@country_update');
Route::delete('country/{id}', 'Country\CountryController@country_delete');

Route::apiResource('country', 'Country\Country');