<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@root')->name('pages.root');
Route::get('admin', 'PagesController@admin')->name('pages.admin')->middleware('auth');
Route::get('login', 'LoginController@create')->name('login');
Route::post('login', 'LoginController@login')->name('login');
Route::post('logout', 'LoginController@logout')->name('logout');


Route::resource('news', 'NewsController', ['except' => ['edit', 'update']]);
Route::resource('games', 'GamesController', ['except' => ['show']])->middleware('auth');
Route::resource('teams', 'TeamsController', ['except' => ['show']])->middleware('auth');
Route::resource('photos', 'PhotosController', ['except' => ['show']])->middleware('auth');
