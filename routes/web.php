<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


/********************* Backend routes ***************/
Route::group(['prefix' => '@dmin'], function () {
    Route::get('/', 'BackendController@home');
    Route::get('home', 'BackendController@home');
});