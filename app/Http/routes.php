<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a given Closure or controller and enjoy the fresh air.
|
*/

Route::get('/', ['as'=>'welcome','uses'=>'WelcomeController@index']);
Route::get('/home', ['as'=>'home','uses'=>'WelcomeController@index']);

//Route::get('user', ['as'=>'user','uses'=>'UserPagesController@show']);

Route::resource('user', 'UserPagesController',['only' => ['index', 'show']]);

Route::resource('artist', 'ArtistPagesContoller',['only' => ['index', 'show']]);

//Route::controllers(['auth'=>'AuthContoller']);

Route::get('ranks','RanksListController@index');
Route::post('get_ranks','RanksListController@getRankList');
//Route::get('ranks/{theme}/{first_character?}','RanksListController@show');
//Route::resource('ranks', 'RanksListController', ['only' => ['index', 'show']]);

Route::post('star_controller', 'StarController@edit');
Route::post('listen_controller','ListenController@store');

Route::resource('songs', 'SongsController', ['only' => ['index', 'show']]);

Route::post('comments', 'CommentsController@store');

// Маршруты аутентификации...
Route::get('auth/login', ['as' => 'login', 'uses'=>'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' => 'login.post',    'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', ['as' => 'register.post', 'uses' => 'Auth\AuthController@postRegister']);
Route::get('auth/logout', ['as' => 'logout',      'uses' => 'Auth\AuthController@getLogout']);


// Маршруты регистрации...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');