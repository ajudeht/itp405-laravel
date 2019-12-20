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

Route::get('/', function () {
    return view('welcome');
})->middleware('maintenance');

Route::get('genres', 'GenresController@index')->middleware('maintenance');
Route::get('genres/{id}/edit', 'GenresController@editGenreForm')->middleware('maintenance');
Route::get('genres/{id}/post', 'GenresController@editGenre')->middleware('maintenance');
Route::get('tracks', 'TracksController@index')->middleware('maintenance');
Route::get('tracks/new', 'TracksController@addTrackForm')->middleware('maintenance');
Route::get('tracks/post', 'TracksController@addTrack')->middleware('maintenance');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('maintenance', function () {
    return view('maintenance');;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('maintenance');
Route::get('/settings', 'HomeController@settings');
Route::get('/settings/post', 'HomeController@postSettings');
