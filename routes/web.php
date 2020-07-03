<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});
Route::get('/categories','CategoriesController@index');
Route::get('/categories/create','CategoriesController@create');
Route::post('/categories', 'CategoriesController@store');
Route::get('/categories/{id}/edit', 'CategoriesController@edit');
Route::patch('/categories/{id}', 'CategoriesController@update');
Route::delete('/categories/{id}', 'CategoriesController@destroy');
// Route::get('/post', 'PostController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post','PostController@index');
Route::get('/post/create','PostController@create');
Route::post('/post', 'PostController@store');
Route::get('/post/{id}/edit', 'PostController@edit');
Route::patch('/post/{id}', 'PostController@update');
Route::delete('/post/{id}', 'PostController@destroy');

Route::get('/photo','PhotoController@index');
Route::get('/photo/create','PhotoController@create');
Route::post('/photo', 'PhotoController@store');
Route::get('/photo/{id}/edit', 'PhotoController@edit');
Route::patch('/photo/{id}', 'PhotoController@update');
Route::delete('/photo/{id}', 'PhotoController@destroy');

Route::get('/album','AlbumController@index');
Route::get('/album/create','AlbumController@create');
Route::post('/album', 'AlbumController@store');
Route::get('/album/{id}/edit', 'AlbumController@edit');
Route::patch('/album/{id}', 'AlbumController@update');
Route::delete('/album/{id}', 'AlbumController@destroy');