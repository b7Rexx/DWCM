<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


/********************* Backend routes ***************/
Route::group(['prefix' => '@dmin'], function () {
    Route::get('/', 'BackendController@home');
    Route::get('home', 'BackendController@home');
    Route::get('navbar', 'BackendController@navbar')->name('admin-navbar');
    Route::get('add-navbar', 'BackendController@navbarAdd')->name('admin-add-navbar');
    Route::post('add-navbar', 'BackendController@navbarAddAction')->name('admin-add-navbar-action');
});