<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/',  ['as' => 'home', 'uses'=> 'PublicController@index']);
    Route::get('/cp/', ['uses' => 'PublicController@cp']);
    Route::get('/cp/home', ['as' => 'cp_home', 'uses' => 'BaseController@home']);
    Route::get('/cp/countries', ['as' => 'countries', 'uses' => 'BaseController@countries']);
    Route::any('/cp/add/country', ['as' => 'add_country', 'uses' => 'BaseController@add_country']);
    Route::get('/cp/areas', ['as' => 'areas', 'uses' => 'BaseController@areas']);
    Route::any('/cp/add/area', ['as' => 'add_area', 'uses' => 'BaseController@add_area']);
    Route::get('/cp/tours', ['as' => 'tours', 'uses' => 'BaseController@tours']);
    Route::any('/cp/add/tour', ['as' => 'add_tour', 'uses' => 'BaseController@add_tour']);
    Route::any('/cp/edit/tour/{id}', ['as' => 'edit_tour', 'uses' => 'BaseController@edit_tour'], function($id) {})->where('id', '[A-Za-z0-9]+');
    Route::any('/cp/tour/{id}', ['as' => 'tour_view', 'uses' => 'BaseController@tour_view'], function($id) {})->where('id', '[A-Za-z0-9]+');
    Route::any('/cp/inquiries', ['as' => 'inquiries', 'uses' => 'BaseController@inquiries']);


    Route::any('/login/',  ['as' => 'login', 'uses'=> 'PublicController@authenticate']);
    Route::get('/logout',  ['as' => 'logout', 'uses'=> 'PublicController@logout']);


    Route::get('/contact', ['as' => 'contact', 'uses' => 'PublicController@contact']);
    Route::get('/about_us', ['as' => 'about_us', 'uses' => 'PublicController@about_us']);
    Route::get('/tour', ['as' => 'pub_tours', 'uses' => 'PublicController@tours']);
    Route::any('/tour/{id}', ['as' => 'pub_tour_view', 'uses' => 'PublicController@tour_view'], function($id) {})->where('id', '[A-Za-z0-9]+');
    Route::post('/inquire', ['as' => 'inquire', 'uses' => 'PublicController@inquire']);

});