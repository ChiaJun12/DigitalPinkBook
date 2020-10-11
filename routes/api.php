<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Carbon\Carbon; 

//Users
Route::group(['middleware' => ['cors', 'json.response']], function () {

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    // public routes
    Route::post('/login', 'Auth\ApiController@login')->name('login.api');
    Route::post('/register','Auth\ApiController@register')->name('register.api');

    
    // Route::post('/login', 'Api\AuthController@login')->name('login.api');
    // Route::post('/register', 'Api\AuthController@register')->name('register.api');
    Route::get('/alldata', 'RecordController@alldata')->name('alldata.api');
    Route::get('/allbc', 'RecordController@allbc')->name('bc_data');
    Route::get('/get_vaccines', 'RecordController@get_vaccines')->name('get_vaccines');

    Route::post('/new_vaccination', 'RecordController@new_vaccination')->name('new_vaccines');
    Route::post('/new_records', 'RecordController@new_records')->name('new_records');
    Route::post('/new_baby', 'RecordController@new_baby')->name('new_baby');
    Route::get('/searchdata', 'RecordController@searchdata')->name('searchdata');
    
    Route::get('/time', function(){
        $current = new Carbon();
        return $current;
    });

    // private routes
    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', 'Auth\ApiController@logout')->name('logout.api');
    });

});