<?php

use Illuminate\Support\Facades\Route;

/********************* Backend routes ***************/
Route::group(['prefix' => '@dmin', 'middleware' => 'auth:web'], function () {
    Route::get('/', 'BackendController@home')->name('admin-home');
    Route::get('home', 'BackendController@home');
    Route::get('main', 'BackendController@main')->name('admin-main');
    Route::post('main', 'BackendController@mainUpdate')->name('admin-main-update');

    Route::get('navbar', 'BackendController@navbar')->name('admin-navbar');

    Route::get('add-navbar', 'BackendController@navbarAdd')->name('admin-add-navbar');
    Route::post('add-navbar', 'BackendController@navbarAddAction')->name('admin-add-navbar-action');

    Route::get('navbar/delete/{id}', 'BackendController@navbarDelete');

    Route::get('nav/view/{id}', 'BackendController@nav');

    Route::get('nav/add/{id}', 'BackendController@navAdd');
    Route::post('nav/add', 'BackendController@navAddAction')->name('admin-add-nav-action');

    Route::get('nav/delete/{id}', 'BackendController@navDelete');


    Route::get('content/{type}/{id}', 'BackendController@Content');
    Route::post('content/title', 'BackendController@updateListTitle')->name('admin-update-content-list');

    Route::get('block/add/{type}/{id}', 'BackendController@Block');
    Route::post('block/add', 'BackendController@BlockAction')->name('admin-add-block');
    Route::get('block/delete/{type}/{id}', 'BackendController@BlockDelete');

    Route::get('status/content/{type}/{id}', 'BackendController@ContentStatusChange');
    Route::get('status/nav/{id}', 'BackendController@navStatusChange');
    Route::get('status/navbar/{id}', 'BackendController@navbarStatusChange');
    Route::get('status/block/{id}', 'BackendController@blockStatusChange');

    Route::get('cssAdmin', 'BackendController@cssAdmin')->name('admin-css');
    Route::post('cssAdmin', 'BackendController@cssChange')->name('admin-css-change');
});

Route::get('/{navbar?}/{nav?}/{block?}/{action?}', 'FrontendController@main')->name('home')->where('navbar', '[0-9]+')->where('nav', '[0-9]+');


Route::get('login', 'LoginController@index')->name('login');
Route::post('login', 'LoginController@loginAction')->name('login-action');
Route::get('logout', 'LoginController@logout')->name('logout');

//API
Route::get('api/imagelist', function () {
    $array = [];
    foreach (\App\Image::all() as $key => $img) {
        $array[$key] = $img->title;
    }
        $array = array_unique($array);
    return response($array);
});