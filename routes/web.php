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

/* Declaro las rutas que serán visibles sólo para los usuarios logueados */

Route::middleware('auth')->group(function() {

Route::get('/connections', function () {
    return view('front.connections');
})->name('connections');

Route::get('/events/create', 'EventController@create')->name('createEvent');
Route::delete('/events/{id}', 'EventController@destroy');
Route::get('/events/{id}/edit', 'EventController@edit');
Route::get('/events/result/', 'EventController@result');

Route::get('/posts/create', 'PostController@create')->name('createPost');
Route::delete('/posts/{id}', 'PostController@destroy');
Route::get('/posts/{id}/edit', 'PostController@edit');

Route::get('/profile/create', 'ProfileController@create');
Route::delete('/profile/{id}', 'ProfileController@destroy');
Route::get('/profile/{id}/edit', 'ProfileController@edit');

Route::get('/group/create', 'GroupController@create');
Route::delete('/group/{id}', 'GroupController@destroy');
Route::get('/group/{id}/edit', 'GroupController@edit');
});

/* Rutas públicas*/

Route::resource('/events', 'EventController')->except(['create', 'destroy', 'edit', 'result']);

Route::resource('/posts', 'PostController')->except(['create', 'destroy', 'edit']);

Route::resource('/profile', 'ProfileController')->except(['create', 'destroy', 'edit']);

Route::resource('/groups', 'GroupController')->except(['create', 'destroy', 'edit']);

Route::get('/', 'IndexController@index')->name('index');

Route::get('/faq', function () {
    return view('front.faq');
})->name('faq');

Route::get('/underconstruction', function () {
    return view('front.underconstruction');
})->name('underconstruction');

/* Rutas de Registro y Login */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
