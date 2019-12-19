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
});

Route::get('genres', 'GenresController@index');
Route::get('genres/{id}/edit', 'GenresController@editGenreForm');
Route::get('genres/{id}/post', 'GenresController@editGenre');
Route::get('tracks', 'TracksController@index');
Route::get('tracks/new', 'TracksController@addTrackForm');
Route::get('tracks/post', 'TracksController@addTrack');
